<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Pobranie hasła z bazy danych na podstawie nazwy użytkownika
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Sprawdzenie czy użytkownik istnieje i czy hasło się zgadza
    if ($row && password_verify($password, $row['password'])) {
        header("Location: index.html");
        exit();
    } else {
        echo "Nieprawidłowa nazwa użytkownika lub hasło.";
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Logowanie</h1>
    </header>
    <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateLoginForm()">
            <div class="center">
                <label for="username">Nazwa użytkownika:</label><br>
                <input type="text" id="username" name="username" required><br><br>
            </div>
            <div class="center">
                <label for="password">Hasło:</label><br>
                <input type="password" id="password" name="password" required><br><br>
            </div>
            <div class="center">
                <input type="submit" value="Zaloguj">
            </div>
            <div id="error-message" class="center" style="color: red; display: none;"></div>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Strona egzaminacyjna</p>
    </footer>

    <script>
        function validateLoginForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            // Symulacja sprawdzania nazwy użytkownika i hasła.
            // Możesz tutaj dodać swoją logikę weryfikacji, na przykład sprawdzając w pamięci lokalnej, czy dane są poprawne.

            // Przykładowa symulacja - sprawdzenie, czy nazwa użytkownika to "admin", a hasło to "password".
            if (username !== "admin" || password !== "password") {
                document.getElementById("error-message").innerText = "Nieprawidłowa nazwa użytkownika lub hasło.";
                document.getElementById("error-message").style.display = "block";
                return false;
            }

            return true;
        }
    </script>
</body>
</html>

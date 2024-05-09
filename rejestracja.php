<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Sprawdzenie czy nazwa użytkownika jest już w użyciu
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Nazwa użytkownika jest już zajęta.";
        exit();
    }

    // Wstawienie nowego użytkownika do bazy danych
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    header("Location: logowanie.php");
    exit();

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .password-policy {
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Rejestracja</h1>
    </header>
    <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateRegistration()">
            <div class="center">
                <label for="username">Nazwa użytkownika:</label><br>
                <input type="text" id="username" name="username" required><br><br>
            </div>
            <div class="center">
                <label for="password">Hasło:</label><br>
                <input type="password" id="password" name="password" required><br><br>
            </div>
            <div class="password-policy">
                Hasło musi zawierać od 8 do 20 znaków, co najmniej jedną małą literę, jedną wielką literę, jedną cyfrę i jeden znak specjalny.
            </div>
            <div class="center">
                <label for="confirm_password">Potwierdź hasło:</label><br>
                <input type="password" id="confirm_password" name="confirm_password" required><br><br>
            </div>
            <div class="center">
                <input type="submit" value="Zarejestruj">
                <a href="logowanie.php"><button type="button">Zaloguj się</button></a>
            </div>
            <div id="error-message" class="center" style="color: red; display: none;"></div>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Strona egzaminacyjna</p>
    </footer>

    <script>
        function validateRegistration() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            var policyRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,20}$/;

            if (!policyRegex.test(password)) {
                alert("Hasło nie spełnia wymagań polityki hasła.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Potwierdzenie hasła nie pasuje.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>

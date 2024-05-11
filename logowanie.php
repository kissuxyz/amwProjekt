<?php
include 'db_connect.php';

$errors = [];

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
        $errors[] = "Nieprawidłowa nazwa użytkownika lub hasło.";
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
    <style>
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
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
                <!-- Przycisk "Zarejestruj się" -->
                <a href="rejestracja.php"><button type="button">Zarejestruj się</button></a>
            </div>
            <?php if (!empty($errors)): ?>
                <div class="error-message">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Strona egzaminacyjna</p>
    </footer>

    <script>
        function validateLoginForm() {
            // Tutaj można dodać dodatkową walidację, jeśli to konieczne
            return true;
        }
    </script>
</body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db_connect.php';

var_dump($_SESSION['username']); // Sprawdzamy, czy username jest ustawione w sesji

// Sprawdzamy, czy użytkownik jest zalogowany
if (!isset($_SESSION['username'])) {
    header("Location: logowanie.php");
    exit();
}

$username = $_SESSION['username'];

// Zapytanie SQL do pobrania wyników testów użytkownika
$sql = "SELECT test_type, score, test_date FROM test_results WHERE username = ? ORDER BY test_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil użytkownika</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Profil użytkownika</h1>
</header>
<section id="menu">
    <section class="menu-select">
        <a href="index.html">STRONA GŁÓWNA</a>
    </section>
    <section class="menu-select">
        <a href="wybor testu.html">WYKONAJ TEST</a>
    </section>
    <section class="menu-select">
        <a href="profil uzytkownika.php">PROFIL</a>
    </section>
    <section class="menu-select">
        <a href="faq.html">FAQ</a>
    </section>
    <section class="menu-select">
        <a href="logowanie.php">WYLOGUJ SIĘ</a>
    </section>
</section>
<main>
    <section id="user-info">
        <h2>Informacje o użytkowniku:</h2>
        <p>Nazwa użytkownika: <?php echo htmlspecialchars($username); ?></p>
    </section>
    <section id="test-results">
        <h2>Wyniki testów:</h2>
        <?php
        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Typ testu</th><th>Wynik (%)</th><th>Data wykonania</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['test_type']) . '</td>';
                echo '<td>' . htmlspecialchars($row['score']) . '</td>';
                echo '<td>' . htmlspecialchars($row['test_date']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Brak wyników do wyświetlenia.</p>';
        }
        $stmt->close();
        $conn->close();
        ?>
    </section>
</main>
<footer>
    <p>&copy; 2024 Strona egzaminacyjna</p>
</footer>
</body>
</html>

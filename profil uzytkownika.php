<?php
session_start();

// Sprawdzamy, czy użytkownik jest zalogowany
if (!isset($_SESSION['username'])) {
    header("Location: logowanie.php");
    exit();
}

// Odczytujemy wyniki testów z sesji
$test1_score = isset($_SESSION['test1_score']) ? $_SESSION['test1_score'] : 0;
$test2_score = isset($_SESSION['test2_score']) ? $_SESSION['test2_score'] : 0;

// Usuwamy wyniki z sesji
unset($_SESSION['test1_score']);
unset($_SESSION['test2_score']);
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
    <!-- Nagłówek strony -->
</header>
<section id="menu">
        <section class="menu-select">
            <a href="index.html" >STRONA GŁÓWNA</a>
        </section>
        <section class="menu-select">
            <a href="wybor testu.html" >WYKONAJ TEST</a>
        </section>
        <section class="menu-select">
            <a href="profil uzytkownika.php" >PROFIL</a>
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
        <!-- Wyświetlanie informacji o użytkowniku -->
        <!-- ... -->
    </section>
    <section id="test-results">
        <h2>Wyniki testów:</h2>
        <p>Test nr 1: <?php echo $test1_score; ?>/10</p>
        <p>Test nr 2: <?php echo $test2_score; ?>/10</p>
    </section>
</main>
<footer>
    <p>&copy; 2024 Strona egzaminacyjna</p>
</footer>
</body>
</html>

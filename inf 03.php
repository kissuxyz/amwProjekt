<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egzamin teoretyczny inf03</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Egzamin teoretyczny inf03</h1>
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
<?php
session_start();
include 'db_connect.php';

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Zapytanie SQL dla 40 losowych pytań
$sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 40";
$result = $conn->query($sql);

// Sprawdzenie czy są wyniki
if ($result && $result->num_rows === 40) {
    echo '<form name="ankieta" id="test" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
    echo '<center>';
    while($row = $result->fetch_assoc()) {
        echo "<p><b>" . $row["question_text"] . "</b></p>";
        echo "<input name=\"pytanie" . $row["id"] . "\" value=\"0\" type=\"radio\">" . $row["answer1"] . "<br>";
        echo "<input name=\"pytanie" . $row["id"] . "\" value=\"1\" type=\"radio\">" . $row["answer2"] . "<br>";
        echo "<input name=\"pytanie" . $row["id"] . "\" value=\"2\" type=\"radio\">" . $row["answer3"] . "<br>";
        echo "<input name=\"pytanie" . $row["id"] . "\" value=\"3\" type=\"radio\">" . $row["answer4"] . "<br>";
    }
    echo '</center>';
    echo '<br><br>';
    echo '<center><input type="submit" value="Sprawdź wynik"></center>';
    echo '</form>';
} else {
    echo "Nie można wyświetlić pytań. Spróbuj ponownie później.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $totalQuestions = 40;
    $score = 0;

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'pytanie') === 0 && $value == "1") {
            $score++;
        }
    }

    $percentage = ($score / $totalQuestions) * 100;

    // Zapisywanie wyniku do bazy danych
    $username = $_SESSION['username'];
    $test_type = 'inf03';
    $stmt = $conn->prepare("INSERT INTO test_results (username, test_type, score) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $username, $test_type, $percentage);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Twój wynik to: " . $percentage . "%');</script>";
}

$conn->close();
?>

</main>
<footer>
    <p>&copy; 2024 Strona egzaminacyjna</p>
</footer>
<script>
function showResult() {
    var totalQuestions = 40; // Całkowita liczba pytań w teście
    var score = 0;

    // Sprawdzanie, ile odpowiedzi jest poprawnych
    for (var i = 1; i <= totalQuestions; i++) {
        var selectedAnswer = document.querySelector('input[name="pytanie' + i + '"]:checked');
        if (selectedAnswer !== null && selectedAnswer.value == "1") {
            score++;
        }
    }

    var percentage = (score / totalQuestions) * 100; // Obliczenie procentu

    // Wyświetlenie okna pop z wynikiem
    alert("Twój wynik to: " + percentage.toFixed(2) + "%");
}
</script>
</body>
</html>
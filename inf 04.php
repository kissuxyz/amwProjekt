<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egzamin teoretyczny inf04</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Egzamin teoretyczny inf04</h1>
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
    <form name="ankieta" id="test" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <center>
            <!-- Tutaj pytania pobrane z bazy danych -->
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<p><b>" . $row["question_text"] . "</b></p>";
                    echo "<input name=\"pytanie" . $row["id"] . "\" value=\"0\" type=\"radio\">" . $row["answer1"] . "<br>";
                    echo "<input name=\"pytanie" . $row["id"] . "\" value=\"1\" type=\"radio\">" . $row["answer2"] . "<br>";
                    echo "<input name=\"pytanie" . $row["id"] . "\" value=\"2\" type=\"radio\">" . $row["answer3"] . "<br>";
                    echo "<input name=\"pytanie" . $row["id"] . "\" value=\"3\" type=\"radio\">" . $row["answer4"] . "<br>";
                }
            } else {
                echo "Brak pytań w bazie danych.";
            }
            ?>
        </center>
        <br><br>
        <Center><input type="submit" value="Sprawdź wynik"></center>
    </form>
</main>
<footer>
    <p>&copy; 2024 Strona egzaminacyjna</p>
</footer>
<script>
function showResult() {
    var totalQuestions = <?php echo $result->num_rows; ?>;
    var score = 0;
    var answers = document.forms["ankieta"];
    
    for (var i = 0; i < totalQuestions; i++) {
        var questionName = "pytanie" + (i + 1);
        var selectedAnswer = answers.elements[questionName].value;
        if (selectedAnswer == "<?php echo $row['correct_answer']; ?>") {
            score++;
        }
    }
    
    var percentage = (score / totalQuestions) * 100;
    alert("Twój wynik to: " + percentage.toFixed(2) + "%");
}
</script>
</body>
</html>

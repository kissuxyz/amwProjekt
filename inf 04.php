<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobieranie danych z formularza
    $score = 0;
    $answers = $_POST;

    // Klucz odpowiedzi dla testu nr 2
    $key = ['1', '0', '3', '0', '2', '1', '1', '0', '2', '3'];

    // Sprawdzanie poprawności odpowiedzi
    foreach ($answers as $question => $answer) {
        if (strpos($question, 'pytanie') !== false) {
            $questionNumber = substr($question, -1); // Pobranie numeru pytania
            if ($answer == $key[$questionNumber - 1]) {
                $score++; // Zwiększanie wyniku o 1, jeśli odpowiedź jest poprawna
            }
        }
    }

    // Zapisywanie wyniku w sesji
    $_SESSION['test2_score'] = $score;

    // Przekierowanie do profilu użytkownika
    header("Location: profil_uzytkownika.php");
    exit();
}
?>

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
    <section id="menu">
        <section class="menu-select">
            <a href="index.html">STRONA GŁÓWNA</a>
        </section>
        <section class="menu-select">
            <a href="wybor testu.html">WYKONAJ TEST</a>
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
</header>
<main>
    <form name="ankieta" id="test" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <center>
            Imię:<input type="text"><br>
            Nazwisko: <input type="text"><br>
            Płeć:
            <select><option value="mężczyzna">mężczyzna</option>
                <option value="kobieta">kobieta</option>
                <option value="inna">inna</option></select><br>

            <p><b>Który z wymienionych algorytmów działających na tablicy jednowymiarowej ma złożoność obliczeniową O(n2)?</b></p>
            <input name="pytanie1" value="0" type="radio"> Wyszukiwanie binarne<br>
            <input name="pytanie1" value="1" type="radio"> Sortowanie bąbelkowe<br>
            <input name="pytanie1" value="2" type="radio"> Sortowanie szybkie<br>
            <input name="pytanie1" value="3" type="radio"> Wypisanie elementów<br>

            <p><b>Która metodyka zarządzania projektem jest optymalna, gdy zakres projektu w początkowej fazie nie jest do końca znany, wymagania mogą ulec zmianie w trakcie trwania projektu oraz mogą pojawić się nowe wymagania?</b></p>
            <input name="pytanie2" value="0" type="radio"> Agile<br>
            <input name="pytanie2" value="1" type="radio"> Model V<br>
            <input name="pytanie2" value="2" type="radio"> Model kaskadowy<br>
            <input name="pytanie2" value="3" type="radio"> PRINCE2<br>

            <p><b>Aplikacja mobilna wyświetla listę, której każdy z elementów może być dotknięty palcem, aby wyświetlić jego szczegóły. Zdarzenie odpowiadające tej akcji to</b></p>
        <input name="pytanie3" value="0" type="radio"> value changed<br>
        <input name="pytanie3" value="1" type="radio"> toggled<br>
        <input name="pytanie3" value="2" type="radio"> button clicked<br>
        <input name="pytanie3" value="3" type="radio"> tapped<br>

        <p><b>Strategia budowania algorytmu poprzez podział na dwa lub więcej mniejszych podproblemów tak długo, aż fragmentu staną się proste do bezpośredniego rozwiązania jest metodą:</b></p>
        <input name="pytanie4" value="0" type="radio"> dziel i zwyciężaj<br>
        <input name="pytanie4" value="1" type="radio"> heurystyczną<br>
        <input name="pytanie4" value="2" type="radio"> najkrótszej ścieżki<br>
        <input name="pytanie4" value="3" type="radio"> komiwojażera<br>

        <p><b>Utworzenie procedury składowej o nazwie dodajUsera w MS SQL rozpoczyna się od poleceń</b></p>
        <input name="pytanie5" value="0" type="radio">create dodajUsera procedure<br>
        <input name="pytanie5" value="1" type="radio">add procedure dodajUsera<br>
        <input name="pytanie5" value="2" type="radio">create procedure dodajUsera<br>
        <input name="pytanie5" value="3" type="radio">add dodajUsera procedure<br>

        <p><b>Aplikacje Web wykonane we frameworku Angular lub bibliotece React i działające na domyślnych ustawieniach portów można uruchomić na lokalnym serwerze, wpisując w przeglądarce</b></p>
        <input name="pytanie6" value="0" type="radio">localhost:8080 (React) lub localhost:8000 (Angular)<br>
        <input name="pytanie6" value="1" type="radio">localhost:3000 (React) lub localhost:4200 (Angular)<br>
        <input name="pytanie6" value="2" type="radio">localhost:5001 (React) lub localhost:8080 (Angular)<br>
        <input name="pytanie6" value="3" type="radio">localhost:8000 (React) lub localhost:49887 (Angular)<br>

        <p><b>Cechami dobrego negocjatora są:</b></p>
        <input name="pytanie7" value="0" type="radio">asertywność, pesymizm, buta<br>
        <input name="pytanie7" value="1" type="radio">intuicja, cierpliwość, asertywność<br>
        <input name="pytanie7" value="2" type="radio">lojalność, nieśmiałość, uczciwość<br>
        <input name="pytanie7" value="3" type="radio">dobra reputacja, przekora, porywczość<br>
          
        <p><b>Rekomendacje standardu WCAG 2.0 związane z percepcją dotyczą:</b></p>
        <input name="pytanie8" value="0" type="radio">przedstawienia komponentów interfejsu użytkownika<br>
        <input name="pytanie8" value="1" type="radio">zrozumienia i rzetelności w dostarczonych treściach na stronie<br>
        <input name="pytanie8" value="2" type="radio">zapewnienia interakcji pomiędzy komponentami użytkownika przy użyciu klawiatury<br>
        <input name="pytanie8" value="3" type="radio">zapewnienia wystarczającej ilości czasu na przeczytanie i przetworzenie treści<br>
          
        <p><b>Zapisane w kodzie szesnastkowym składowe RGB koloru #AA41FF po przekształceniu do kodu dziesiętnego wynoszą kolejno</b></p>
        <input name="pytanie9" value="0" type="radio">170, 64, 255<br>
        <input name="pytanie9" value="1" type="radio">160, 64, 255<br>
        <input name="pytanie9" value="2" type="radio">170, 65, 255<br>
        <input name="pytanie9" value="3" type="radio">160, 65, 255<br>
          
        <p><b>W którym modelu Cyklu Życia Projektu Informatycznego występuje etap analizy ryzyka?</b></p>
        <input name="pytanie10" value="0" type="radio">W modelu z prototypem<br>
        <input name="pytanie10" value="1" type="radio">W kaskadowym<br>
        <input name="pytanie10" value="2" type="radio">W modelu Fry’ego<br>
        <input name="pytanie10" value="3" type="radio">W spiralnym<br>
        </center>
        <br><br>
        <Center><input type="submit" value="Sprawdź wynik"></center>
    </form>
</main>
<footer>
    <p>&copy; 2024 Strona egzaminacyjna</p>
</footer>
</body>
</html>
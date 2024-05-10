<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egzamin teoretyczny inf 03</title>
    <link rel="stylesheet" href="styles.css">

    <script type="text/javascript">
        var iloscpytan = 10;
        var wynik = 0;
        var wynikpokaz = 0;
        var pytania = new Array(iloscpytan);
        var klucz = ['2', '3', '2', '0', '1', '2', '0', '3', '2', '1'];

        function pobierz() {
            for (var i = 0; i < iloscpytan; i++) {
                var selectedAnswer = '';
                var radioButtons = document.getElementsByName("pytanie" + (i + 1));
                for (var j = 0; j < radioButtons.length; j++) {
                    if (radioButtons[j].checked) {
                        selectedAnswer = radioButtons[j].value;
                        break;
                    }
                }
                pytania[i] = selectedAnswer;
            }
        }

        function sprawdz() {
            for (var i = 0; i < iloscpytan; i++) {
                if (pytania[i] == klucz[i]) {
                    wynik++;
                }
            }
        }

        function main() {
            pobierz();
            sprawdz();
            wynikpokaz = Math.round((wynik / iloscpytan) * 100);
            alert(wynikpokaz + "% (" + wynik + " odpowiedzi poprawnych)");
            wynik = 0;
            wynikpokaz = 0;
        }
    </script>
</head>
<body>
<header>
    <h1>Egzamin teoretyczny inf03</h1>
    <section id="menu">
        <section class="menu-select">
            <a href="index.html">STRONA GŁÓWNA</a>
        </section>
        <section class="menu-select">
            <a href="wybor testu.html">WYKONAJ TEST</a>
        </section>
        <section class="menu-select">
            <a href="profil uzytkownika.html" >PROFIL</a>
        </section>
        <section class="menu-select">
            <a href="faq.html">FAQ</a>
        </section>
        <section class="menu-select">
            <a href="logowanie.html">WYLOGUJ SIĘ</a>
        </section>
    </section>
</header>
<main>
    <form name="ankieta" id="test" action="javascript:void(0);" onsubmit="main();">
        <center>
            Imię:<input type="text"><br>
            Nazwisko: <input type="text"><br>
            Płeć:
            <select><option value="mężczyzna">mężczyzna</option>
                <option value="kobieta">kobieta</option>
                <option value="inna">inna</option></select><br>

            <p><b>Pogrubienie tekstu za pomocą znacznika <'b> można uzyskać także przy wykorzystaniu właściwości CSS</b></p>
            <input name="pytanie1" value="0" type="radio"> font-size<br>
            <input name="pytanie1" value="1" type="radio"> text-size<br>
            <input name="pytanie1" value="2" type="radio"> font-weight<br>
            <input name="pytanie1" value="3" type="radio"> text-weight<br>

            <p><b>Które wyrażenie logiczne należy zastosować w języku JavaScript, aby wykonać operacje tylko dla dowolnych liczb ujemnych z przedziału jednostronnie domkniętego <-200,-100)?</b></p>
            <input name="pytanie2" value="0" type="radio"> (liczba <=-200) || (liczba>-100)<br>
            <input name="pytanie2" value="1" type="radio"> (liczba >=-200) || (liczba>-100)<br>
            <input name="pytanie2" value="2" type="radio"> (liczba <=-200) && (liczba<-100)<br>
            <input name="pytanie2" value="3" type="radio"> (liczba >=-200) && (liczba<-100)<br>

            <p><b>Które wyrażenie logiczne w języku PHP sprawdza, czy zmienna1 należy do przedziału jednostronnie domkniętego <-5, 10)?</b></p>
        <input name="pytanie3" value="0" type="radio"> $zmienna1 <= -5 && $zmienna1 < 10<br>
        <input name="pytanie3" value="1" type="radio"> $zmienna1 >= -5 || $zmienna1 < 10<br>
        <input name="pytanie3" value="2" type="radio"> $zmienna1 >= -5 && $zmienna1 < 10<br>
        <input name="pytanie3" value="3" type="radio"> $zmienna1 <= -5 || $zmienna1 < 10<br>

        <p><b>Aby podczas tworzenia tabeli utworzyć klucz obcy na wielu kolumnach, należy użyć polecenia</b></p>
        <input name="pytanie4" value="0" type="radio"> CONSTRAINT fk_osoba_uczen FOREIGN KEY (nazwisko, imie) REFERENCES osoby (nazwisko,imie)<br>
        <input name="pytanie4" value="1" type="radio"> CONSTRAINT(nazwisko,imie) FOREIGN KEY REFERENCES osoby (nazwisko, imie)<br>
        <input name="pytanie4" value="2" type="radio"> CONSTRAINT fk_osoba_uczen FOREIGN KEY ON (nazwisko, imie) REFERENCES osoby (nazwisko,imie)<br>
        <input name="pytanie4" value="3" type="radio"> CONSTRAINT(nazwisko,imie) FOREIGN REFERENCES KEY osoby (nazwisko, imie)<br>

        <p><b>Które stwierdzenie odnosi się do skalowania obrazu?</b></p>
        <input name="pytanie5" value="0" type="radio">Łączy lub odejmuje kształty<br>
        <input name="pytanie5" value="1" type="radio">Powoduje zmianę rozmiaru obrazu bez zmieniania ważnej zawartości wizualnej<br>
        <input name="pytanie5" value="2" type="radio">Polega na zmianie sposobu zapisu obrazu tak, aby zmienić sposób kompresji<br>
        <input name="pytanie5" value="3" type="radio">Powoduje wycięcie z oryginalnego obrazu określonego jego fragmentu z celu uzyskania optymalnego widoku<br>

        <p><b>Który z wymienionych znaczników należy do części <'head> dokumentu HTML?</b></p>
        <input name="pytanie6" value="0" type="radio"><'img><br>
        <input name="pytanie6" value="1" type="radio"><'span><br>
        <input name="pytanie6" value="2" type="radio"><'title><br>
        <input name="pytanie6" value="3" type="radio"><'section><br>

        <p><b>Językami programowania działającymi po stronie serwera są:</b></p>
        <input name="pytanie7" value="0" type="radio">Java, C#, Python, Ruby, PHP<br>
        <input name="pytanie7" value="1" type="radio">Java, C#, AJAX, Ruby, PHP<br>
        <input name="pytanie7" value="2" type="radio">Java, C#, Python, ActionScript, PHP<br>
        <input name="pytanie7" value="3" type="radio">C#, Python, Ruby, PHP, JavaScript<br>
          
        <p><b>Funkcja drzewo kontekstowe edytor WYSIWYG Adobe Dreamweaver służy do</b></p>
        <input name="pytanie8" value="0" type="radio">definiowania kaskadowych arkuszy stylów dołączonych do witryny<br>
        <input name="pytanie8" value="1" type="radio">tworzenia szablonu strony internetowej<br>
        <input name="pytanie8" value="2" type="radio">formatowanie tekstu przy pomocy dostępnych znaczników<br>
        <input name="pytanie8" value="3" type="radio">wyświetlania interaktywnego drzewa struktury HTML dla zawartości statycznej i dynamicznej<br>
          
        <p><b>Który z wymienionych formatów umożliwia zapis dźwięku i obrazu?</b></p>
        <input name="pytanie9" value="0" type="radio">MP3<br>
        <input name="pytanie9" value="1" type="radio">PNG<br>
        <input name="pytanie9" value="2" type="radio">MP4<br>
        <input name="pytanie9" value="3" type="radio">WAV<br>
          
        <p><b>Kaskadowe arkusze stylów tworzy się w celu</b></p>
        <input name="pytanie10" value="0" type="radio">ułatwienia użytkownikowi nawigacji<br>
        <input name="pytanie10" value="1" type="radio">definiowania sposobu formatowania elementów strony internetowej<br>
        <input name="pytanie10" value="2" type="radio">uzupełnienia strony internetowej o treści tekstowe<br>
        <input name="pytanie10" value="3" type="radio">przyspieszenia wyświetlania grafiki na stronie internetowej<br>
        </center>
        <br><br>
        <center><input type="submit" value="sprawdź wynik"></center>
    </form>
</main>
<footer>
    <p>&copy; 2024 Strona egzaminacyjna</p>
</footer>
</body>
</html>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Klub zdobywców gór polskich</h1>
</header>

<nav>
    <a href="kw1.png">kwerenda1</a>
    <a href="kw2.png">kwerenda2</a>
    <a href="kw3.png">kwerenda3</a>
    <a href="kw4.png">kwerenda4</a>
</nav>

<main>
    <section id="lewy">
        <img src="logo.JPG" alt="logo zdobywcy">
        <h3>razem z nami:</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </section>

    <section id="prawy">
        <h2>Dołącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza:</p>

        <form method="POST" action="">
            <label>Nazwisko: </label>
            <input type="text" name="nazwisko">

            <label>Imię: </label>
            <input type="text" name="imie">

            <label>Funkcja: </label>
            <select name="funkcja">
                <option>uczestnik</option>
                <option>przewodnik</option>
                <option>zaopatrzeniowiec</option>
                <option>organizator</option>
                <option>ratownik</option>
            </select>

            <label>Email: </label>
            <input type="email" name="email">

            <input type="submit" value="Dodaj">
        </form>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "zdobywcy");

        if(isset($_POST['nazwisko']) && isset($_POST['imie']) && isset($_POST['email'])){
            $nazwisko = $_POST['nazwisko'];
            $imie = $_POST['imie'];
            $funkcja = $_POST['funkcja'];
            $email = $_POST['email'];

            if($nazwisko != "" && $imie != "" && $email != ""){
                $zapytanie = "INSERT INTO osoby (nazwisko, imie, funkcja, email)
                              VALUES ('$nazwisko', '$imie', '$funkcja', '$email')";
                mysqli_query($conn, $zapytanie);
            }
        }

        echo "<table>";
        echo "<tr>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Funkcja</th>
                <th>Email</th>
              </tr>";

        $zapytanie2 = "SELECT nazwisko, imie, funkcja, email FROM osoby";
        $wynik = mysqli_query($conn, $zapytanie2);

        while($row = mysqli_fetch_array($wynik)){
            echo "<tr>";
            echo "<td>".$row['nazwisko']."</td>";
            echo "<td>".$row['imie']."</td>";
            echo "<td>".$row['funkcja']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "</tr>";
        }

        echo "</table>";

        mysqli_close($conn);
        ?>

    </section>
</main>

<footer>
    <p>Stronę wykonał: 123456</p>
</footer>

</body>
</html>
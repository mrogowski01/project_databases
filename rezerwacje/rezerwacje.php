<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="script.js"></script>
    <title>Rezerwacje</title>
</head>
<body>
<header class="title_page" id="title">
     
     <b id="klub" >Rezerwacje</b>

</header>

    <div class="rezerwacje_wyswietl" style="display: inline-block; float: left; width: 650px">
    <form method="POST">
    
    <select name="sekcja_rez" id="sekcja_rez">
    <option value="nie wybrano">Wybierz sekcję</option>
            <?php
            include '../connect.php';
            $sql_sekcja = "SELECT nazwa FROM projekt.sekcja;";
            $result = $pdo->query($sql_sekcja);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $sekcja) {
                    echo "<option value=\"$sekcja\">$sekcja</option>\n";
                }
            }
            $pdo = null;
            ?>
            </select>

            <select name="pracownik" id="pracownik">
    <option value="nie wybrano">Wybierz pracownika</option>
    <?php

        include '../connect.php';
        $sql_p = "SELECT * FROM projekt.pracownicy;";
        $sth = $pdo->prepare($sql_p);
        $sth->execute();
        $row = $sth->fetchAll();

        foreach ($row as $p) {
            $p_imie = $p[0];
            $p_nazwisko = $p[1];
            $p_zawod = $p[2];
            echo "<option value=\"$p_imie $p_nazwisko $p_zawod\">$p_imie $p_nazwisko $p_zawod</option>\n";
        } 
        
        $pdo = null;
        ?>
        </select>




            <input type="submit" name="submit" value="Wyświetl rezerwacje pracowników z wybranej sekcji">
            </form>
    
    <?php
    if (isset($_POST["submit"])) {
        include '../connect.php';
        $sekcja_rez = $_POST["sekcja_rez"];
        $pracownik = $_POST["pracownik"];

        echo "<label> Sekcja sportowa: $sekcja_rez </label>";
        echo "<label> Pracownik: $pracownik </label>";

        if($sekcja_rez != "nie wybrano" && $pracownik == "nie wybrano"){
            $sql_r = "select * from find_rezerwacje_sek(?);";
            $sth = $pdo->prepare($sql_r);
            $sth->bindParam(1, $sekcja_rez);
            $sth->execute();

            echo'<table border="1">';
            echo '<tr><th> Imię pracownika </th><th> Nazwisko pracownika </th><th> Zawód </th><th> Dzień </th><th> Godzina </th><th> Imię zawodnika </th><th> Nazwisko zawodnika </th></tr>';
            foreach($sth as $row){
                echo "<tr><td>" .$row['imie_p']."</td><td>".$row['nazwisko_p']."</td><td>".$row['zawod']."</td><td>".$row['dzien']."</td><td>".$row['godz']."</td><td>".$row['imie_zaw']."</td><td>".$row['nazwisko_zaw']."</td></tr>";
            }
            echo'</table>';
        
        }
        else if($pracownik != "nie wybrano" && $sekcja_rez == "nie wybrano"){
            $sql_r = "select * from find_rezerwacja_prac(?, ?, ?);";
            $pracownik_explode = explode(' ', $pracownik);
            $pracownik_imie = $pracownik_explode[0];
            $pracownik_nazwisko = $pracownik_explode[1];
            $pracownik_zawod = $pracownik_explode[2];

            $sth = $pdo->prepare($sql_r);
            $sth->bindParam(1, $pracownik_imie);
            $sth->bindParam(2, $pracownik_nazwisko);
            $sth->bindParam(3, $pracownik_zawod);
            $sth->execute();

            echo'<table border="1">';
            echo '<tr><th> Dzień </th><th> Godzina </th><th> Imię zawodnika </th><th> Nazwisko zawodnika </th></tr>';
            foreach($sth as $row){
                echo "<tr><td>".$row['dzien']."</td><td>".$row['godz']."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td></tr>";
            }
            echo'</table>';
        }
        else if($sekcja_rez == "nie wybrano"){
            $sql_r = "select * from projekt.rezerwacje;";
            $sth = $pdo->prepare($sql_r);
            $sth->execute();
            
            echo'<table border="1">';
            echo '<tr><th> Imię pracownika </th><th> Nazwisko pracownika </th><th> Zawód </th><th> Dzień </th><th> Godzina </th><th> Imię zawodnika </th><th> Nazwisko zawodnika </th></tr>';
            foreach($sth as $row){
                echo "<tr><td>" .$row['imie_p']."</td><td>".$row['nazwisko_p']."</td><td>".$row['zawod']."</td><td>".$row['dzien']."</td><td>".$row['godz']."</td><td>".$row['imie_zaw']."</td><td>".$row['nazwisko_zaw']."</td></tr>";
            }
            echo'</table>';
        }
        else{
            $sql_r = "select * from find_rezerwacja_prac_sek(?, ?, ?, ?);";
            $pracownik_explode = explode(' ', $pracownik);
            $pracownik_imie = $pracownik_explode[0];
            $pracownik_nazwisko = $pracownik_explode[1];
            $pracownik_zawod = $pracownik_explode[2];

            $sth = $pdo->prepare($sql_r);
            $sth->bindParam(1, $pracownik_imie);
            $sth->bindParam(2, $pracownik_nazwisko);
            $sth->bindParam(3, $pracownik_zawod);
            $sth->bindParam(4, $sekcja_rez);
            $sth->execute();
            echo'<table border="1">';
            echo '<tr><th> Dzień </th><th> Godzina </th><th> Imię zawodnika </th><th> Nazwisko zawodnika </th></tr>';
            foreach($sth as $row){
                echo "<tr><td>".$row['dzien']."</td><td>".$row['godz']."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td></tr>";
            }
            echo'</table>';

        }

       

   
    }
    ?>
    </div>
    <div style="display: inline-block;">
    <div class="rezerwacje_dodaj" style="padding: 50px;">
        <form name="rezerwacje_dodaj" action="rezerwacje_dodaj.php" method="post">
        <div>
            <label>
                Dodaj rezerwację dla zawodnika z sekcji sportowej u jednego z pracowników: 
            </label>
        </div>
        <select name="sekcja" id="sekcja">
    <option value="nie wybrano">Wybierz sekcję</option>
            <?php
            include '../connect.php';
            $sql_sekcja = "SELECT nazwa FROM projekt.sekcja;";
            $result = $pdo->query($sql_sekcja);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $sekcja) {
                    echo "<option value=\"$sekcja\">$sekcja</option>\n";
                }
            }
            $pdo = null;
            ?>
            </select> 
        <input type="button" onclick="pokaz_zawodnikow();" name="szukaj" value="Szukaj dla wybranej sekcji">
        <div id="opcje_zawodnicy">
        </div>
            <div>
            <label c>
                Wybierz dzień: 
            </label>
            <select name="dzien_rez" id="dzien_rez">
            <option value="poniedziałek">poniedziałek</option>
            <option value="wtorek">wtorek</option>
            <option value="środa">środa</option>
            <option value="czwartek">czwartek</option>
            <option value="piątek">piątek</option>
            <option value="sobota">sobota</option>
            <option value="niedziela">niedziela</option>
            </select>   
            </div>
            <div>
            <label>
                Wpisz godzinę: 
            </label>
            <input type="time" name="godz_rez" required/>
            </div>
            <button type="submit" name="action">Dodaj</button>
            </form>
            <a class="aa" href="../"> Powrót do strony głównej</a>
        </div>

    
        </div>




</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Pracownicy</title>
</head>
<body>
<header class="title_page" id="title">
     
     <b id="klub" >Pracownicy</b>

</header>
    <div class="pracownicy_wyswietl" style="display: inline-block; float: left; width: 600px;">
    
    <!-- <?php
        include '../connect.php';


        echo'<table border="1">';
        echo '<tr><th> ID sekcji </th><th> Nazwa sekcji sportowej </th><th> Imię </th><th> Nazwisko </th><th> Zawód </th></tr>';
        $sql = "SELECT * FROM projekt.pracownicy_sek;";
        foreach($pdo->query($sql) as $row){
            echo "<tr><td>" .$row['id_sekcja']."</td><td>" .$row['nazwa']."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['zawod']."</td></tr>";
        }
        echo'</table>';
        $pdo = null;
        
        ?> -->
    <form method="POST">


 <select name="sekcja_p" id="sekcja_p">
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

            <input type="submit" name="submit" value="Wyświetl pracowników">
            </form>
    
    <?php
    if (isset($_POST["submit"])) {
        include '../connect.php';
        $sekcja_p = $_POST["sekcja_p"];
        
        echo "<label> Sekcja sportowa: $sekcja_p </label>";

        if($sekcja_p != "nie wybrano"){

            $sql_l = "select * from count_pracownik_sek(?);";
            $sth2 = $pdo->prepare($sql_l);
            $sth2->bindParam(1, $sekcja_p);
            $sth2->execute();
            $result = $sth2->fetch();
            $liczba_pracownikow = $result['count_pracownik_sek'];
            echo "<label> Liczba pracowników: $liczba_pracownikow </label>";

            $sql_p = "select * from find_pracownik_sek(?);";
            $sth = $pdo->prepare($sql_p);
            $sth->bindParam(1, $sekcja_p);
            $sth->execute();
            echo'<table border="1">';
            echo '<tr><th> Imię </th><th> Nazwisko </th><th> Zawód </th></tr>';
            foreach($sth as $row){
                echo "<tr><td>" .$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['zawod']."</td></tr>";
            }
            echo'</table>';

        }
        else if($sekcja_p == "nie wybrano"){
            $sql_l = "select * from count_prac();";
            $sth2 = $pdo->prepare($sql_l);
            $sth2->execute();
            $result = $sth2->fetch();
            $liczba_pracownikow = $result['count_prac'];

            echo "<label> Liczba pracowników: $liczba_pracownikow </label>";
            echo'<table border="1">';
            echo '<tr><th> ID sekcji </th><th> Nazwa sekcji sportowej </th><th> Imię </th><th> Nazwisko </th><th> Zawód </th></tr>';
            $sql = "select * from projekt.pracownicy_sek;";
            foreach($pdo->query($sql) as $row){
                echo "<tr><td>" .$row['id_sekcja']."</td><td>" .$row['nazwa']."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['zawod']."</td></tr>";
            }
            echo'</table>';
            }
        $pdo = null;
    }
    ?>



    </div>
    <div style="display: inline-block;">
    <div class="pracownik_dodaj" style="padding: 30px;">
        <form name="pracownik_dodaj" action="pracownik_dodaj.php" method="post"> 

        <div>
            <label>
                Dodaj pracownika: 
            </label>
            </div>
            <div>
            <label>
                Wpisz imię: 
            </label>
            <input type="text" name="pracownik_imie" required/>
            </div>
            <div>
            <label>
                Wpisz nazwisko: 
            </label>
            <input type="text" name="pracownik_nazwisko" required/>
            </div>
            <div>
            <label>
                Wpisz zawód: 
            </label>
            <input type="text" name="pracownik_zawod" required/>
    </div>

            <button type="submit" name="action">Dodaj</button>
            </form>
        </div>
        <div class="pracownik_sekcja_dodaj" style="display: block; padding: 30px;">
        <form name="pracownik_sekcja_dodaj" action="pracownik_sekcja_dodaj.php" method="post"> 
        <div>
            <label>
                Dodaj pracownika do wybranej sekcji sportowej: 
            </label>
            </div>
            <select name="pracownik" id="pracownik">
            <option value="nie wybrano">Wybierz pracownika</option>
            <?php
            include '../connect.php';
            $sql_sekcja = "SELECT imie, nazwisko, zawod FROM projekt.pracownik;";
            $result = $pdo->query($sql_sekcja);
            $row = $result->fetchAll(); 
            foreach ($row as $p) {
                $p_imie = $p[0];
                $p_nazwisko = $p[1];
                $p_zawod = $p[2];
                echo "<option value=\"$p_imie|$p_nazwisko|$p_zawod\">$p_imie $p_nazwisko $p_zawod</option>\n";
                // echo "<option value=\"$p[0]|$p[1]\">$p[0] $p[1] $p[2]</option>\n";
            }
            $pdo = null;
            ?>
            </select>
            <select name="sekcja_p" id="sekcja_p">
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
            <button type="submit" name="action">Dodaj</button>
        </form>
        <a class="aa" href="../"> Powrót do strony głównej</a>
        </div>
        </div>


            







</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Zawodnicy</title>
</head>
<body>
<header class="title_page" id="title">
     
     <b id="klub" >Zawodnicy</b>

</header>

    <div class="zawodnicy_wyswietl" style="display: inline-block; float: left; width: 400px;">
    <form method="POST">
    <select name="poziom_z" id="poziom_z">
    <option value="nie wybrano">Wybierz poziom</option>
    <?php

        include '../connect.php';
        $sql = "SELECT poziom FROM projekt.poziom_zaw;";
        $result = $pdo->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            foreach ($row as $poziom) {
                echo "<option value=\"$poziom\">$poziom</option>\n";
            }
        }
        $pdo = null;
        ?>
        </select>
    
    <select name="sekcja_z" id="sekcja_z">
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
            <input type="submit" name="submit" value="Wyświetl zawodników">
            </form>
    
    <?php
    if (isset($_POST["submit"])) {
        include '../connect.php';
        $poziom_z = $_POST["poziom_z"];
        $sekcja_z = $_POST["sekcja_z"];
        
        echo "<label> Poziom: $poziom_z </label>";
        echo "<label> Sekcja sportowa: $sekcja_z </label>";

        if($sekcja_z == "nie wybrano" && $poziom_z != "nie wybrano"){
        $sql_p = "select * from find_zawodnik_poz(?);";
        $sth = $pdo->prepare($sql_p);
        $sth->bindParam(1, $poziom_z);
        $sth->execute();
        
        $sql_l = "select * from count_poz(?);";
        $sth2 = $pdo->prepare($sql_l);
        $sth2->bindParam(1, $poziom_z);
        $sth2->execute();
        $result = $sth2->fetch();
        $liczba_z = $result['count_poz'];
        echo "<label> Liczba zawodników: $liczba_z </label>";
        }
        else if($poziom_z == "nie wybrano" && $sekcja_z != "nie wybrano"){
            $sql_s = "select * from find_zawodnik_sek(?);";
            $sth = $pdo->prepare($sql_s);
            $sth->bindParam(1, $sekcja_z);
            $sth->execute();
            
            $sql_l = "select * from count_sek(?);";
            $sth2 = $pdo->prepare($sql_l);
            $sth2->bindParam(1, $sekcja_z);
            $sth2->execute();
            $result = $sth2->fetch();
            $liczba_z = $result['count_sek'];
            echo "<label> Liczba zawodników: $liczba_z </label>";
            }
        else if(!($sekcja_z == "nie wybrano" && $poziom_z == "nie wybrano")){

            $sql_p = "select * from find_zawodnik_poz_sek(?, ?);";
            $sth = $pdo->prepare($sql_p);
            $sth->bindParam(1, $poziom_z);
            $sth->bindParam(2, $sekcja_z);
            $sth->execute();

            $sql_l = "select * from count_poz_sek(?, ?);";
            $sth2 = $pdo->prepare($sql_l);
            $sth2->bindParam(1, $poziom_z);
            $sth2->bindParam(2, $sekcja_z);
            $sth2->execute();
            $result = $sth2->fetch();
            $liczba_z = $result['count_poz_sek'];
            echo "<label> Liczba zawodników: $liczba_z </label>";
        }
        if(!($sekcja_z == "nie wybrano" && $poziom_z == "nie wybrano")){
        echo'<table border="1">';
        echo '<tr><th> ID zawodnika </th><th> Imię </th><th> Nazwisko </th><th> Wiek </th></tr>';
        foreach($sth as $row){
            echo "<tr><td>" .$row['id_zaw']."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['wiek']."</td></tr>";
        }
        echo'</table>';
    }

        else if($sekcja_z == "nie wybrano" && $poziom_z == "nie wybrano"){
            $sql = "select * from projekt.zawodnicy;";
            $sth = $pdo->prepare($sql);
            $sth->execute();

            $sql_l = "select * from count_();";
            $sth2 = $pdo->prepare($sql_l);
            $sth2->execute();
            $result = $sth2->fetch();
            $liczba_z = $result['count_'];
            echo "<label> Liczba zawodników: $liczba_z </label>";
            echo'<table border="1">';
            echo '<tr><th> ID zawodnika </th><th> Imię </th><th> Nazwisko </th><th> Wiek </th><th> Poziom </th></tr>';
            foreach($sth as $row){
                echo "<tr><td>" .$row['id_zaw']."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['wiek']."</td><td>".$row['poziom']."</td></tr>";
            }
            echo'</table>';
            }

        $pdo = null;
    }
    ?>
    </div>
    <div style="display: inline-block;">
    <div style="padding: 20px;">
                <form method="post" action="poziom_dodaj.php">
                <div>
                <label>
                Dodaj nowy poziom: 
            </label>
            <label>
                Wpisz poziom: 
            </label>
            <input type="text" name="poziom_nowy" required/>
            </div>
            <button type="submit" name="action">Dodaj</button>
        </form>
            </div>
    <div class="zawodnicy_dodaj" style="padding: 20px;">
        <form name="zawodnicy_dodaj" action="zawodnicy_dodaj.php" method="post"> 

        <div>
            <label>
                Dodaj nowego zawodnika: 
            </label>
        </div>  
            <div>
            <label>
                Wpisz imię: 
            </label>
            <input type="text" name="zawodnik_imie" required/>
            </div>
            <div>
            <label>
                Wpisz nazwisko: 
            </label>
            <input type="text" name="zawodnik_nazwisko" required/>
            </div>
            <div>
            <label>
                Wpisz wiek: 
            </label>
            <input type="number" min="15" max="99" name="zawodnik_wiek" required/>
            </div>
            
            <div>
            <label>
                Wybierz poziom zawodnika:
            </label>
            
            <select name="poziom_zaw" id="poziom_zaw">
            <option value="nie wybrano">Wybierz poziom</option>
            <?php

            include '../connect.php';
            $sql = "SELECT poziom FROM projekt.poziom_zaw;";
            $result = $pdo->query($sql);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $poziom) {
                    echo "<option value=\"$poziom\">$poziom</option>\n";
                }
            }
            $pdo = null;
            ?>
            </select>
        </div>
            <button type="submit" name="action">Dodaj</button>
            </form>
        </div>

        <div class="zawodnicy_sekcja_dodaj" style="display: block; padding: 20px;">
        <form name="zawodnicy_sekcja_dodaj" action="zawodnicy_sekcja_dodaj.php" method="post"> 
    
            <div>
            <label>
                Dodaj zawodnika do wybranej sekcji sportowej:
            </label>
            
            <select name="zawodnik" id="zawodnik">
            <option value="nie wybrano">Wybierz zawodnika</option>
            <?php
            include '../connect.php';
            $sql_sekcja = "SELECT * FROM projekt.zawodnik_poz;";
            $result = $pdo->query($sql_sekcja);
            $row = $result->fetchAll(); 
            foreach ($row as $z) {
                $z_imie = $z[0];
                $z_nazwisko = $z[1];
                $z_poziom = $z[2];
                echo "<option value=\"$z_imie|$z_nazwisko|$z_poziom\">$z_imie $z_nazwisko $z_poziom</option>\n";
            }
            $pdo = null;
            ?>
            </select>
            
            <select name="sekcja_zaw" id="sekcja_zaw">
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
            </div>
            
            <button type="submit" name="action">Dodaj</button>
            </form>
            <a class="aa" href="../"> Powrót do strony głównej</a>
        </div>
        </div>

            



</body>
</html>

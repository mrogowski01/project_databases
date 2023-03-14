<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    
    <title>Zajęcia</title>
</head>
<body>
<header class="title_page" id="title">
     
     <b id="klub" >Zajęcia</b>

</header>
    <div class="zajecia_wyswietl" style="display: block; float: left; padding: 30px; width: 600px">
    <form method="POST">
        

    <select name="sekcja_zaj" id="sekcja_zaj">
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
            <input type="submit" name="submit" value="Wyświetl zajęcia">
            </form>
    
    <?php
    if (isset($_POST["submit"])) {
        include '../connect.php';
        $sekcja_zaj = $_POST["sekcja_zaj"];
        
        echo "<label> Sekcja sportowa: $sekcja_zaj </label>";
        if($_POST["sekcja_zaj"] == "nie wybrano"){
        $sql_p = "select * from projekt.zajecia_sek;";
        $sth = $pdo->prepare($sql_p);
        $sth->execute();
        // $result = $sth->fetchAll();
        }
        else{
            $sql_p = "select * from find_zajecia(?);";
            $sth = $pdo->prepare($sql_p);
            $sth->bindParam(1, $sekcja_zaj);
            $sth->execute();
        }

        echo'<table border="1">';
        echo '<tr><th> Nazwa sekcji </th><th> Dzień </th><th> Godzina rozpoczęcia </th><th> Godzina zakończenia </th></tr>';
        foreach($sth as $row){
            echo "<tr><td>" .$row['nazwa']."</td><td>".$row['dzien']."</td><td>".$row['godz_rozp']."</td><td>".$row['godz_zak']."</td></tr>";
        }
        echo'</table>';
       
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            foreach ($row as $sekcja) {
                echo "<option value=\"$sekcja\">$sekcja</option>\n";
            }
        }

        $pdo = null;
    }
    ?>

    </div>

    <div class="zajecia_dodaj" style="display: inline-block; padding: 50px">
        <form name="zajecia_dodaj" action="zajecia_dodaj.php" method="post"> 
        <div>
            <label c>
                Dodaj zajęcia do wybranej sekcji sportowej: 
            </label>
        </div>
            <div>
            <label c>
                Wybierz dzień: 
            </label>
            <select name="dzien_zaj" id="dzien_zaj">
            <option value="poniedziałek">poniedziałek</option>
            <option value="wtorek">wtorek</option>
            <option value="środa">środa</option>
            <option value="czwartek">czwartek</option>
            <option value="piątek">piątek</option>
            </select>   
            </div>
            <div>
            <label>
                Wpisz godzinę rozpoczęcia: 
            </label>
            <input type="time" name="zajecia_godz_rozp" required/>
            </div>
            <div>
            <label>
                Wpisz godzinę zakończenia: 
            </label>
            <input type="time" name="zajecia_godz_zak" required/>
            </div>
            <div>
            <label>
                Wybierz sekcję: 
            </label>
            </div>
            <select name="sekcja_z" id="sekcja_z">
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

            <div>
    <a class="aa" href="../"> Powrót do strony głównej</a>
    </div>
    </div>





</body>
</html>

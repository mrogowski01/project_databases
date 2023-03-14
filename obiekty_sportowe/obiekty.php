<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Obiekty sportowe</title>
</head>
<body>
<header class="title_page" id="title">
     
     <b id="klub" >Obiekty sportowe</b>

</header>
    <div class="sekcje_wyswietl" style="display: inline-block; float: left;">
    <?php
        include '../connect.php';


        echo'<table border="1">';
        echo '<tr><th> ID sekcji </th><th> Nazwa sekcji sportowej </th><th> Nazwa obiektu sportowego </th></tr>';
        $sql = "SELECT * FROM projekt.obiekty;";

        foreach($pdo->query($sql) as $row){
            echo "<tr><td>" .$row['id_sekcja']."</td><td>".$row['nazwa_sekcji']."</td><td>".$row['nazwa_obiektu']."</td></tr>";
        }
        echo'</table>';

        $pdo = null;
        ?>
    </div>

    <div style="display: inline-block;">
    <div class="obiekt_dodaj" style="padding: 50px;">
        <form name="obiekt_dodaj" action="obiekt_dodaj.php" method="POST"> 
            <div>
            <label>
                Dodaj nowy obiekt sportowy dla wybranej sekcji sportowej: 
            </label>
            </div>
            <select name="sekcja_o" id="sekcja_o">
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
            <div>
                <label>
                    Wpisz nazwę obiektu:
        </label>
            <input type="text" name="obiekt_nowy" required/>
            </div>
            
            <button type="submit" name="action">Dodaj</button>
        </form>
    </div>

    <div class="obiekt_sekcja_dodaj" style="display: block; padding: 50px;">
        <form name="obiekt_sekcja_dodaj" action="obiekt_sekcja_dodaj.php" method="POST"> 
            <div>
            <label>
                Dodaj istniejący obiekt sportowy dla wybranej sekcji sportowej: 
            </label>
            </div>
            <select name="sekcja" id="sekcja">
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
            <div>
            <label>
                Wybierz obiekt: 
            </label>
            </div>
            <select name="obiekt" id="obiekt">
            <?php
            include '../connect.php';
            $sql_obiekt = "SELECT nazwa FROM projekt.obiekt_sportowy;";
            $result = $pdo->query($sql_obiekt);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $obiekt) {
                    echo "<option value=\"$obiekt\">$obiekt</option>\n";
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
        </div>





</body>
</html>

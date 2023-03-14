<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    
    <title>Trenerzy</title>
</head>
<body>
<header class="title_page" id="title">
     
     <b id="klub" >Trenerzy</b>

</header>
    <div class="trenerzy_wyswietl" style="display: block; float: left;">
    <?php
        include '../connect.php';


        echo'<table border="1">';
        echo '<tr><th> ID trenera </th><th> Imię </th><th> Nazwisko </th><th> Wiek </th><th> Nazwa sekcji sportowej </th></tr>';
        $sql = "SELECT * FROM projekt.trenerzy;";
        $sql_sekcja = "SELECT nazwa FROM projekt.sekcja;";
        foreach($pdo->query($sql) as $row){
            echo "<tr><td>" .$row['id_trener']."</td><td>" .$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['wiek']."</td><td>".$row['nazwa']."</td></tr>";
        }
        echo'</table>';
        $pdo = null;
        
        ?>
    </div>

    <div class="trener_dodaj" style="display: inline-block; padding: 30px">
        <form name="trener_dodaj" action="trener_dodaj.php" method="post"> 
        
            <div>
            <label>
                Dodaj trenera do wybranej sekcji:
            </label>
            </div>
            <div>
            <label>
                Wpisz imię: 
            </label>
            <input type="text" name="trener_imie" required/>
            </div>
            <div>
            <label>
                Wpisz nazwisko: 
            </label>
            <input type="text" name="trener_nazwisko" required/>
            </div>
            <div>
            <label>
                Wpisz wiek: 
            </label>
            <input type="number" min="18" max="99" name="trener_wiek" required/>
            </div>
            <div>
            <label>
                Wybierz sekcję: 
            </label>
            <select name="sekcja_t" id="sekcja_t">
            </div>
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

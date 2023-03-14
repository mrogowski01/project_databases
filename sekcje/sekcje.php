<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Sekcje sportowe</title>
</head>
<body>
<header class="title_page" id="title">
     
     <b id="klub" >Sekcje sportowe</b>

</header>
    <div class="sekcje_wyswietl" style="display: inline-block; float: left;">
    <?php
        include '../connect.php';


        echo'<table border="1">';
        echo '<tr><th> Nr sekcji </th><th> Nazwa sekcji </th></tr>';
        $sql = "SELECT * FROM projekt.sekcje;";

        foreach($pdo->query($sql) as $row){
            echo "<tr><td>" .$row['id_sekcja']."</td><td>".$row['nazwa']."</td></tr>";
        }
        echo'</table>';

        $pdo = null;
        ?>
    </div>

    <div class="sekcje_dodaj" style="display: inline-block; padding: 50px;">
        <form name="sekcja_dodaj" action="sekcja_dodaj.php" method="POST"> 
            <label>
                Wpisz nazwę nowej sekcji: 
            </label>
            <input type="text" name="sekcja_nowa" required/>
            <button type="submit" name="action">Dodaj</button>
        </form>
        <a class="aa" href="../"> Powrót do strony głównej</a>
    </div>







</body>
</html>

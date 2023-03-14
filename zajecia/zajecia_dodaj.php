<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Zajecia - dodawanie</title>
</head>
<body>


<?php
include '../connect.php';

    $zajecia_dzien = $_POST["dzien_zaj"];
    $zajecia_godz_rozp = $_POST["zajecia_godz_rozp"];
    $zajecia_godz_zak = $_POST["zajecia_godz_zak"];
    $sekcja_z = $_POST["sekcja_z"];

    $sql = "select * from get_id_sekcja(?);";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $sekcja_z);
    $sth->execute();
    $result = $sth->fetchAll();
    foreach($result as $id){
        $id_sekcja = $id['get_id_sekcja'];
    }
    $sql = "INSERT INTO projekt.zajecia(id_sekcja, dzien, godz_rozp, godz_zak) VALUES (:id_sekcja,:zajecia_dzien,:zajecia_godz_rozp,:zajecia_godz_zak)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_sekcja' => $id_sekcja, ':zajecia_dzien' => $zajecia_dzien,':zajecia_godz_rozp' => $zajecia_godz_rozp, ':zajecia_godz_zak' => $zajecia_godz_zak]);

    echo 'Dodano zajecia dla sekcji';
    echo "<table border=1>";
    echo "<tr><td> Nazwa sekcji </td><td> Dzien </td><td> Godzina rozp.</td><td> Godzina zak. </td></tr>";
    echo "<tr><td>" .$sekcja_z."</td><td>".$zajecia_dzien."</td><td>".$zajecia_godz_rozp."</td><td>".$zajecia_godz_zak."</td></tr>";
    echo "</table>";


    echo '<br><a class="aa" href="./zajecia.php"> Powrót do zajęć</a>';




    $pdo = null;
?>


</body>
</html>

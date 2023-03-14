<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Zawodnik - dodawanie</title>
</head>
<body>


<?php
include '../connect.php';

    $zawodnik_imie = $_POST["zawodnik_imie"];
    $zawodnik_nazwisko = $_POST["zawodnik_nazwisko"];
    $zawodnik_wiek = $_POST["zawodnik_wiek"];
    $poziom_zaw = $_POST["poziom_zaw"];

    $sql2 = "select * from get_id_poziom(?);";
    $sth = $pdo->prepare($sql2);
    $sth->bindParam(1, $_POST["poziom_zaw"]);
    $sth->execute();
    $result = $sth->fetchAll();
    foreach($result as $id){
        $id_poziom = $id['get_id_poziom'];
    }

    $sql_z = "INSERT INTO projekt.zawodnik(imie, nazwisko, wiek, id_poziom) VALUES (:zawodnik_imie,:zawodnik_nazwisko,:zawodnik_wiek,:id_poziom)";
    $stmt = $pdo->prepare($sql_z);
    $stmt->execute([':zawodnik_imie' => $zawodnik_imie,':zawodnik_nazwisko' => $zawodnik_nazwisko, ':zawodnik_wiek' => $zawodnik_wiek, ':id_poziom' => $id_poziom]);


    echo 'Dodano nowego zawodnika';
    echo '<table border="1">';
    echo '<tr><th> Imię </th><th> Nazwisko </th><th> Wiek </th><th> Poziom </th></tr>';
    echo "<tr><td>".$zawodnik_imie."</td><td>".$zawodnik_nazwisko."</td><td>".$zawodnik_wiek."</td><td>".$poziom_zaw."</td></tr>";
    echo '</table>';

    echo '<br><a class="aa" href="./zawodnicy.php"> Powrót do zawodników</a>';




    $pdo = null;
?>


</body>
</html>

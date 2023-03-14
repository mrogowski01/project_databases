<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Trener - dodawanie</title>
</head>
<body>


<?php
include '../connect.php';

    $trener_imie = $_POST["trener_imie"];
    $trener_nazwisko = $_POST["trener_nazwisko"];
    $trener_wiek = $_POST["trener_wiek"];
    $sekcja_t = $_POST["sekcja_t"];

    $sql = "select * from get_id_sekcja(?);";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $sekcja_t);
    $sth->execute();
    $result = $sth->fetchAll();
    foreach($result as $id){
        $id_sekcja = $id['get_id_sekcja'];
    }
    $sql = "INSERT INTO projekt.trener(id_sekcja, imie, nazwisko, wiek) VALUES (:id_sekcja,:trener_imie,:trener_nazwisko,:trener_wiek)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_sekcja' => $id_sekcja, ':trener_imie' => $trener_imie,':trener_nazwisko' => $trener_nazwisko, ':trener_wiek' => $trener_wiek]);

    echo 'Dodano trenera';
    echo'<table border="1">';
    echo '<tr><th> Imię </th><th> Nazwisko </th><th> Wiek </th><th> Nazwa sekcji sportowej </th></tr>';
    echo "<tr><td>" .$trener_imie."</td><td>".$trener_nazwisko."</td><td>".$trener_wiek."</td><td>".$sekcja_t."</td></tr>";
    echo'</table>';

    echo '<br><a class="aa" href="./trenerzy.php"> Powrót do trenerów</a>';




    $pdo = null;
?>


</body>
</html>

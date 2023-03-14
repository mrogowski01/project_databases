<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Zawodnik - dodawanie do sekcji</title>
</head>
<body>


<?php
include '../connect.php';

    $zawodnik = $_POST["zawodnik"];
    $zawodnik_explode = explode('|', $zawodnik);
    $zawodnik_imie = $zawodnik_explode[0];
    $zawodnik_nazwisko = $zawodnik_explode[1];
    $zawodnik_poziom = $zawodnik_explode[2];
    $sekcja_nazwa = $_POST["sekcja_zaw"];


    $sql_z = "select * from get_id_zawodnik(?, ?, ?);";
    $sth2 = $pdo->prepare($sql_z);
    $sth2->bindParam(1, $zawodnik_imie);
    $sth2->bindParam(2, $zawodnik_nazwisko);
    $sth2->bindParam(3, $zawodnik_poziom);
    $sth2->execute();
    $result2 = $sth2->fetchAll();
    foreach($result2 as $id){
        $id_zawodnik = $id['get_id_zawodnik'];
    }

    $sql_s = "select * from get_id_sekcja(?);";
    $sth = $pdo->prepare($sql_s);
    $sth->bindParam(1, $sekcja_nazwa);
    $sth->execute();
    $result = $sth->fetch();
    // foreach($result as $id){
        $id_sekcja = $result['get_id_sekcja'];
    // }

    $sql2 = "INSERT INTO projekt.zawodnik_sekcja(id_zaw, id_sekcja) VALUES (:id_zawodnik, :id_sekcja);";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([':id_zawodnik' => $id_zawodnik, ':id_sekcja' => $id_sekcja]);

    echo 'Dodano zawodnika do sekcji';
    echo '<table border="1">';
    echo '<tr><th> ID zawodnika </th><th> Imię </th><th> Nazwisko </th><th> Poziom </th><th> Nazwa sekcji </th></tr>';
    echo "<tr><td>" .$id_zawodnik."</td><td>".$zawodnik_imie."</td><td>".$zawodnik_nazwisko."</td><td>".$zawodnik_poziom."</td><td>".$sekcja_nazwa."</td></tr>";
    echo '</table>';

    echo '<br><a class="aa" href="./zawodnicy.php"> Powrót do zawodników</a>';




    $pdo = null;
?>


</body>
</html>

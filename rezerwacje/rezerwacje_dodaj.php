<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Pracownik - dodawanie do sekcji</title>
</head>
<body>


<?php
include '../connect.php';

    $zawodnik = $_POST["zawodnik"];
    $zawodnik_explode = explode('|', $zawodnik);
    $zawodnik_imie = $zawodnik_explode[0];
    $zawodnik_nazwisko = $zawodnik_explode[1];
    $zawodnik_poziom = $zawodnik_explode[2];
    $sekcja = $_POST["sekcja"];

    $pracownik = $_POST["pracownik"];
    $pracownik_explode = explode('|', $pracownik);
    $pracownik_imie = $pracownik_explode[0];
    $pracownik_nazwisko = $pracownik_explode[1];
    $pracownik_zawod = $pracownik_explode[2];

    $dzien_rez = $_POST["dzien_rez"];
    $godz_rez = $_POST["godz_rez"];


    $sql_p = "select * from get_id_pracownik(?, ?, ?);";
    $sth2 = $pdo->prepare($sql_p);
    $sth2->bindParam(1, $pracownik_imie);
    $sth2->bindParam(2, $pracownik_nazwisko);
    $sth2->bindParam(3, $pracownik_zawod);
    $sth2->execute();
    $result2 = $sth2->fetchAll();
    foreach($result2 as $id){
        $id_pracownik = $id['get_id_pracownik'];
    }

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


    // $sql_s = "select * from get_id_sekcja(?);";
    // $sth = $pdo->prepare($sql_s);
    // $sth->bindParam(1, $sekcja_nazwa);
    // $sth->execute();
    // $result = $sth->fetch();
    // // foreach($result as $id){
    //     $id_sekcja = $result['get_id_sekcja'];
    // // }



    $sql = "INSERT INTO projekt.rezerwacja(id_pracownik, dzien, godz, id_zaw) VALUES (:id_pracownik,:dzien,:godz,:id_zawodnik)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_pracownik' => $id_pracownik, ':dzien' => $dzien_rez, ':godz' => $godz_rez, ':id_zawodnik' => $id_zawodnik]);
    
    echo 'Dodano rezerwacje dla zawodnika ';
    echo "<table border=1>";
    echo "<tr><td> Imie </td><td> Nazwisko </td><td> Zawód </td><td> Dzien </td><td> Godzina </td><td> Imię zawodnika </td><td> Nazwisko zawodnika </td></tr>";
    echo "<tr><td>" .$pracownik_imie."</td><td>".$pracownik_nazwisko."</td><td>".$pracownik_zawod."</td><td>".$dzien_rez."</td><td>".$godz_rez."</td><td>" .$zawodnik_imie."</td><td>".$zawodnik_nazwisko."</td></tr>";
    echo "</table>";

    echo '<br><a class="aa" href="./rezerwacje.php"> Powrót do rezerwacji</a>';




    $pdo = null;
?>


</body>
</html>

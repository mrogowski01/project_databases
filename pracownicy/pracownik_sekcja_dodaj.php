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

    $pracownik = $_POST["pracownik"];
    $pracownik_explode = explode('|', $pracownik);
    $pracownik_imie = $pracownik_explode[0];
    $pracownik_nazwisko = $pracownik_explode[1];
    $pracownik_zawod = $pracownik_explode[2];
    $sekcja_nazwa = $_POST["sekcja_p"];


    $sql_o = "select * from get_id_pracownik(?, ?, ?);";
    $sth2 = $pdo->prepare($sql_o);
    $sth2->bindParam(1, $pracownik_imie);
    $sth2->bindParam(2, $pracownik_nazwisko);
    $sth2->bindParam(3, $pracownik_zawod);
    $sth2->execute();
    $result2 = $sth2->fetchAll();
    foreach($result2 as $id){
        $id_pracownik = $id['get_id_pracownik'];
    }

    $sql_s = "select * from get_id_sekcja(?);";
    $sth = $pdo->prepare($sql_s);
    $sth->bindParam(1, $sekcja_nazwa);
    $sth->execute();
    $result = $sth->fetch();
    $id_sekcja = $result['get_id_sekcja'];
   

    $sql2 = "INSERT INTO projekt.pracownik_sekcja(id_pracownik, id_sekcja) VALUES (:id_pracownik, :id_sekcja);";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([':id_pracownik' => $id_pracownik, ':id_sekcja' => $id_sekcja]);

    echo 'Dodano pracownika do sekcji';
    echo'<table border="1">';
    echo '<tr><th> Imię </th><th> Nazwisko </th><th> Zawód </th><th> Nazwa sekcji </th></tr>';
    echo "<tr><td>".$pracownik_imie."</td><td>".$pracownik_nazwisko."</td><td>".$pracownik_zawod."</td><td>".$sekcja_nazwa."</td></tr>";
    echo'</table>';

    echo '<br><a class="aa" href="./pracownicy.php"> Powrót do pracowników</a>';




    $pdo = null;
?>


</body>
</html>

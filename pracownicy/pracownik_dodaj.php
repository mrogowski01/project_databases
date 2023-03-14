<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Pracownik - dodawanie</title>
</head>
<body>


<?php
include '../connect.php';

    $pracownik_imie = $_POST["pracownik_imie"];
    $pracownik_nazwisko = $_POST["pracownik_nazwisko"];
    $pracownik_zawod = $_POST["pracownik_zawod"];

    $sql = "INSERT INTO projekt.pracownik(imie, nazwisko, zawod) VALUES (:pracownik_imie, :pracownik_nazwisko, :pracownik_zawod)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':pracownik_imie' => $pracownik_imie, ':pracownik_nazwisko' => $pracownik_nazwisko, ':pracownik_zawod' => $pracownik_zawod]);

    echo 'Dodano pracownika';
    echo'<table border="1">';
    echo '<tr><th> Imię </th><th> Nazwisko </th><th> Zawód </th></tr>';
    echo "<tr><td>".$pracownik_imie."</td><td>".$pracownik_nazwisko."</td><td>".$pracownik_zawod."</td></tr>";
    echo'</table>';

    echo '<br><a class="aa" href="./pracownicy.php"> Powrót do pracowników</a>';




    $pdo = null;
?>


</body>
</html>

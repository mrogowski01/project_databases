<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Poziom - dodaj</title>
</head>
<body>


<?php


include '../connect.php';


    $poziom_nowy = $_POST["poziom_nowy"];
    $sql = "INSERT INTO projekt.poziom_zaw(poziom) VALUES (:poziom_nowy)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([':poziom_nowy' => $poziom_nowy]);

    echo 'Dodano poziom '; 
    echo $poziom_nowy;

    echo '<br><a class="aa" href="./zawodnicy.php"> Powrót do zawodników</a>';




        $pdo = null;
?>


</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Sekcje sportowe - dodawanie</title>
</head>
<body>


<?php


include '../connect.php';


$sekcja_nazwa = $_POST["sekcja_nowa"];

    $sql = "INSERT INTO projekt.sekcja(nazwa) VALUES (:sekcja_nazwa)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([':sekcja_nazwa' => $sekcja_nazwa]);
    echo 'Dodano sekcję';
    echo '<table border="1">';
    echo "<tr><td> Nazwa sekcji </td></tr>";
    echo "<tr><td>".$sekcja_nazwa."</td></tr>";    
    echo "</table>";


    echo '<br><a class="aa" href="./sekcje.php"> Powrót do sekcji</a>';




        $pdo = null;
?>


</body>
</html>

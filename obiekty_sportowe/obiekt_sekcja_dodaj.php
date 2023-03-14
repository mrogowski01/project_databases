<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Obiekt sportowy - dodawanie do sekcji</title>
</head>
<body>


<?php
include '../connect.php';

    $obiekt_nazwa = $_POST["obiekt"];
    $sekcja_nazwa = $_POST["sekcja"];


    $sql_o = "select * from get_id_obiekt(?);";
    $sth2 = $pdo->prepare($sql_o);
    $sth2->bindParam(1, $_POST["obiekt"]);
    $sth2->execute();
    $result2 = $sth2->fetchAll();
    foreach($result2 as $id){
        $id_obiekt = $id['get_id_obiekt'];
    }

    $sql_s = "select * from get_id_sekcja(?);";
    $sth = $pdo->prepare($sql_s);
    $sth->bindParam(1, $_POST["sekcja"]);
    $sth->execute();
    $result = $sth->fetchAll();
    foreach($result as $id){
        $id_sekcja = $id['get_id_sekcja'];
    }


    $sql2 = "INSERT INTO projekt.obiekt_sekcja(id_obiekt, id_sekcja) VALUES (:id_obiekt, :id_sekcja);";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([':id_obiekt' => $id_obiekt, ':id_sekcja' => $id_sekcja]);

    echo 'Dodano obiekt do sekcji';
    echo'<table border="1">';
    echo '<tr><th> ID sekcji </th><th> Nazwa sekcji sportowej </th><th> Nazwa obiektu sportowego </th></tr>';
    echo "<tr><td>" .$id_sekcja."</td><td>".$sekcja_nazwa."</td><td>".$obiekt_nazwa."</td></tr>";
    echo "</table>";

    echo '<br><a class="aa" href="./obiekty.php"> Powrót do obiektów</a>';




    $pdo = null;
?>


</body>
</html>

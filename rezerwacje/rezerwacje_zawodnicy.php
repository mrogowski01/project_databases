<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Rezerwacje</title>
</head>
<body>
<?php
    include '../connect.php';
    $sekcja = $_GET["sekcja"];

    $sql_z = "select * from find_zawodnik_sek(?);";
    $sth = $pdo->prepare($sql_z);
    $sth->bindParam(1, $sekcja);
    $sth->execute();
    $row = $sth->fetchAll();

    $out = <<<HTML
    <select name="zawodnik" id="zawodnik">
    <option value="nie wybrano">Wybierz zawodnika</option>
    HTML;
    
    foreach ($row as $z) {
        $z_imie = $z[1];
        $z_nazwisko = $z[2];
        $z_poziom = $z[4];
        $out = $out . <<< HTML
        <option value="$z_imie|$z_nazwisko|$z_poziom">$z_imie $z_nazwisko $z_poziom</option>\n;
        HTML;
    }                

    $out = $out . "</select>";

    $out = $out . <<< HTML
    <select name="pracownik" id="pracownik">
    <option value="nie wybrano">Wybierz pracownika</option>
    HTML;

    $sql_p = "select * from find_pracownik_sek(?);";
    $sth = $pdo->prepare($sql_p);
    $sth->bindParam(1, $sekcja);
    $sth->execute();
    $row = $sth->fetchAll();

    foreach ($row as $p) {
        $p_imie = $p[1];
        $p_nazwisko = $p[2];
        $p_zawod = $p[3];
        $out = $out . <<< HTML
        <option value="$p_imie|$p_nazwisko|$p_zawod">$p_imie $p_nazwisko $p_zawod</option>\n;
        HTML;
    } 

    $out = $out . "</select>";
    echo $out;
    $pdo = null;
?>

</body>
</html>
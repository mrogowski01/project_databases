<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pgsql_host = 'localhost';
$port = '5432';
$username = 'u0rogowski';
$password = '0rogowski';
$database = 'u0rogowski';

try{
	$pdo = new PDO('pgsql:host='.$pgsql_host.';dbname='.$database.';port='.$port, $username, $password );
}catch(PDOException $e){
	echo 'Not connected<br />';
}

?>
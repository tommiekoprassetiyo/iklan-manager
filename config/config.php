<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ikman";

try {
	$pdo = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
} catch (PDOException $e) {
	$e->getmessage();
}

include_once('crud.php');

$crud = new crud($pdo);

?>
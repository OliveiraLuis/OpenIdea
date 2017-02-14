<?php
session_start();
require '../php/init.php';
require '../php/check.php';
isLoggedIn(); 

$id = $_GET['id'];

$pdo = db_connect();

$sqlcat = "DELETE FROM ideia_has_categoriaIdeia WHERE ideia_id = $id";
$sqlide = "DELETE FROM ideia WHERE id = $id";

$delet = $pdo->prepare($sqlcat);
if(!$delet->execute())
	echo "deu erro";

$delet = $pdo->prepare($sqlide);
if($delet->execute())
	header("Location: ../usuario/meupainel.php");
else
	echo "nao funfou";

?>
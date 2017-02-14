<?php
session_start();
require 'init.php';
require 'check.php';
isLoggedIn();
$id = $_SESSION['user_id'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$facebook = $_POST['facebook'];
$github = $_POST['github'];
$tweeter = $_POST['tweeter'];
$senha = $_POST['senha'];

function upar($sql, $valor){
	$pdo = db_connect();
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':valor', $valor);
	if($stmt->execute())
	header('Location: ../usuario/meupainel.php');
	else
		echo "erro ai atualizar";
}

if($nome!=''){
	$sql = "UPDATE usuario u SET nome= :valor WHERE u.id = $id";
	upar($sql, $nome);
}
if($email!=''){
	$sql = "UPDATE usuario u SET email= :valor WHERE u.id = $id";
	upar($sql, $email);
}
if($login!=''){
	$sql = "UPDATE usuario u SET login= :valor WHERE u.id = $id";
	upar($sql, $login);
}
if($facebook!=''){
	$sql = "UPDATE usuario u SET facebook= :valor WHERE u.id = $id";
	upar($sql, $facebook);
}
if($github!=''){
	$sql = "UPDATE usuario u SET github= :valor WHERE u.id = $id";
	upar($sql, $github);
}
if($tweeter!=''){
	$sql = "UPDATE usuario u SET tweeter= :valor WHERE u.id = $id";
	upar($sql, $tweeter);
}
if($senha!=''){
	$sql = "UPDATE usuario u SET senha= :valor WHERE u.id = $id";
	$senha = md5($senha);
	upar($sql, $senha);
}

?>

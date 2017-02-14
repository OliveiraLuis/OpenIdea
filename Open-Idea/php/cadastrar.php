<?php
require 'init.php';

$nome  = $_POST['nome'];
$login = $_POST['login'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha = md5($senha);
$imagem = "../imagens/padrao.png";

echo $nome . "<br>" . $login . "<br>" . $email . "<br>" . $senha;

$pdo = db_connect();

$sql = "INSERT INTO usuario(nome, email, login, senha, imagem) VALUES (:nome, :email, :login, :senha, '$imagem')";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':senha', $senha);

if($stmt->execute()){
	$sql = "SELECT id, nome FROM usuario WHERE nome = :nome";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':nome', $nome);
	$stmt->execute();
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$user = $users[0];

	session_start();
	$_SESSION['logged_in'] = true;
	$_SESSION['user_id'] = $user['id'];
	$_SESSION['user_name'] = $user['nome'];
	echo $_SESSION['user_id'];
	header('Location: ../usuario/meupainel.php');
}else{
	echo "erro ai inserir";
}
?>

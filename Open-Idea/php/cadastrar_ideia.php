<?php
session_start();
require 'init.php';

$nome  = $_POST['nome'];
$descricao = $_POST['descricao'];
$imagem = "../imagens/padrao.png";
$usuario = $_SESSION['user_id'];
echo $nome . "<br>" . $descricao . "<br>" . $usuario. "<br>";

$pdo = db_connect();

$sql = "INSERT INTO ideia(nome, descricao, imagem, usuario_id) VALUES (:nome, :descricao, '$imagem', '$usuario')";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':descricao', $descricao);

if($stmt->execute()){
	header('Location: ../usuario/meupainel.php');
}else{
	echo "erro ai inserir";
}
?>

<?php
session_start();
require 'init.php';

$nome  = $_POST['nome'];
$readme = $_POST['readme'];
$ideia = $_POST['ideia'];
$imagem = "../imagens/padrao.png";
$usuario = $_SESSION['user_id'];

$pdo = db_connect();

$sql = "INSERT INTO projeto(nome, readme, usuario_id, imagem, ideia_id) VALUES (:nome, :readme, '$usuario', '$imagem', '$ideia')";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':readme', $readme);

if($stmt->execute()){
	header('Location: ../usuario/meupainel.php');
}else{
	echo "erro ai inserir";
}
?>

<?php 

require 'init.php';

$login =  $_POST['login'];
$senha =  $_POST['senha'];
$senha = md5($senha);

if (empty($login) || empty($senha))
{
    echo "Informe login e senha";
    exit;
}

$pdo = db_connect();
 
$sql = "SELECT id, nome FROM usuario WHERE login = :login AND senha = :senha";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':senha', $senha);
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) <= 0)
{
    echo "login ou senha incorretos";
    exit;
}
 
// pega o primeiro usuário
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['nome'];

header("Location: ../usuario/meupainel.php");
?>
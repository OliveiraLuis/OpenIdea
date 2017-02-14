<?php
function db_connect(){
	try{
	    $pdo = new PDO( 'mysql:host=' . host . ';dbname=' . database, user, senha );
	    return $pdo;	
	}
	catch ( PDOException $e ){
	    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
	}
}
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']))
    {
        return false;
    }
    return true;
}
?>
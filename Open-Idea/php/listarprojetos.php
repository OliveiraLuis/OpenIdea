<?php
session_start();
require 'init.php';

$pesquisa = $_POST['pesquisa'];
$tipo = $_POST['tipo'];

echo $pesquisa . "<br>" . $tipo . "<br>";

// pesqiusar por nome
if($tipo == 1){
	$pdo = db_connect();
	$sql = "SELECT u.nome as usuario, p.nome as projeto, i.nome as ideia, p.readme, p.imagem FROM projeto p
		JOIN usuario u
		on u.id = p.usuario_id
		JOIN ideia i
		on i.id = p.ideia_id
		WHERE upper(p.nome) LIKE '%$pesquisa%'";

	$stmt = $pdo->prepare($sql);
	/*$stmt->bindParam('1', $pesquisa); não ta funfando*/
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	for($i=1; $i<=count($result); $i++) {
		echo $i;
	}


	print_r($result);
	echo count($result);

}
// categorias do projeto
	$sqlcat = "SELECT cp.nome FROM projeto p
		JOIN projeto_has_categoriaProjeto hcp
		on hcp.projeto_id = p.id
		JOIN categoriaProjeto cp
		on cp.id = hcp.categoriaProjeto_id
		WHERE upper(p.nome ) LIKE '%%'";

// quais projetos pertencem a essa categoria
	$sqlpc = "SELECT u.nome as usuario, p.nome as projeto, i.nome as ideia, p.readme, p.imagem FROM projeto p
		JOIN usuario u
		on u.id = p.usuario_id
		JOIN ideia i
		on i.id = p.ideia_id
        JOIN projeto_has_categoriaProjeto hcp
		on hcp.projeto_id = p.id
		JOIN categoriaProjeto cp
		on cp.id = hcp.categoriaProjeto_id
		WHERE cp.id = 1"
?>
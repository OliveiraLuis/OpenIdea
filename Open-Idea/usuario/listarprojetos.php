<?php
session_start();
require '../php/init.php';
require '../php/check.php';
isLoggedIn(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Listar Usuarios</title>	
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
</head>
<style>
.demo-card-wide.mdl-card {
  width: 512px;
}
.demo-card-wide > .mdl-card__title {
  color: #000;
  height: 176px;
}	
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>


<body>
	<form method="post" action="listarprojetos.php">
		<input type="text" name="pesquisa">
		<select name="tipo">
			<option value="1">Nome</option>
			<option value="2">Categoria</option>
		</select>
		<input type="submit" name="enviar">
	</form>

<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title" style="background: url(../imagens/padrao.png)">
    <h2 class="mdl-card__title-text">Welcome</h2>
  </div>
  <div class="mdl-card__supporting-text">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    Mauris sagittis pellentesque lacus eleifend lacinia...
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Get Started
    </a>
  </div>
  <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
      <i class="material-icons">share</i>
    </button>
  </div>
</div>

	<div>
		<?php
			$pesquisa = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : '';
			$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';

			// pesqiusar por nome
			if($tipo == 1){
				$pdo = db_connect();
				$sql = "SELECT u.nome as usuario, p.nome as projeto, i.nome as ideia, p.readme, p.imagem FROM projeto p
					JOIN usuario u
					on u.id = p.usuario_id
					JOIN ideia i
					on i.id = p.ideia_id
					WHERE upper(p.nome) LIKE '%$pesquisa%'";
				
				$proj = $pdo->prepare($sql);
				$proj->execute();
				$result = $proj->fetchAll(PDO::FETCH_ASSOC);
				
				for($i=0; $i<count($result); $i++) {
					$projeto = $result[$i]['projeto'];
					$usuario = $result[$i]['usuario'];
					$ideia 	 = $result[$i]['ideia'];
					$readme  = $result[$i]['readme'];
					$imagem  = $result[$i]['imagem'];
					
					$sqlcat = "SELECT cp.nome FROM projeto p
					JOIN projeto_has_categoriaProjeto hcp
					on hcp.projeto_id = p.id
					JOIN categoriaProjeto cp
					on cp.id = hcp.categoriaProjeto_id
					WHERE upper(p.nome ) LIKE '%$projeto%'";
					$cat  = $pdo->prepare($sqlcat);
					$cat->execute();
					$categ  = $cat->fetchAll(PDO::FETCH_ASSOC);

					echo "
					<div class='mdl-cell mdl-cell--4-col'>
					<div class='demo-card-wide mdl-card mdl-shadow--2dp'>
					  <div class='mdl-card__title' style='background: url($imagem)'>
					    <h2 class='mdl-card__title-text'>$projeto</h2>
					    <p>Usuario: $usuario</br>
					    Ideia:
					    $ideia</p></br>
					  </div>
					  <div class='mdl-card__supporting-text'>
					    $readme<br>
					  </div>
					  <div class='mdl-card__actions mdl-card--border'>
					    ";
					      for($j=0; $j<count($categ); $j++){
						$categoria = $categ[$j]['nome'];
						echo "<a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>" .$categoria . "</a>";
						}
						echo
					    "
					  </div>
					  <div class='mdl-card__menu'>
					    <button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'>
					      <i class='material-icons'>share</i>
					    </button>
					  </div>
					</div>
					</div>";
				}
			}
		?>
	</div>

</body>
</html>

<?php
session_start();
require 'init.php';
require 'check.php';
isLoggedIn(); 
$id = $_SESSION['user_id'];

$pdo = db_connect();
$sql = "SELECT i.nome, i.descricao, i.imagem, u.nome as usuario FROM ideia i
		JOIN usuario u
		on u.id = i.usuario_id
		WHERE u.id = $id";

$proj = $pdo->prepare($sql);
$proj->execute();
$result = $proj->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

for($i=0; $i<count($result); $i++) {
  $nome = $result[$i]['nome'];
  $usuario = $result[$i]['usuario'];
  $descricao   = $result[$i]['descricao'];
  $imagem  = $result[$i]['imagem'];
  
  $sqlcat = "SELECT * FROM ideia i
			JOIN ideia_has_categoriaIdeia ici
			on ici.ideia_id = i.id
			JOIN categoriaIdeia ci
			ON ci.id = ici.categoriaIdeia_id
			WHERE upper(i.nome) LIKE '%%'";
  $cat  = $pdo->prepare($sqlcat);
  $cat->execute();
  $categ  = $cat->fetchAll(PDO::FETCH_ASSOC);

  echo "
  <div class='mdl-cell mdl-cell--4-col'>
  <div class='demo-card-wide mdl-card mdl-shadow--2dp'>
    <div class='mdl-card__title' style='background: url($imagem)'>
      <h2 class='mdl-card__title-text'>$nome</h2>
      <p>Usuario: $usuario</br></p>
    </div>
    <div class='mdl-card__supporting-text'>
      $descricao<br>
      ";
      for($j=0; $j<count($categ); $j++){
	        $categoria = $categ[$j]['nome'];
	        echo $categoria . " ";
	        }
	        echo"
    </div>
    <div class='mdl-card__actions mdl-card--border'>
      <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>
        Get Started
      </a>
    </div>
    <div class='mdl-card__menu'>
      <button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'>
        <i class='material-icons'>share</i>
      </button>
    </div>
  </div>
  </div>";
}
?>
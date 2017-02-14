<?php
session_start();
require '../php/init.php';
require '../php/check.php';
isLoggedIn(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Open Idea</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/paralax.css">
</head>
<style type="text/css">
  .mdl-layout__header .material-icons, .c, .mdl-layout__tab  {
    color: #767777 !important;
  }
  .mdl-layout__header, .mdl-layout__tab-bar{ background: #fff !important;}
  select {
  font-family: inherit;
  background-color: transparent;
  width: 100%;
  padding: 4px 0;
  font-size: 16px;
  color: rgba(0,0,0, 0.26);
  border: none;
  border-bottom: 1px solid rgba(0,0,0, 0.12);
}

/* Remove focus */
select:focus {
  outline: none;
}

/* Hide label */
.mdl-selectfield label {
  display: none;
}

/* Use custom arrow */
.mdl-selectfield select {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}

.mdl-selectfield {
  font-family: 'Roboto', 'Helvetica', 'Arial', sans-serif;
  position: relative;
}
.mdl-selectfield:after {
  position: absolute;
  top: 0.75em;
  right: 0.5em;
  /* Styling the down arrow */
  width: 0;
  height: 0;
  padding: 0;
  content: '';
  border-left: .25em solid transparent;
  border-right: .25em solid transparent;
  border-top: 0.375em solid rgba(0,0,0, 0.12);
  pointer-events: none;
}
</style>
<body>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title c">Open Idea</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
     <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link c" href="../php/logout.php">Deslogar</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Open Idea</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="meupainel.php">Meu Painel</a>
      <a class="mdl-navigation__link" href="novaideia.php">Cadastrar ideia</a>
      <a class="mdl-navigation__link" href="novoprojeto.php">Cadastrar projeto</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
    <div class="mdl-grid">
    	<div class="mdl-cell--4-offset"></div>
    	<div class="mdl-cell mdl-cell--3-col">
    		<form method="post" action="../php/cadastrar_projeto.php">        
        <h3>Cadastrar novo projeto</h3>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="nome">
            <label class="mdl-textfield__label" for="nome" >nome</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea class="mdl-textfield__input" name="readme" rows="10" cols="40"></textarea>
            <label class="mdl-textfield__label" for="readme" >readme</label>
          </div>
          <?php
      			$pdo = db_connect();

      			$sql = "SELECT id, nome FROM ideia";
      			$stmt = $pdo->query($sql);
      			$col = $stmt->fetchAll(PDO::FETCH_ASSOC);

      			$ncol = sizeof($col);
      			$i =0;
      		 	echo "<div class='mdl-selectfield'><SELECT name='ideia'>";
      		 		while($i < $ncol){
      		 		 	echo "<option value=". $col[$i]['id'] .">" . $col[$i]['nome'] . "</option>";
      		 		 	$i++;
      		 		}
      		 	echo "</SELECT></div>";
      		 	?>
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">
              Cadastrar projeto
            </button>
          </form>
    	</div>
    </div>
     
    </div>

    <footer class="mdl-mini-footer">
      <div class="mdl-mini-footer__left-section">
         <div class="mdl-logo">
            Desenvolvido por: Luis Oliveira
         </div>
         <ul class="mdl-mini-footer__link-list">
            <li><a href="#">Sobre o desenvolvedor</a></li>
            <li><a href="#">Termos de privacidade</a></li>
         </ul>
      </div>
      <div class="mdl-mini-footer__right-section">
         <button class="mdl-mini-footer__social-btn"><a href=""><img src="../imagens/fb.png" width="30px"></a></button>
         <button class="mdl-mini-footer__social-btn"><a href=""><img src="../imagens/git.png" width="30px"></a></button>
         <button class="mdl-mini-footer__social-btn"><a href=""><img src="../imagens/ins.ico" width="30px"></a></button>
      </div>
   </footer>
  </main>
</div>
</body>
</html>

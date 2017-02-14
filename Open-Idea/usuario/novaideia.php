<?php
session_start();
require '../php/init.php';
require '../php/check.php';
isLoggedIn(); 
?>
<!DOCTYPE html>
<html>
<style type="text/css">
  .mdl-layout__header .material-icons, .c, .mdl-layout__tab  {
    color: #767777 !important;
  }
  .mdl-layout__header, .mdl-layout__tab-bar{ background: #fff !important;}
</style>
<head>
  <title>Open Idea</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/paralax.css">
</head>
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
    	<div class="mdl-cell mdl-cell--4-col">
    		<form method="post" action="../php/cadastrar_ideia.php">        
        <h3>Cadastrar nova ideia</h3>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="nome">
            <label class="mdl-textfield__label" for="nome" >nome</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea class="mdl-textfield__input" name="descricao" rows="10" cols="40"></textarea>
            <label class="mdl-textfield__label" for="Descrição" >Descrição</label>
          </div>
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">
              Cadastrar ideia
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
<!DOCTYPE html>
<html>
<head>
  <title>Open Idea</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
  <!-- Firebase -->
  <script src="https://www.gstatic.com/firebasejs/3.6.4/firebase.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<style type="text/css">
  .mdl-layout__header .material-icons, .c {
    color: #767777 !important;
  }
  .mdl-layout__header{ background: #fff;}
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
        <a class="mdl-navigation__link c" href="../#secao1">Sobre</a>
        <a class="mdl-navigation__link c" href="../#secao2">Idealizador</a>
        <a class="mdl-navigation__link c" href="../#secao3">Desenvolvedor</a>
        <a class="mdl-navigation__link c" href="entrar.php">Entrar</a>
        <a class="mdl-navigation__link c" href="novousuario.php">Cadastrar</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Open Idea</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
    <!-- Your content goes here -->
    <div class="mdl-grid">
    <div class=" mdl-cell--4-offset"></div>
    <div class="mdl-cell mdl-cell--4-col">
     <form method="post" name="entrar" action="../php/entrar.php" autocomplete="off">
      <h4>Entrar</h4>
      <p>Já poussui uma conta? Então faça login!</p>
      <div id="textDiv"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="login">
            <label class="mdl-textfield__label" for="login">Login</label>
          </div>
        
        
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="password" id="senha" name="senha">
            <label class="mdl-textfield__label" for="senha">Senha</label>
          </div>
          <div>
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">
              Enviar
            </button>
          </div>
        </form>
        </div>
    </div>
    </div>

    <footer class="mdl-mini-footer" style="align-self: bottom">
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
  <script src="../js/app.js"></script>
</div>
</body>
</html>
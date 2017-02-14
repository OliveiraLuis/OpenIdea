<?php
session_start();
require '../php/init.php';
require '../php/check.php';
isLoggedIn(); 
$id = $_SESSION['user_id'];
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
  .mdl-layout__header, .mdl-layout__tab-bar{ background: #fff;}
</style>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title c">Open Idea</span>
      <div class="mdl-layout-spacer"></div>
    <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link c" href="../php/logout.php">Deslogar</a>
      </nav>
    </div>

    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="#perfil" class="mdl-layout__tab is-active">Meu perfil</a>
      <a href="#ideias" class="mdl-layout__tab">Minhas Ideias</a>
      <a href="#projetos" class="mdl-layout__tab">Meus projetos</a>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Open Idea</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="#">Meu Painel</a>
      <a class="mdl-navigation__link" href="novaideia.php">Cadastrar ideia</a>
      <a class="mdl-navigation__link" href="novoprojeto.php">Cadastrar projeto</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <section class="mdl-layout__tab-panel is-active" id="perfil">
      <div class="page-content">
      <div  class="mdl-grid">
        <?php
        $pdo = db_connect();
        $sql = "SELECT * FROM usuario u WHERE u.id = $id";
        $user = $pdo->prepare($sql);
        $user->execute();
        $usu = $user->fetchAll(PDO::FETCH_ASSOC);
        $nome = $usu[0]['nome'];
        $email = $usu[0]['email'];
        $login = $usu[0]['login'];
        $facebook = $usu[0]['facebook'];
        $tweeter = $usu[0]['tweeter'];
        $github = $usu[0]['github'];
        $imagem = $usu[0]['imagem'];
        ?>
        <div class="mdl-cell--3-offset">
          <img src="../imagens/padrao.png" width="100px">
        </div>
        <div class="mdl-cell mdl-cell--6-col">
        <form method="post" action="../php/atualizar_usuario.php">        
        <h3>Informações Pessoais</h3>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="nome" value=<?php echo $nome;?> >
            <label class="mdl-textfield__label" for="nome" >nome</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="email" value=<?php echo $email;?> >
            <label class="mdl-textfield__label" for="email" >email</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="login" value=<?php echo $login;?> >
            <label class="mdl-textfield__label" for="login" >login</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="facebook" value=<?php echo $facebook;?> >
            <label class="mdl-textfield__label" for="facebook" >facebook</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="github" value=<?php echo $github;?> >
            <label class="mdl-textfield__label" for="github" >github</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="tweeter" value=<?php echo $tweeter;?> >
            <label class="mdl-textfield__label" for="tweeter" >tweeter</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="login" name="senha">
            <label class="mdl-textfield__label" for="senha" >senha</label>
          </div>
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">
              Atualizar dados
            </button>
          </form>
        </div>
      </div>
      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="ideias">
      <div class="page-content">
      <div class="mdl-grid">
      <?php
        $pdo = db_connect();
          $sql = "SELECT i.id, i.nome, i.descricao, i.imagem, u.nome as usuario FROM ideia i
              JOIN usuario u
              on u.id = i.usuario_id
              WHERE u.id = $id";

          $proj = $pdo->prepare($sql);
          $proj->execute();
          $result = $proj->fetchAll(PDO::FETCH_ASSOC);

          for($i=0; $i<count($result); $i++) {
            $nome = $result[$i]['nome'];
            $usuario = $result[$i]['usuario'];
            $descricao   = $result[$i]['descricao'];
            $imagem  = $result[$i]['imagem'];
            $id = $result[$i]['id'];
            
            $sqlcat = "SELECT * FROM ideia i
                JOIN ideia_has_categoriaIdeia ici
                on ici.ideia_id = i.id
                JOIN categoriaIdeia ci
                ON ci.id = ici.categoriaIdeia_id
                WHERE i.nome = $nome";
            $cat  = $pdo->prepare($sqlcat);
            $cat->execute();
            $categ  = $cat->fetchAll(PDO::FETCH_ASSOC);

            echo "
            <div class='mdl-cell mdl-cell--4-col'>
            <div class='mdl-cell mdl-cell--4-col'>
            <div class='demo-card-wide mdl-card mdl-shadow--2dp'>
              <div class='mdl-card__title' style='background: url($imagem)'>
                <h2 class='mdl-card__title-text'>$nome</h2>
                <p>Usuario: $usuario</br>
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
            <a href='../php/deleteideia.php?id=$id'>
              <button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'>
                <i class='material-icons'>clear</i>
              </button>
              </a>
            </div>
          </div>
          </div>
          </div>";
        }
        ?>
     
        </div>
      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="projetos">
      <div class="page-content">
      <div class="mdl-grid">
      <?php
        $id = $_SESSION['user_id'];
        $pdo = db_connect();
        $sql = "SELECT p.id, u.nome as usuario, p.nome as projeto, i.nome as ideia, p.readme, p.imagem FROM projeto p
          JOIN usuario u
          on u.id = p.usuario_id
          JOIN ideia i
          on i.id = p.ideia_id
          WHERE u.id = $id";
        
        $proj = $pdo->prepare($sql);
        $proj->execute();
        $result = $proj->fetchAll(PDO::FETCH_ASSOC);
        
        for($i=0; $i<count($result); $i++) {
          $projeto = $result[$i]['projeto'];
          $usuario = $result[$i]['usuario'];
          $ideia   = $result[$i]['ideia'];
          $readme  = $result[$i]['readme'];
          $imagem  = $result[$i]['imagem'];
          $id      = $result[$i]['id'];

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
            <a href='../php/deleteprojeto.php?id=$id'>
              <button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'>
                <i class='material-icons'>clear</i>
              </button>
            </a>
            </div>
          </div>
          </div>";
        }
        ?>
      </div>
      </div>
    </section>

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
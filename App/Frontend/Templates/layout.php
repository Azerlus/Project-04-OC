<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'Mon super site' ?>
    </title>
 
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css" type="text/css" />

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
 
  <body>
      <header class="page-header">
        <div class="row barre-header">
            <div class="btn-group ecran-tel col-xs-2 col-xs-offset-1 menu-tel">
              <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Menu</button>
              <ul class="dropdown-menu">
                <?php if ($user->isAuthenticated()) { ?>
                <li><a href="/">Accueil</a></li>
                <li><a href="/">A propos</a></li>
                <li><a href="/admin/">Admin</a></li>
                <li><a href="/admin/chapters-insert.html">Ajouter un chapitre</a></li>
                <?php } else{ ?>
                <li><a href="/">Accueil</a></li>
                <li><a href="/">A propos</a></li>
                <?php } ?>
              </ul>
            </div>
          <h1 class="col-md-offset-1 col-md-5 col-xs-7 col-xs-offset-1"><a href="/">Billet simple pour l'Alaska - Jean Forteroche</a></h1>
          <nav class="col-md-6">
            <ul class="row ecran-pc">
              <?php if ($user->isAuthenticated()) { ?>
              <li class="col-md-2"><a href="/">Accueil</a></li>
              <li class="col-md-2"><a href="/">A propos</a></li>
              <li class="col-md-2"><a href="/admin/">Admin</a></li>
              <li class="col-md-4"><a href="/admin/chapters-insert.html">Ajouter un chapitre</a></li>
              <?php } else{ ?>
              <li class="col-md-offset-6 col-md-2"><a href="/">Accueil</a></li>
              <li class="col-md-2"><a href="/">A propos</a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      </header>

      <?php if( isset($varcachee)){
      ?>
        <section id="dernier-chapitre">
          <div class="container">
            <div class="col-md-9 col-xs-12">
              <h2>Le dernier chapitre est en ligne !</h2>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit...</p>
            </div>
            <a class="col-md-3 col-xs-4" href="/aremplir/">Lire la suite...</a>
          </div>
        </section>
      <?php
      }
      ?>

      <div id="content-wrap">
        <section id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;" class="flash">', $user->getFlash(), '</p>'; ?>
 
          <?= $content ?>
        </section>
      </div>
 
      <footer></footer>
  </body>
</html>
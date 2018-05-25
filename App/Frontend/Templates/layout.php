<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'Mon super site' ?>
    </title>
 
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
  </head>
 
  <body>
    <div id="wrap">
      <header>
        <h1><a href="/">Billet simple pour l'Alaska - Jean Forteroche</a></h1>
        <nav>
          <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/">A propos</a></li>
            <?php if ($user->isAuthenticated()) { ?>
            <li><a href="/admin/">Admin</a></li>
            <li><a href="/admin/chapters-insert.html">Ajouter un chapitre</a></li>
            <?php } ?>
          </ul>
        </nav>
      </header>

      <div id="head-wrap">
        <section id="main-head">
          <div id="main-head-home">
            <h2>Le dernier chapitre est en ligne !</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit...</p>
          </div>
          <a href="/aremplir/" id="lireSuite">Lire la suite...</a>
        </section>
      </div>
 
      <div id="content-wrap">
        <section id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
 
          <?= $content ?>
        </section>
      </div>
 
      <footer></footer>
    </div>
  </body>
</html>
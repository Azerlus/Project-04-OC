<p>Par <em><?= $chapters['auteur'] ?></em>, le <?= $chapters['dateAjout']->format('d/m/Y à H\hi') ?></p>
<h2><?= $chapters['titre'] ?></h2>
<p><?= nl2br($chapters['contenu']) ?></p>
 
<?php if ($chapters['dateAjout'] != $chapters['dateModif']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?= $chapters['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
<?php } ?>
 
<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}
 
foreach ($comments as $comment)
{
?>
  <fieldset>
    <legend>
      Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['dateAjout']->format('d/m/Y à H\hi') ?>
    </legend>
    <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
  </fieldset>
<?php
}
?>
<h2>Ajouter un commentaire</h2>
<form action="/commenter-<?= $id ?>.html" method="post">
  <p>
    <?= isset($erreurs) && in_array(\Entity\Comment::INVALID_AUTHOR, $erreurs) ? 'Pseudo invalide.<br />' : '' ?>
    <label>Pseudo</label>
    <input type="text" name="pseudo"/><br />
 
    <?= isset($erreurs) && in_array(\Entity\Comment::INVALID_CONTENT, $erreurs) ? 'Le contenu est invalide.<br />' : '' ?>
    <label>Contenu</label>
    <textarea name="contenu" rows="7" cols="50"></textarea><br />
    <input type="submit" value="Commenter" />
  </p>
</form>
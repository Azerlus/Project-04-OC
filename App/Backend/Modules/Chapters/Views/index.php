<p style="text-align: center">Il y a actuellement <?= $nombreChapters ?> chapitres. En voici la liste :</p>
 
<table>
  <tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
<?php
foreach ($listeChapters as $chapters)
{
  echo '<tr><td>', $chapters['auteur'], '</td><td>', $chapters['titre'], '</td><td>le ', $chapters['dateAjout']->format('d/m/Y à H\hi'), '</td><td>', ($chapters['dateAjout'] == $chapters['dateModif'] ? '-' : 'le '.$chapters['dateModif']->format('d/m/Y à H\hi')), '</td><td><a href="chapters-update-', $chapters['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="chapters-delete-', $chapters['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>

<br/>

<p style="text-align: center">Voici la liste des commentaires qui ont étés signalés :</p>

<table>
	<tr><th>Auteur</th><th>Chapitre</th><th>Date d'ajout</th><th>Contenu</th></tr>
<?php
foreach ($listeCommentsReported as $report)
{
	echo '<tr><td>', $report['auteur'], '</td><td>', $report['chapters'], '</td><td>', $report['date']->format('d/m/Y à H\hi'), '</td><td>', $report['contenu'], '</td></tr>', "\n";
}
?>
</table>
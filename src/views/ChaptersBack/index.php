<section id="index-back">
	<p style="text-align: center; text-decoration: underline;">Il y a actuellement <strong><?= $nombreChapters ?></strong> chapitres. En voici la liste :</p>
	 
	<table class="table-hover table-bordered tableau">
	  <tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
	<?php
	foreach ($listeChapters as $chapters)
	{
	  echo '<tr><td class="colonne">', $chapters['auteur'], '</td><td class="colonne">', $chapters['titre'], '</td><td class="colonne">le ', $chapters['dateAjout']->format('d/m/Y à H\hi'), '</td><td class="colonne">', ($chapters['dateAjout'] == $chapters['dateModif'] ? '-' : 'le '.$chapters['dateModif']->format('d/m/Y à H\hi')), '</td><td class="colonne"><a href="chapters-update-', $chapters['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="chapters-delete-', $chapters['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
	}
	?>
	</table>

	<br/>

	<p style="text-align: center; text-decoration: underline;">Voici la liste des commentaires qui ont étés signalés :</p>

	<table class="table-hover table-bordered tableau">
		<tr><th>Auteur</th><th>Chapitre</th><th>Date d'ajout</th><th>Contenu</th><th>Action</th></tr>
	<?php
	foreach ($listeCommentsReported as $report)
	{
		echo '<tr><td class="colonne">', $report['auteur'], '</td><td class="colonne">', $report['chapters'], '</td><td class="colonne">', $report['dateAjout']->format('d/m/Y à H\hi'), '</td><td class="colonne">', $report['contenu'], '</td><td class="colonne"><a href="comment-delete-', $report['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
	}
	?>
	</table>
</section>
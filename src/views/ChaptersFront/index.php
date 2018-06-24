<div id="main-content">
<h3>Chapitres précédents :</h3>
<section class="container chapitres">

<?php
$i = 0;
$varcachee = 1;

foreach ($listeChapters as $chapters)
{

$i++;

?>
  	<div class="col-xs-5 chapters">
	  <h4><a href="chapters-<?= $chapters['id'] ?>.html"><?= $chapters['titre'] ?></a></h4>
	  <p><?= nl2br($chapters['contenu']) ?></p>
  	</div>
<?php
	
	if($i == 3){
		?>
		<aside class="col-xs-6 livre2 ecran-pc">
			<div id="images">
				<img src="https://static.wixstatic.com/media/be2027_5a84c9ab48b04527a36e53ef9a70f41b~mv2_d_4000_2662_s_4_2.jpg/v1/fill/w_346,h_337,al_c,q_80,usm_0.66_1.00_0.01/be2027_5a84c9ab48b04527a36e53ef9a70f41b~mv2_d_4000_2662_s_4_2.webp"/>
				<img src="https://static.wixstatic.com/media/be2027_5a84c9ab48b04527a36e53ef9a70f41b~mv2_d_4000_2662_s_4_2.jpg/v1/fill/w_346,h_337,al_c,q_80,usm_0.66_1.00_0.01/be2027_5a84c9ab48b04527a36e53ef9a70f41b~mv2_d_4000_2662_s_4_2.webp"/>
			</div>
			<div>
			<h4>Billet simple pour l'alaska</h4>
				<p>
					Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it <br/>
					Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it
					Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at 	dolore it Lorem ipsum si at dolore itLorem ipsum si at dolore it <br/>
				</p>
			</div>
		</aside>
		<?php
	}
}
?>

</section>

<section class="col-xs-12 livre">
	<div id="images">
		<img src="https://static.wixstatic.com/media/be2027_5a84c9ab48b04527a36e53ef9a70f41b~mv2_d_4000_2662_s_4_2.jpg/v1/fill/w_346,h_337,al_c,q_80,usm_0.66_1.00_0.01/be2027_5a84c9ab48b04527a36e53ef9a70f41b~mv2_d_4000_2662_s_4_2.webp"/>
		<img src="https://static.wixstatic.com/media/be2027_5a84c9ab48b04527a36e53ef9a70f41b~mv2_d_4000_2662_s_4_2.jpg/v1/fill/w_346,h_337,al_c,q_80,usm_0.66_1.00_0.01/be2027_5a84c9ab48b04527a36e53ef9a70f41b~mv2_d_4000_2662_s_4_2.webp"/>
	</div>
	<h4>Billet simple pour l'alaska</h4>
	<p>
		Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it <br/>
		Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it
		Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore it Lorem ipsum si at dolore itLorem ipsum si at dolore it <br/>
	</p>
</section>

</div>

<?php
<?php
/**
 * Block Name: Hero
 *
 * This is the template that displays the hero block
 */
?>

<?php 
	$Titolo = get_field('titolo');
	$SottoTitolo = get_field('sottotitolo');
	$Testo = get_field('testo');
	$Immagine = get_field('immagine_laterale');
	if( get_field('allineamento') == 'sinistra' ) {
		$Allineamento = 'HeroBlockLeft';
	}
	
	if( get_field('allineamento') == 'destra' ) {
		$Allineamento = 'HeroBlockRight';
	}
?>

<div class="HeroBlock SiteWidth DefaultMargin <?php echo $Allineamento;?>" style="background-image:url('<?php echo $Immagine; ?>');">
	<div class="HeroInnerBlock" data-aos="fade-down"  data-aos-offset="-500">
		<div class="PrometeoTitolo"><?php echo $Titolo; ?></div>
		<div class="PrometeoSottoTitolo"><?php echo $SottoTitolo; ?></div>
		<p><?php echo $Testo; ?></p>
	</div>
</div>
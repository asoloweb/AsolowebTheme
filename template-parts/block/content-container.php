<?php
/**
 * Block Name: Container
 *
 * This is the template that displays the hero block
 */
?>

<?php 
	$Titolo = get_field('titolo');
	$SottoTitolo = get_field('sottotitolo');
	$Testo = get_field('testo');
	$Immagine = get_field('immagine_laterale');
?>

<div class="ContainerBlock DefaultMargin" style="background-image:url('<?php echo $Immagine; ?>');">
	<div class="ContainerInnerBlock" data-aos="zoom-in" data-aos-offset="-500">
		<div class="PrometeoTitolo"><?php echo $Titolo; ?></div>
		<div class="PrometeoSottoTitolo"><?php echo $SottoTitolo; ?></div>
		<p><?php echo $Testo; ?></p>
		<a href=""></a>
	</div>
</div>
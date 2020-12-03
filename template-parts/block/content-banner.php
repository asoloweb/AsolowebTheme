<?php
/**
 * Block Name: Banner
 *
 * This is the template that displays the banner
 */
 
 if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>

<div class="SiteWidth">
	<div class="BlockBanner <?php echo $className;?>" style="background-color:<?php the_field('colore_sfondo');?>">
		<div class="BlockBannerContainer">
			<div>
				<h2><?php the_field('titolo'); ?></h2> 
				<p><?php the_field('paragrafo');?></p>
			</div>
			<a class="MainButtonCTA" href="<?php the_field('link_pulsante');?>"><?php the_field('testo_pulsante');?></a>			
		</div>
		<div class="BlockBannerImage" style="background-image: url(<?php the_field('immagine_sfondo');?>);"></div>
	</div>
</div>


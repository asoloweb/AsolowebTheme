<?php
/**
 * Block Name: Titolo Mix Verticale
 *
 * This is the template that displays the title block
 */

  if( !empty($block['className']) ) {
    $className = ' ' . $block['className'];
}
?>
<div class="<?php echo $className;?>">
	<div class="BlockMix BlockVerticale BlockMixAlign<?php the_field('allineamento');?>">
		<div>
			<div class="BlockMixAnimation" style="background-image: url(<?php the_field('immagine_sfondo');?>);">
        <div class="BlockMixTextContainer">
    			<div>
    				<h2><?php the_field('titolo'); ?></h2>
    				<p><?php the_field('paragrafo');?></p>
    			</div>
    			<div class="BlockMixButtonContainer">
    				<a class="MainButtonCTA" href="<?php the_field('link_pulsante');?>"><?php the_field('testo_pulsante');?></a>
    			</div>
    		</div>
        <a href="<?php the_field('link_pulsante');?>">
		      <div class="BlockAnimationImage aos-scroll-flip" style="background-image:url('<?php the_field('immagine_riquadro');?>');"></div>
        </a>
			</div>
		</div>
	</div>
</div>

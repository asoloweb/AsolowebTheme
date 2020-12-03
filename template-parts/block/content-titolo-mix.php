<?php
/**
 * Block Name: Titolo Mix
 *
 * This is the template that displays the title block
 */
 
  if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<div class="SiteWidth <?php echo $className;?>">
	<div class="BlockMix BlockMixAlign<?php the_field('allineamento');?>">
		<div class="BlockMixTextContainer">
			<div>
				<h2><?php the_field('titolo'); ?></h2> 
				<p><?php the_field('paragrafo');?></p>
			</div>
			<div class="BlockMixButtonContainer">
				<a class="MainButtonCTA" href="<?php the_field('link_pulsante');?>"><?php the_field('testo_pulsante');?></a>
			</div>
		</div>
		<div>
			<div class="BlockMixAnimation" style="background-image: url(<?php the_field('immagine_sfondo');?>);">
				<div class="BlockAnimationImage aos-scroll-flip" style="background-image:url('<?php the_field('immagine_riquadro');?>');"></div>
				<?php if (get_field('link_prodotto') != ''){?>
					<a href="<?php the_field('link_prodotto');?>" class="aos-scroll-zoom Zoom BlockAnimationLabel">
						<div class="BlockAnimationLabelThumb">
							<img src="<?php the_field('immagine_prodotto');?>"/>
						</div>
						<div class="BlockAnimationLabelInner">
							<div class="BlockAnimationLabelTitle">
								<?php the_field('titolo_prodotto');?>
							</div>
							<div class="BlockAnimationLabelPrice">
								<?php the_field('prezzo_prodotto');?>
							</div>
						</div>
						<div class="BlockAnimationLabelArrow">
							<i class="fas fa-angle-right"></i>
						</div>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

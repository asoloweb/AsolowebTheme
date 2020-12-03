<?php
/**
 * Block Name: Blocchetto
 *
 * This is the template that displays the blocchetto block
 */
  if( !empty($block['className']) ) {
    $className = ' ' . $block['className'];
}
?>
<div class="FullWidth BlockBlocchetto <?php echo $className;?>">
	<div class="SiteWidth">
		<div class="Block_prod_container">
			<?php if( have_rows('blocchetto')){ ?>
				<div id="BlocchettoList">
					<?php while( have_rows('blocchetto') ): the_row();?>
						<a class="BlockSingleBlocchetto" href="<?php the_sub_field('link'); ?>">
							<div class="BlockSingleBlocchettoImage">
								<img src="<?php the_sub_field('immagine'); ?>"/>
							</div>
							<div class="BlockSingleBlocchettoTitle">
								<?php the_sub_field('titolo'); ?>
							</div>
							<div class="BlockSingleBlocchettoDesc">
								<?php the_sub_field('descrizione'); ?>
							</div>
						</a>
					<?php endwhile; ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

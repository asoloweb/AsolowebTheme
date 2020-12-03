<?php
/**
 * Block Name: Prodotti in evidenza
 *
 * This is the template that displays the woocommerce products
 */
    if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<div class="FullWidth BlockProductEvidenza <?php echo $className;?>" style="background-image: url('<?php the_field('immagine_sfondo');?>')">
	<div class="SiteWidth">
		<h2 class="text-center"><?php the_field('titolo');?></h2>
			<div class="Block_prod_container">
				<?php if( have_rows('prodotti')){ ?>
					<div id="SliderProdotti">
					    <?php while( have_rows('prodotti') ): the_row();?>
							<a class="Block_product_single_product" href="<?php the_sub_field('link_prodotto'); ?>">
								<div class="Block_single_prod_img_container" style="background-image: url(<?php the_sub_field('immagine_prodotto'); ?>)">
								</div>
								<div class="Block_single_prod_name">
									<?php the_sub_field('titolo_prodotto'); ?>
								</div>
								<div class="Block_single_prod_desc">
									<?php the_sub_field('descrizione_prodotto'); ?>
								</div>
								<div class="Block_single_prod_price">
									a partire da <span class="Block_single_prod_price_digit"><?php the_sub_field('prezzo_indicativo'); ?></span>
								</div>
								<div class="MainButtonCTA Block_single_cat_button">
									Scopri di più
								</div>
							</a>
						<?php endwhile; ?>
					</div>
				<?php } ?>
			</div>
	</div>
</div>
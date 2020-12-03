<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

global $product;

$formatted_attributes = array();

$attributes = $product->get_attributes();

$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );

?>


	
<div id="WooSingleProductMainContainer">
	<!-- Gallery di prodotto -->
	<div id="WooSingleProductGallery">
		<div>
			<div class="WooCommerceProductGallery">
				<?php

				// Mostro il thumbnail
				echo '<div class="SlideProduct Slide2" style="background-image:url('.$thumbnail[0].');"></div>';
				
				$attachment_ids = $product->get_gallery_attachment_ids();

				foreach( $attachment_ids as $attachment_id ) {
					echo '<div class="SlideProduct" style="background-image:url('.$full_url = wp_get_attachment_image_src( $attachment_id, 'full' )[0].');"></div>';
				}
			
				?>
			</div>
		</div>
	</div>
	

	<!-- Contenuto prodotto -->

	<div class="WooCommerceProductContent">
		
			<div class="WooCommerceProductData">
				<?php the_title( '<h1 class="product_title  entry-title">', '</h1>' ); ?>
				<?php do_action( 'woocommerce_product_meta_start' ); ?>

				<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

					<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

				<?php endif; ?>

				<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

				<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

				<?php do_action( 'woocommerce_product_meta_end' ); ?>
				
				<div class="ProductTab" id="ProductContainerInfo">
					<?php 
					$content      = get_the_content();
					echo $content;
					?>
				</div>
				<table class="shop_attributes">
					<?php if ( $display_dimensions && $product->has_weight() ) : ?>
						<tr>
							<td><?php _e( 'Weight', 'woocommerce' ) ?></td>
							<td class="product_weight"><?php echo esc_html( wc_format_weight( $product->get_weight() ) ); ?></td>
						</tr>
					<?php endif; ?>

					<?php if ( $display_dimensions && $product->has_dimensions() ) : ?>
						<tr>
							<td><?php _e( 'Dimensions', 'woocommerce' ) ?></td>
							<td class="product_dimensions"><?php echo esc_html( wc_format_dimensions( $product->get_dimensions( false ) ) ); ?></td>
						</tr>
					<?php endif; ?>
					<h4>Dati tecnici</h4>
					<?php foreach ( $attributes as $attribute ) : ?>
						<tr>
							<td><?php echo wc_attribute_label( $attribute->get_name() ); ?></td>
							<td><?php
								$values = array();

								if ( $attribute->is_taxonomy() ) {
									$attribute_taxonomy = $attribute->get_taxonomy_object();
									$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

									foreach ( $attribute_values as $attribute_value ) {
										$value_name = esc_html( $attribute_value->name );

										if ( $attribute_taxonomy->attribute_public ) {
											$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
										} else {
											$values[] = $value_name;
										}
									}
								} else {
									$values = $attribute->get_options();

									foreach ( $values as &$value ) {
										$value = make_clickable( esc_html( $value ) );
									}
								}

								echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
							?></td>
						</tr>
					<?php endforeach; ?>
				</table>


		<?php
			
				
				
			if ( ! $product->managing_stock() && ! $product->is_in_stock() ) {?>
			
				<p class="WooNonVendibile">Prodotto non vendibile online</p>
				
		<?php } else {
			?>

			<p class="price">Prezzo: <?php echo $product->get_price_html(); ?></p>
		<?php if ($NegozioOffline != 1) {?>
		<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
			

			<?php
			
				do_action( 'woocommerce_before_add_to_cart_quantity' );

				woocommerce_quantity_input( array(
					'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
					'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
					'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
				) );

				do_action( 'woocommerce_after_add_to_cart_quantity' );
			
			
			?>

			<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		</form>

			<?php }}
			
				
			?>
			
			
			</div>
		</div>
	</div>


<!-- PRODOTTI CORRELATI -->	


<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */



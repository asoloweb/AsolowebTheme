<?php
	/**
	 * Template Name: Single Post
	 */
 	get_header();
 ?>


<div class="wrap">
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				the_content();
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>

<?php
/*
Template Name: Connessioni Template
*/

get_header(); ?>


<div class="FullWidth">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		the_content();
		endwhile; ?>
	<?php endif; ?>
</div>

<div class="SiteWidth">
	<div class="NewsContainer">
		<?php
		global $post;
		$args = array(
			'post_type' => 'connessione',
			'post_status' => 'publish',
			'posts_per_page' => 8,
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$myposts = get_posts( $args );
		foreach( $myposts as $post ) :  setup_postdata($post); ?>
			<div class="SingleNews" style="background-color:#f2f2f2; margin:20px;">
				<?php
					$Thumb = get_the_post_thumbnail_url();
				?>
				<div class="SingleNewsThumb" style="background-image:url('<?php echo $Thumb;?>')">
				</div>
				<div class="SingleNewsInnerContainer">
					<div class="SingleNewsTitle"><?php the_title(); ?></div>
					<div class="SingleNewsDesc"><?php the_excerpt(); ?></div>
					<a class="SingleNewsLink" href="<?php the_permalink(); ?>">Vai alla connessione</a>
				</div>
			</div>
		<?php endforeach; wp_reset_postdata(); ?>
	</div>
</div>


<?php get_footer();

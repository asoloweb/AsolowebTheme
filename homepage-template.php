<?php
/*
Template Name: Home Template
*/

get_header(); ?>

<!-- SLIDER -->
<div class="SliderContainer">
	<div id="Slider" class="DefaultMargin">
		<?php
		// check if the repeater field has rows of data
		if( have_rows('slider') ):
			// loop through the rows of data
			while ( have_rows('slider') ) : the_row();
				//Controllo se la data è maggiore uguale a oggi
			 $Today = date("d-m-Y"); //Today
			 $DataInizio = get_sub_field('data_inizio');
			 $DataFine = get_sub_field('data_fine');
				?>
			<div class="SlideLink">
				<div class="SingleSlide" style="background-image:url('<?php the_sub_field('immagine'); ?>');">
					<div class="SiteWidth BadgeContainer BadgeContainer<?php the_sub_field('align');?>">
						<h1 class="SingleSlideTitle" style="color:<?php the_sub_field('colore_testo'); ?>!important;">
							<?php the_sub_field('titolo'); ?>
						</h1>
						<div class="SingleSlideSubTitle" style="color:<?php the_sub_field('colore_testo'); ?>">
							<?php the_sub_field('sottotitolo'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php
			endwhile;
		endif;
		?>
	</div>
</div>
<!-- FINE SLIDER -->

<div class="FullWidth">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		the_content();
		endwhile; ?>
	<?php endif; ?>
</div>



<?php get_footer();

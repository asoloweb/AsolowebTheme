<footer class="MainFooter">
	<div class="AdsFooter">
		<a href="#">
			<div class="AdBoxTop">
				<div><img src="<?php bloginfo('template_url'); ?>/img/spedizione_icon.png"/></div>
				<div class="FooterTitle">SERVIZIO</div>
			</div>
		</a>
		<a href="#">
			<div class="AdBoxTop" style="border-left:2px solid #222; border-right:2px solid #222;">
				<div><img src="<?php bloginfo('template_url'); ?>/img/box_icon.png"/></div>
				<div class="FooterTitle">INSTALLAZIONE VELOCE</div>
			</div>
		<a href="#">
			<div class="AdBoxTop">
				<div><img src="<?php bloginfo('template_url'); ?>/img/reso_icon.png"/></div>
				<div class="FooterTitle">SERVIZIO CLIENTI TOP</div>
			</div>
		</a>
	</div>
	<div class="SiteWidth">
		<div class="FooterMenuBar">
			<div class="FooterMainCol">
				<div class="FooterCompanyTitle"><?php the_field('ragione_sociale', 'option'); ?></div>
				<div><?php the_field('indirizzo', 'option'); ?>, <?php the_field('paese', 'option'); ?> (<?php the_field('provincia', 'option'); ?> )</div>
				<div><?php the_field('cap', 'option'); ?>  - tel.  <?php the_field('telefono', 'option'); ?></div>
				<div><a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></div>
				<div>Partita Iva <?php the_field('partita_iva', 'option'); ?></div>
				<div>
				<?php
				if( have_rows('social' , 'option')){ ?>
					<div class="SocialBadge">
					<?php while( have_rows('social' , 'option') ): the_row(); ?>
						<a target="_blank" class="ASW_single_social" href="<?php the_sub_field('url_social'); ?>">
							<img src="<?php the_sub_field('icona_social'); ?>" />
						</a>
					<?php endwhile; ?>
					</div>
				<?php } ?>
				</div>
			</div>

				<div class="FooterCol">
					<div class="FooterTitle">
						Servizi
					</div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-col-1'
					) );
					?>
				</div>
				<div class="FooterCol">
					<div class="FooterTitle">
						Assistenza
					</div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-col-2'
					) );
					?>
				</div>
				<div class="FooterCol">
					<div class="FooterTitle">
						Pagamenti
					</div>
					<img src="<?php bloginfo('template_url'); ?>/img/Pagamenti_custom.png"/>
				</div>
			</div>
	<?php wp_footer();?>
</footer>

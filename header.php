<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<link defer href="<?php bloginfo('template_url'); ?>/css/aos.css" rel="stylesheet">
	<script src="<?php bloginfo('template_url'); ?>/js/aos.js"></script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicon.png" />
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
	<link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/mobile.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/slick.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/hamburger.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/animate.css" rel="stylesheet">
	<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/js/js.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,700,600' rel='stylesheet' type='text/css'>
	<title><?php wp_title(''); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<?php wp_head(); ?>
</head>
<div class="FullScreenLoader">
	Caricamento in corso... <br/>
	<i class="fas fa-fan"></i>
</div>
<div class="Header">
	<div class="SiteWidth">
		<div class="TopContainer animated slideInDown">
			<div class="LogoTab Width33">
				<a class="NoHover LogoContainer" href="<?php  echo get_home_url(); ?>">
					<?php
						$image = get_field('logo', 'option');
							if( !empty($image) ): ?>
								<img src="<?php echo $image; ?>"/>
					<?php endif; ?>
				</a>
			</div>
			<div class="InfoBox Width33">
				<?php
					$Whatsapp = get_field('whatsapp', 'option');
				?>
				<a class="WhatsappContainer" href="https://api.whatsapp.com/send?phone=<?php echo $Whatsapp;?>&text=Ciao! Vorrei qualche informazione in più">
					<img src="<?php bloginfo('template_url'); ?>/img/Whatsapp.png"/>Contattaci su Whatsapp <br/><?php echo $Whatsapp;?>
				</a>
			</div>
			<div class="TopMenu Width33">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'main-menu-top'
				) );
				?>
			</div>
		</div>
</div>
<div class="MobileMenuButton">
	<button class="hamburger hamburger--spin" type="button">
	  <span class="hamburger-box">
	    <span class="hamburger-inner"></span>
	  </span>
	</button>
</div>
<div class="MenuContainer animated fadeIn">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'main-menu'
	) );
	?>
</div>
<div class="MobileMenuContainer">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'menu-mobile'
	) );
	?>
</div>
</div>
<body <?php body_class() ?> >

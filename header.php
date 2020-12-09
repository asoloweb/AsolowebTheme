<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<link href="<?php bloginfo("template_url"); ?>/css/aos.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?php bloginfo("template_url"); ?>/img/favicon.png" />
	<link href="<?php bloginfo("template_url"); ?>/css/style.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/blocks.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/woocommerce-style.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/mobile.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/slick.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/hamburger.css" rel="stylesheet">
	<link href="<?php bloginfo("template_url"); ?>/css/animate.css" rel="stylesheet">
	<script src="<?php bloginfo("template_url"); ?>/js/jquery.js"></script>
	<script src="<?php bloginfo("template_url"); ?>/js/aos.js"></script>
	<script src="<?php bloginfo("template_url"); ?>/js/slick.min.js"></script>
	<script defer src="<?php bloginfo("template_url"); ?>/js/js.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
	<title><?php wp_title(""); ?></title>
	<meta name="description" content="<?php bloginfo("description"); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">	
	<?php wp_head(); ?>
</head>

<?php require_once( get_stylesheet_directory() . '/custom-header.php'); ?>

<body <?php body_class(); ?> >
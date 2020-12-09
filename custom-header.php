<div class="Header">
	<div class="SiteWidth">
		<div class="TopContainer animated slideInDown">
			<div class="MenuButton Width33">
				<button class="hamburger hamburger--spin" type="button">
				  <span class="hamburger-box">
					<span class="hamburger-inner"></span>
				  </span>
				</button>
			</div>
			<div class="LogoTab Width33">
				<a class="NoHover LogoContainer" href="<?php echo get_home_url(); ?>">
					<?php
	 $image = get_field("logo", "option");
	 if (!empty($image)): ?>
								<img src="<?php echo $image; ?>"/>
					<?php endif;
	 ?>
				</a>
			</div>
			<div class="TopMenu Width33">
				<?php wp_nav_menu([
	  "theme_location" => "main-menu-top",
	]); ?>
			</div>
		</div>
	</div>
</div>
<div class="MobileMenuContainer">
	<?php wp_nav_menu([
   "theme_location" => "menu-mobile",
 ]); ?>
</div>
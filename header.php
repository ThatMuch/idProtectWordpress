<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php idProtect_gtm('head') ?>
	<!--=== OPEN-GRAPH TAGS ===-->
	<?php idProtect_ogtags() ?>
	<!--=== PRELOAD FONTS ===-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Rubik:wght@500;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/assets/css/normalize.css">

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-W4SVBGG');
	</script>
	<!-- End Google Tag Manager -->
	<!--=== WP HEAD ===-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W4SVBGG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php idProtect_gtm('body') ?>

	<?php $custom_logo_id = get_theme_mod('custom_logo');
	$image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>

	<nav class="header__area navbar sticky-top navbar-expand-lg">
		<div class="container align-items-center">
			<a class="navbar-brand" href="<?php echo site_url(); ?>">
				<img src="<?php if ($image[0]) : echo $image[0];
							else : echo get_template_directory_uri() ?>/assets/images/stanlee_logo_texte.png<? endif; ?>" alt="ID Protect">ID Protect
			</a>

			<div class="collapse navbar-collapse" id="navbar">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'mainmenu', // Defined when registering the menu
					'menu_id'        => 'menu-main',
					'container'      => false,
					'depth'          => 2,
					'menu_class'     => 'navbar-nav mx-auto',
					'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
					'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
				));
				?>
			</div>
			<a class="header__link" href="#">
				<span>se connecter</span>
				<img class="eye" src="<?php echo get_template_directory_uri() ?>/assets/images/eye.svg" alt="Oeil">
				<img class="eye-hover" src="<?php echo get_template_directory_uri() ?>/assets/images/eye-hover.svg" alt="Oeil">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>

	<?php if (is_home()) : ?>
		<header>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
	<?php endif; ?>
	<?php if (is_archive() || is_category()) : ?>
		<header>
			<h1 class="page-title screen-reader-text">
				<?php
				if (is_day()) :
					echo get_the_date();
				elseif (is_month()) :
					echo get_the_date(_x('F Y', 'monthly archives date format', 'stanlee'));
				elseif (is_year()) :
					echo get_the_date(_x('Y', 'yearly archives date format', 'stanlee'));
				else :
					single_cat_title();
				endif;
				?>
			</h1>
		</header>
	<?php endif; ?>
	<div id="content" class="section__area">
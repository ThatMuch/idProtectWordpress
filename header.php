<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */

// get the template type of the page
$template = get_page_template_slug();
$template = str_replace(array('page-', '.php'), '', $template);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=5, initial-scale=1">
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

	<?php
	$custom_logo_id = get_theme_mod('custom_logo');
	$image = wp_get_attachment_image_src($custom_logo_id, 'full');

	// Check for custom menu
	$custom_menu_id = get_field('page_custom_menu');
	$nav_class = '';
	$current_menu_id = null;

	if ($custom_menu_id) {
		$menu_object = wp_get_nav_menu_object($custom_menu_id);
	} else {
		// Get the menu assigned to 'mainmenu' location
		$locations = get_nav_menu_locations();
		if (isset($locations['mainmenu'])) {
			$menu_object = wp_get_nav_menu_object($locations['mainmenu']);
		}
	}

	if (isset($menu_object) && $menu_object) {
		$nav_class = 'menu-' . $menu_object->slug;
		$current_menu_id = $menu_object->term_id;
	}
	?> <nav class="header__area navbar sticky-top navbar-expand-lg <?php echo esc_attr($nav_class); ?>">
		<div class="container align-items-center <?= $template === "landing" && "justify-content-center" ?>">
			<a class="navbar-brand" href="<?php echo site_url(); ?>">
				<img src="<?php if ($image[0]) : echo $image[0];
							else : echo get_template_directory_uri() ?>/assets/images/stanlee_logo_texte.png<? endif; ?>" alt="ID Protect">
			</a>
			<?php if ($template !== "landing") : ?>
				<div class="collapse navbar-collapse" id="navbar">
					<?php
					$menu_args = array(
						'theme_location' => 'mainmenu', // Defined when registering the menu
						'menu_id'        => 'menu-main',
						'container'      => false,
						'depth'          => 3,
						'menu_class'     => 'nav navbar-nav mx-auto',
						'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
						'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
					);

					// Check for custom menu
					if ($custom_menu_id) {
						$menu_args['menu'] = $custom_menu_id;
					}

					wp_nav_menu($menu_args);
					?>
					<?php
					$btn_text = '';
					$btn_link = '';
					$btn_style = 'btn__primary';

					if ($current_menu_id) {
						$btn_text = get_theme_mod('header_btn_text_' . $current_menu_id, '');
						$btn_link = get_theme_mod('header_btn_link_' . $current_menu_id, '');
						$btn_style = get_theme_mod('header_btn_style_' . $current_menu_id, 'btn__primary');
					}

					if ($btn_text && $btn_link) :
					?>
						<a class="btn <?php echo esc_attr($btn_style); ?> custom-btn-header ms-lg-3 my-3 my-lg-0" href="<?php echo esc_url($btn_link); ?>">
							<?php echo esc_html($btn_text); ?>
						</a>
					<?php endif; ?>
				</div>
				<div>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
			<?php endif; ?>
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

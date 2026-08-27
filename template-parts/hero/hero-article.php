<?php

/**
 * Hero — variante "article" (blog, post_type == post).
 * Entièrement automatique : pas de champ ACF. Le badge vient de la première
 * catégorie WordPress du post, le titre vient du post lui-même.
 */

$categories = get_the_category();
$badge      = !empty($categories) ? $categories[0]->name : '';
$title      = get_the_title();
$heading_id = 'hero-title-' . get_the_ID();
?>
<section class="hero hero--article" aria-labelledby="<?php echo esc_attr($heading_id); ?>">
	<div class="container">
		<?php idprotect_the_breadcrumb(); ?>
		<?php if ($badge) : ?>
			<span class="tag tag--light hero__badge"><?php echo esc_html($badge); ?></span>
		<?php endif; ?>
		<h1 id="<?php echo esc_attr($heading_id); ?>" class="hero__title"><?php echo esc_html($title); ?></h1>
	</div>
</section>

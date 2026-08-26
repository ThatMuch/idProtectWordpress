<?php

/**
 * Hero — variante "page" générique.
 * Champs ACF (acf-json/group_hero_page) : hero_eyebrow, hero_title,
 * hero_title_accent, hero_description, hero_cta_group.
 * Image : image mise en avant de la page (optionnelle — bascule le layout
 * en 2 colonnes quand elle est renseignée, sinon centré).
 */

$eyebrow     = get_field('hero_eyebrow');
$title       = get_field('hero_title') ?: get_the_title();
$accent      = get_field('hero_title_accent');
$description = get_field('hero_description');
$cta_group   = get_field('hero_cta_group');
$has_image   = has_post_thumbnail();
$heading_id  = 'hero-title-' . get_the_ID();
?>
<section class="hero hero--default<?php echo $has_image ? ' hero--has-image' : ''; ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>">
	<div class="container">
		<div class="hero__grid">
			<div class="hero__content">
				<?php if ($eyebrow) : ?>
					<span class="tag tag--light hero__eyebrow"><?php echo esc_html($eyebrow); ?></span>
				<?php endif; ?>
				<h1 id="<?php echo esc_attr($heading_id); ?>" class="hero__title">
					<?php echo esc_html($title); ?>
					<?php if ($accent) : ?>
						<span class="hero__title-accent"><?php echo esc_html($accent); ?></span>
					<?php endif; ?>
				</h1>
				<?php if ($description) : ?>
					<p class="hero__description"><?php echo esc_html($description); ?></p>
				<?php endif; ?>
				<?php idprotect_render_hero_cta_group($cta_group); ?>
			</div>
			<?php if ($has_image) : ?>
				<div class="hero__image">
					<?php the_post_thumbnail('large', array('class' => 'hero__image-img', 'alt' => the_title_attribute(array('echo' => false)))); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

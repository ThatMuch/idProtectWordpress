<?php

/**
 * Hero — variante "témoignage" (post_type == testimony).
 * Champs ACF (acf-json/group_hero_testimony) : hero_title, hero_title_accent,
 * hero_description. Badge "Témoignage" statique (aucune taxonomie sur ce CPT).
 * Image : image mise en avant (droite), sans overlay.
 */

$title       = get_field('hero_title') ?: get_the_title();
$accent      = get_field('hero_title_accent');
$description = get_field('hero_description');
$heading_id  = 'hero-title-' . get_the_ID();
?>
<section class="hero hero--testimony" aria-labelledby="<?php echo esc_attr($heading_id); ?>">
	<div class="container">
		<?php idprotect_the_breadcrumb(); ?>
		<div class="hero__grid">
			<div class="hero__content">
				<span class="tag tag--light hero__badge">Témoignage</span>
				<h1 id="<?php echo esc_attr($heading_id); ?>" class="hero__title">
					<?php echo esc_html($title); ?>
					<?php if ($accent) : ?>
						<span class="hero__title-accent"><?php echo esc_html($accent); ?></span>
					<?php endif; ?>
				</h1>
				<?php if ($description) : ?>
					<p class="hero__description"><?php echo esc_html($description); ?></p>
				<?php endif; ?>
			</div>
			<?php if (has_post_thumbnail()) : ?>
				<div class="hero__image">
					<?php the_post_thumbnail('large', array('class' => 'hero__image-img', 'alt' => '')); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

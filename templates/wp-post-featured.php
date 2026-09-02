<?php

/**
 * Carte article — variante "à la une".
 * Layout horizontal (image + contenu) avec extrait visible, à la différence
 * de templates/wp-post.php (grille compacte, CTA au survol).
 */

$categories    = get_the_category();
$category_slug = !empty($categories) ? $categories[0]->slug : '';
$category_name = !empty($categories) ? $categories[0]->name : '';
$tag_modifier  = $category_slug === 'professionnel' ? 'tag--pro' : ($category_slug === 'particulier' ? 'tag--particulier' : 'tag--default');
?>
<article class="featured-card<?php echo $category_slug ? ' featured-card--' . esc_attr($category_slug) : ''; ?>">
	<div class="featured-card__image">
		<?php the_post_thumbnail('large'); ?>
	</div>

	<div class="featured-card__content">
		<div class="featured-card__meta">
			<?php if ($category_name) : ?>
				<span class="tag <?php echo esc_attr($tag_modifier); ?> featured-card__badge"><?php echo esc_html($category_name); ?></span>
			<?php endif; ?>
			<span class="featured-card__date">
				<svg class="featured-card__date-icon" aria-hidden="true" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="2" y="3" width="12" height="11" rx="1.5" stroke="currentColor" stroke-width="1.3" />
					<path d="M2 6.5H14" stroke="currentColor" stroke-width="1.3" />
					<path d="M5.5 1.5V4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" />
					<path d="M10.5 1.5V4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" />
				</svg>
				<?php echo esc_html(get_the_date('j M Y')); ?>
			</span>
		</div>

		<h2 class="featured-card__title">
			<a href="<?php the_permalink(); ?>" class="featured-card__link"><?php the_title(); ?></a>
		</h2>

		<p class="featured-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>

		<span class="featured-card__cta" aria-hidden="true">
			Lire l'article
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.svg" alt="" class="featured-card__cta-icon">
		</span>
	</div>
</article>

<?php
$categories     = get_the_category();
$category_slug  = !empty($categories) ? $categories[0]->slug : '';
$category_name  = !empty($categories) ? $categories[0]->name : '';
?>
<article class="blog-card<?php echo $category_slug ? ' blog-card--' . esc_attr($category_slug) : ''; ?>">
	<div class="blog-card__image">
		<?php the_post_thumbnail('medium'); ?>

		<span class="blog-card__cta" aria-hidden="true">
			Lire l'article
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-white.svg" alt="" class="blog-card__cta-icon">
		</span>

		<div class="blog-card__meta">
			<?php if ($category_name) : ?>
				<span class="tag tag--light blog-card__badge"><?php echo esc_html($category_name); ?></span>
			<?php endif; ?>
			<span class="blog-card__date">
				<svg class="blog-card__date-icon" aria-hidden="true" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="2" y="3" width="12" height="11" rx="1.5" stroke="currentColor" stroke-width="1.3" />
					<path d="M2 6.5H14" stroke="currentColor" stroke-width="1.3" />
					<path d="M5.5 1.5V4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" />
					<path d="M10.5 1.5V4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" />
				</svg>
				<?php echo esc_html(get_the_date('j M Y')); ?>
			</span>
		</div>
	</div>

	<h2 class="blog-card__title">
		<a href="<?php the_permalink(); ?>" class="blog-card__link"><?php the_title(); ?></a>
	</h2>
</article>

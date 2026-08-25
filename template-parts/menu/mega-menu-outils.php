<?php

/**
 * Mega menu content for the "Outils" nav item.
 *
 * Loaded via get_template_part('template-parts/menu/mega-menu-outils') from
 * Bootstrap_NavWalker::end_el() for menu items carrying the "mega-menu-outils"
 * CSS class (set in Apparence > Menus > Options de l'écran > Classes CSS).
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */

$taxonomy = 'categorie-outil';

$featured_term = get_term_by('slug', 'featured', $taxonomy);
$exclude_term_ids = $featured_term ? array($featured_term->term_id) : array();

$category_terms = get_terms(array(
	'taxonomy'   => $taxonomy,
	'hide_empty' => true,
	'exclude'    => $exclude_term_ids,
	'orderby'    => 'term_id',
	'order'      => 'ASC',
));

if (! is_array($category_terms)) {
	$category_terms = array();
}

$outils_query_args = array(
	'post_type'      => 'outil',
	'post_status'    => 'publish',
	'orderby'        => 'menu_order title',
	'order'          => 'ASC',
	'meta_query'     => array(
		'relation' => 'OR',
		array(
			'key'     => 'afficher_menu',
			'compare' => 'NOT EXISTS',
		),
		array(
			'key'     => 'afficher_menu',
			'value'   => '0',
			'compare' => '!=',
		),
	),
);

$featured_outil = null;

if ($featured_term) {
	$featured_query = new WP_Query(array_merge($outils_query_args, array(
		'posts_per_page' => 1,
		'tax_query'      => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'term_id',
				'terms'    => $featured_term->term_id,
			),
		),
	)));

	if ($featured_query->have_posts()) {
		$featured_query->the_post();
		$featured_outil = get_post();
		wp_reset_postdata();
	}
}
?>
<div class="mega-menu__body">
	<div class="mega-menu__categories">
			<?php foreach ($category_terms as $term) :
				$tools_query = new WP_Query(array_merge($outils_query_args, array(
					'posts_per_page' => -1,
					'tax_query'      => array(
						array(
							'taxonomy' => $taxonomy,
							'field'    => 'term_id',
							'terms'    => $term->term_id,
						),
					),
				)));

				if (! $tools_query->have_posts()) {
					continue;
				}

				$quote = get_field('quote', $term);
				$quote = $quote ?: term_description($term);
			?>
				<div class="mega-menu__category">
					<div class="mega-menu__category-header">
						<p class="mega-menu__category-title"><?php echo esc_html($term->name); ?></p>
						<?php if ($quote) : ?>
							<p class="mega-menu__category-quote">« <?php echo esc_html($quote); ?> »</p>
						<?php endif; ?>
					</div>
					<ul class="mega-menu__tools">
						<?php while ($tools_query->have_posts()) : $tools_query->the_post();
							$icon = idprotect_get_outil_menu_icon(get_the_ID());
						?>
							<li class="mega-menu__tool">
								<a class="mega-menu__tool-link" href="<?php echo esc_url(get_permalink()); ?>">
									<span class="mega-menu__tool-icon">
										<?php if ($icon) : ?>
											<img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?? ''); ?>">
										<?php endif; ?>
									</span>
									<span class="mega-menu__tool-content">
										<span class="mega-menu__tool-title"><?php the_title(); ?></span>
										<span class="mega-menu__tool-excerpt"><?php echo esc_html(get_the_excerpt()); ?></span>
									</span>
								</a>
							</li>
						<?php endwhile;
						wp_reset_postdata();
						?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>

		<?php
		$app_store_url = get_field('mega_menu_app_store_url', 'options');
		$google_play_url = get_field('mega_menu_google_play_url', 'options');
		?>
		<?php if ($app_store_url || $google_play_url) : ?>
			<div class="mega-menu__mobile">
				<div class="mega-menu__mobile-text">
					<p class="mega-menu__mobile-title">Tous vos outils sur mobile</p>
					<p class="mega-menu__mobile-subtitle">C’est sur votre téléphone que se jouent les alertes en temps réel.</p>
				</div>
				<div class="mega-menu__mobile-badges">
					<?php if ($app_store_url) : ?>
						<a class="mega-menu__store-badge mega-menu__store-badge--apple" href="<?php echo esc_url($app_store_url); ?>" target="_blank" rel="noopener noreferrer">
							<img class="mega-menu__store-badge-icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/apple-store-icon.svg" alt="" aria-hidden="true">
							<span class="mega-menu__store-badge-text">
								<span class="mega-menu__store-badge-eyebrow">Télécharger dans</span>
								<span class="mega-menu__store-badge-label">l’App Store</span>
							</span>
						</a>
					<?php endif; ?>
					<?php if ($google_play_url) : ?>
						<a class="mega-menu__store-badge mega-menu__store-badge--google" href="<?php echo esc_url($google_play_url); ?>" target="_blank" rel="noopener noreferrer">
							<img class="mega-menu__store-badge-icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/google-play-icon.svg" alt="" aria-hidden="true">
							<span class="mega-menu__store-badge-text">
								<span class="mega-menu__store-badge-eyebrow">Disponible sur</span>
								<span class="mega-menu__store-badge-label">Google Play</span>
							</span>
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>

	<?php if ($featured_outil) :
		$icon = idprotect_get_outil_menu_icon($featured_outil->ID);
		$cta_label = get_field('menu_cta_label', $featured_outil->ID) ?: ('Découvrir ' . get_the_title($featured_outil));
	?>
		<div class="mega-menu__featured">
			<?php if ($icon) : ?>
				<span class="mega-menu__featured-icon">
					<img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?? ''); ?>">
				</span>
			<?php endif; ?>
			<p class="mega-menu__featured-title"><?php echo esc_html(get_the_title($featured_outil)); ?></p>
			<p class="mega-menu__featured-excerpt"><?php echo esc_html(get_the_excerpt($featured_outil)); ?></p>
			<a class="btn btn--secondary btn--solid mega-menu__featured-cta" href="<?php echo esc_url(get_permalink($featured_outil)); ?>">
				<?php echo esc_html($cta_label); ?>
			</a>
		</div>
	<?php endif; ?>

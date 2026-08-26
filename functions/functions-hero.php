<?php

/**
 * Helpers for the automatic per-page-type Hero system (template-parts/hero.php).
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */

/**
 * Renders a primary/secondary CTA pair from a `link` group field (hero_cta_group).
 */
function idprotect_render_hero_cta_group($cta_group)
{
	if (empty($cta_group)) {
		return;
	}

	$primary = $cta_group['primary_cta'] ?? null;
	$secondary = $cta_group['secondary_cta'] ?? null;

	if (empty($primary['url']) && empty($secondary['url'])) {
		return;
	}

	$ctas = array(
		array($primary, 'btn--secondary btn--solid'),
		array($secondary, 'btn--light btn--outlined'),
	);

	echo '<div class="hero__cta-group">';

	foreach ($ctas as $cta) {
		list($link, $classes) = $cta;

		if (empty($link['url'])) {
			continue;
		}

		$is_blank = ($link['target'] ?? '') === '_blank';

		printf(
			'<a class="btn %1$s" href="%2$s"%3$s><span>%4$s</span>%5$s</a>',
			esc_attr($classes),
			esc_url($link['url']),
			$is_blank ? ' target="_blank" rel="noopener noreferrer"' : '',
			esc_html($link['title']),
			$is_blank ? '<span class="screen-reader-text"> (ouvre dans un nouvel onglet)</span>' : ''
		);
	}

	echo '</div>';
}

/**
 * Renders App Store / Google Play buttons for the "Application mobile" hero,
 * falling back to the global mega-menu options (acf-json/group_6a8c5e2a4c001.json)
 * when the page-level fields are left empty.
 */
function idprotect_render_hero_store_buttons()
{
	$app_store   = get_field('hero_app_store_url') ?: get_field('mega_menu_app_store_url', 'option');
	$google_play = get_field('hero_google_play_url') ?: get_field('mega_menu_google_play_url', 'option');

	if (!$app_store && !$google_play) {
		return;
	}

	$stores = array(
		array($app_store, 'apple-store-icon.svg', 'Télécharger dans l’App Store'),
		array($google_play, 'google-play-icon.svg', 'Disponible sur Google Play'),
	);

	echo '<div class="hero__cta-group hero__store-buttons">';

	foreach ($stores as $store) {
		list($url, $icon, $label) = $store;

		if (!$url) {
			continue;
		}

		printf(
			'<a class="btn btn--light btn--outlined hero__store-button" href="%1$s" target="_blank" rel="noopener noreferrer">
				<span class="btn__icon"><img src="%2$s" alt="" aria-hidden="true"></span>
				<span>%3$s</span>
				<span class="screen-reader-text"> (ouvre dans un nouvel onglet)</span>
			</a>',
			esc_url($url),
			esc_url(get_template_directory_uri() . '/assets/images/' . $icon),
			esc_html($label)
		);
	}

	echo '</div>';
}

/**
 * Outputs a breadcrumb trail for the Hero (article/témoignage variants).
 * Defers to RankMath when active since it already encodes this site's
 * taxonomy/hierarchy rules; falls back to a minimal manual trail otherwise.
 */
function idprotect_the_breadcrumb()
{
	if (function_exists('rank_math_the_breadcrumbs')) {
		rank_math_the_breadcrumbs(array(
			'wrap_before' => '<nav class="hero__breadcrumb" aria-label="Fil d\'Ariane"><ol class="hero__breadcrumb__list">',
			'wrap_after'  => '</ol></nav>',
			'item_before' => '<li class="hero__breadcrumb__item">',
			'item_after'  => '</li>',
		));
		return;
	}

	idprotect_the_breadcrumb_fallback();
}

function idprotect_the_breadcrumb_fallback()
{
	$items = array(
		array('label' => 'Accueil', 'url' => home_url('/')),
	);

	if (is_singular('post')) {
		$categories = get_the_category();
		if (!empty($categories)) {
			$items[] = array('label' => $categories[0]->name, 'url' => get_category_link($categories[0]->term_id));
		}
	} elseif (is_page()) {
		foreach (array_reverse(get_post_ancestors(get_the_ID())) as $ancestor_id) {
			$items[] = array('label' => get_the_title($ancestor_id), 'url' => get_permalink($ancestor_id));
		}
	}

	$items[] = array('label' => get_the_title(), 'url' => '');

	echo '<nav class="hero__breadcrumb" aria-label="Fil d\'Ariane"><ol class="hero__breadcrumb__list">';

	$last_index = count($items) - 1;

	foreach ($items as $index => $item) {
		echo '<li class="hero__breadcrumb__item">';

		if ($index !== $last_index && $item['url']) {
			printf('<a href="%s">%s</a>', esc_url($item['url']), esc_html($item['label']));
		} else {
			printf('<span aria-current="page">%s</span>', esc_html($item['label']));
		}

		echo '</li>';
	}

	echo '</ol></nav>';
}

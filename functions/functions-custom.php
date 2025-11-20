<?php

/**
 * Add your own custom functions here
 * For example, your shortcodes...
 *
 */


/*==================================================================================
 SHORTCODES
==================================================================================*/


/* BUTTON
/––––––––––––––––––––––––*/
// Usage: [button link="https://twitter.com" text="Twitter"]
function shortcode_button($atts)
{
	$link = $atts['link'];
	$text = $atts['text'];
	return '<a href="' . $link . '" class="button">' . $text . '</a>';
}
add_shortcode('button', 'shortcode_button');

// Logo du site
add_theme_support(
	'custom-logo',
	array(
		'flex-height' => true,
	)
);

// Page d'options
if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

function find_block_by_name($block_name, $post_id)
{
	$blocks = parse_blocks(get_post_field('post_content', $post_id));

	foreach ($blocks as $block) {
		if ($block['blockName'] === $block_name) {
			return $block;
		}
	}

	return null;
}

function remplacer_premier_h2_par_h1_si_aucun_h1($content)
{
	// Vérifie si un <h1> existe déjà
	if (strpos($content, '<h1') === false) {
		// Remplace seulement le premier <h2> par un <h1>
		$content = preg_replace('/<h2([^>]*)>(.*?)<\/h2>/i', '<h1$1>$2</h1>', $content, 1);
	}

	return $content;
}
add_filter('the_content', 'remplacer_premier_h2_par_h1_si_aucun_h1');

/* Populate Menu Select Field
/––––––––––––––––––––––––*/
function acf_load_menu_field_choices($field)
{

	// Reset choices
	$field['choices'] = array();

	// Get all nav menus
	$menus = wp_get_nav_menus();

	// Add default option
	$field['choices'][''] = 'Menu par défaut';

	if (! empty($menus)) {
		foreach ($menus as $menu) {
			$field['choices'][$menu->term_id] = $menu->name;
		}
	}

	return $field;
}
add_filter('acf/load_field/name=page_custom_menu', 'acf_load_menu_field_choices');

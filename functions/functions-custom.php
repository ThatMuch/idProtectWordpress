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

function custom_menu_item($items, $args)

{
	if ($args->theme_location == 'mainmenu') {
		ob_start();
		include(locate_template('templates/dropdown-menu.php'));
		$custom_content = ob_get_clean();
		$menu = $custom_content . $items;
	}
	return $menu;
}
add_filter('wp_nav_menu_items', 'custom_menu_item', 10, 2);

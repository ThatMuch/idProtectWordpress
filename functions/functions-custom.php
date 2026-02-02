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
	// Ne s'applique que sur les pages, pas sur les articles
	if (!is_page()) {
		return $content;
	}

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

/*==================================================================================
  CUSTOMIZER SETTINGS
==================================================================================*/
function idprotect_customize_register($wp_customize)
{
	// Panel Header Button
	$wp_customize->add_panel('idprotect_header_panel', array(
		'title'       => __('Bouton Header', 'idprotect'),
		'priority'    => 30,
		'description' => __('Sélectionnez un menu pour configurer son bouton.', 'idprotect'),
	));

	$menus = wp_get_nav_menus();

	if (!empty($menus)) {
		foreach ($menus as $menu) {
			$menu_id = $menu->term_id;
			$menu_name = $menu->name;

			// Section per Menu
			$wp_customize->add_section('idprotect_header_section_' . $menu_id, array(
				'title'  => $menu_name,
				'panel'  => 'idprotect_header_panel',
			));

			// Button Text
			$wp_customize->add_setting('header_btn_text_' . $menu_id, array(
				'default'   => '',
				'transport' => 'refresh',
			));
			$wp_customize->add_control('header_btn_text_' . $menu_id, array(
				'label'    => __('Texte du bouton', 'idprotect'),
				'section'  => 'idprotect_header_section_' . $menu_id,
				'type'     => 'text',
			));

			// Button Link
			$wp_customize->add_setting('header_btn_link_' . $menu_id, array(
				'default'   => '',
				'transport' => 'refresh',
			));
			$wp_customize->add_control('header_btn_link_' . $menu_id, array(
				'label'    => __('Lien du bouton', 'idprotect'),
				'section'  => 'idprotect_header_section_' . $menu_id,
				'type'     => 'url',
			));

			// Button Style
			$wp_customize->add_setting('header_btn_style_' . $menu_id, array(
				'default'   => 'btn__primary',
				'transport' => 'refresh',
			));
			$wp_customize->add_control('header_btn_style_' . $menu_id, array(
				'label'    => __('Style du bouton', 'idprotect'),
				'section'  => 'idprotect_header_section_' . $menu_id,
				'type'     => 'select',
				'choices'  => array(
					'btn__primary'   => 'Primaire (Orange)',
					'btn__secondary' => 'Secondaire (Bleu)',
					'btn__white'     => 'Blanc',
				),
			));
		}
	}
}
add_action('customize_register', 'idprotect_customize_register');


/*==================================================================================
  FORM HANDLING
==================================================================================*/
function handle_id_tracker_form_submission()
{
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && isset($_POST['id_tracker_submit'])) {
		$email = sanitize_email($_POST['email']);

		// 1. Définissez vos secrets (Doivent être IDENTIQUES au .env de React)
		$secret_key_string = "UZOZ728EUII2990EUIU29";
		$secret_iv_string  = "PPAZI823829HHJ282jkj289";

		// 2. Transformation comme dans Node.js (Hashage)
		// SHA256 produit 32 bytes (parfait pour AES-256)
		// MD5 produit 16 bytes (parfait pour l'IV AES)
		// Le paramètre 'true' demande une sortie binaire brute (raw binary)
		$key = hash('sha256', $secret_key_string, true);
		$iv  = hash('md5', $secret_iv_string, true);

		$ciphering = "AES-256-CBC";

		// 3. Encryptage
		$encrypted_email = openssl_encrypt($email, $ciphering, $key, 0, $iv);

		// Redirection
		if ($encrypted_email) {
			// Note: encodez deux fois si nécessaire, mais urlencode suffit souvent
			$test_url = "https://app.idprotect.fr/fuites-donnees?email=" . urlencode($encrypted_email);
			wp_redirect($test_url);
			exit;
		}
	}
}
add_action('init', 'handle_id_tracker_form_submission');

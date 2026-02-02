<?php

/**
 * Hero Section ID Tracker Block
 */

// $data is what we're going to expose to our render template
$data = array(
	'hero_title'        => get_field('hero_title'),
	'hero_description'  => get_field('hero_description'),
	'card_icon'         => get_field('card_icon'),
	'card_title'        => get_field('card_title'),
	'card_text_start'   => get_field('card_text_start'),
	'card_text_accent'  => get_field('card_text_accent'),
	'card_text_end'     => get_field('card_text_end'),
	'input_placeholder' => get_field('input_placeholder'),
	'button_text'       => get_field('button_text'),
	'footer_text'       => get_field('footer_text'),
);

// Dynamic block ID
$block_id = acf_get_block_id($block);
if (!empty($block['anchor'])) {
	$block_id = $block['anchor'];
}

// Block classes
$class_name = 'heroSectionIDTracker';
if (!empty($block['class_name'])) {
	$class_name .= ' ' . $block['class_name'];
}

/**
 * Pass the block data into the template part
 */
get_template_part(
	'blocks/HeroSectionIDTracker/template',
	null,
	array(
		'block'      => $block,
		'is_preview' => $is_preview,
		'post_id'    => $post_id,
		'data'       => $data,
		'class_name' => $class_name,
		'block_id'   => $block_id,
	)
);

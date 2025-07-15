<?php

/**
 * My First Block
 */

// $data is what we're going to expose to our render template
$data = array(
	'title' => get_field('title'),
	'accent' => get_field('title_accent'),
	'subtitle' => get_field('subtitle'),
	'image' => get_field('image'),
	'description' => get_field('description'),
	'is_reverse' => get_field('reverse'),
	'is_first' => get_field('is_first'),
);

// Dynamic block ID
$block_id = acf_get_block_id($block); // For debugging purposes, remove in production
// Check if a custom ID is set in the block editor
if (!empty($block['anchor'])) {
	$block_id = $block['anchor'];
}

// Block classes
$class_name = 'heroSection';
if (!empty($block['class_name'])) {
	$class_name .= ' ' . $block['class_name'];
}

/**
 * Pass the block data into the template part
 */
get_template_part(
	'blocks/HeroSection/template',
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

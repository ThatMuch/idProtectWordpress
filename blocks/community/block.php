<?php
/**
 * My First Block
 */

// $data is what we're going to expose to our render template
$data = array(
	'title' => get_field( 'title' ),
	'image' => get_field( 'image' ),
	'card_1' => get_field( 'card_1' ),
	'card_2' => get_field( 'card_2' ),
);

// Dynamic block ID
$block_id = 'community-' . $block['id'];

// Check if a custom ID is set in the block editor
if( !empty($block['anchor']) ) {
    $block_id = $block['anchor'];
}

// Block classes
$class_name = 'community';
if( !empty($block['class_name']) ) {
    $class_name .= ' ' . $block['class_name'];
}

/**
 * Pass the block data into the template part
 */
get_template_part(
	'blocks/community/template',
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

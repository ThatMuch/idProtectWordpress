<?php
/**
 * My First Block
 */
// $data is what we're going to expose to our render template
$data = array(
	'title' => get_field( 'title' ),
    'subtitle' => get_field( 'subtitle' ),
	'description' => get_field( 'description' ),
	'link' => get_field( 'link' ),
	'image' => get_field( 'image' )
);

// Dynamic block ID
$block_id = 'service' . $block['id'];



// Check if a custom ID is set in the block editor
if( !empty($block['anchor']) ) {
    $block_id = $block['anchor'];
}

// Block classes
$class_name = 'block__service card__box';
if( !empty($block['class_name']) ) {
    $class_name .= ' ' . $block['class_name'];
}

/**
 * Pass the block data into the template part
 */
get_template_part(
	'blocks/service/template',
	null,
	array(
		'block'      => $block,
		'is_preview' => $is_preview,
		'post_id'    => $post_id,

		'data'       => $data,
        'class_name' => $class_name,
        'block_id'   => $block_id,
		'bg_color'   => $block['backgroundColor'],
	)
);

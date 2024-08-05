<?php

// Dynamic block ID
$block_id = 'blog' . $block['id'];

// Check if a custom ID is set in the block editor
if (!empty($block['anchor'])) {
	$block_id = $block['anchor'];
}

// Block classes
$class_name = 'block__blog mb-100';
if (!empty($block['class_name'])) {
	$class_name .= ' ' . $block['class_name'];
}

get_template_part(
	'blocks/Blog/template',
	null,
	array(
		'block' => $block,
		'is_preview' => $is_preview,
		'post_id' => $post_id,

		//'data' => $data,
		'class_name' => $class_name,
		'block_id' => $block_id,
	)
);

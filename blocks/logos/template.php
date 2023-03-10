<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];

$size = 'medium'; // (thumbnail, medium, large, full or custom size)
?>
<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
<h2> <?php echo $data['title']; ?></h2>
	<?php if( $data['gallery'] ): ?>
    <ul>
        <?php foreach( $data['gallery'] as $image ): ?>
            <li>
                <img
				src="<?php echo esc_url($image['sizes']['thumbnail']); ?>"
				alt="<?php echo esc_attr($image['alt']); ?>" />
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
</div>



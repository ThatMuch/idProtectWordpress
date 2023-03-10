<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
?>
<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
<?php if ( $data['image'] ) : ?>
	<img src="<?php echo esc_url( $data['image']['url'] ); ?>" alt="<?php echo esc_attr( $data['image']['alt'] ); ?>" />
<?php endif; ?>

<div class="bg_<?php echo $args['bg_color'];?>">
	<p><?php echo $data['title']; ?></p>
	<p><?php echo $data['subtitle']; ?></p>
	<p><?php echo $data['description'];?></p>

	<?php if ( $data['link'] ) : ?>
		<a href="<?php echo esc_url( $data['link']['url'] ); ?>" target="<?php echo esc_attr( $data['link']['target'] ); ?>"><?php echo esc_html( $data['link']['title'] ); ?></a>
	<?php endif; ?>
</div>
</div>



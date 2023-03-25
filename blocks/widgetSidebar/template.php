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
<?php if ( $data['icon'] ) : ?>
		<img src="<?php echo esc_url( $data['icon']['url'] ); ?>" alt="<?php echo esc_attr( $data['icon']['alt'] ); ?>" />
<?php endif; ?>

	<h2><?php echo $data['title'];?></h2>
	<p><?php echo $data['text'];?></p>
		<?php if ( $data['file'] ) : ?>
			<a
			href="<?php echo esc_url( $data['file']['url'] ); ?>"
			target="_blank"
			class="btn btn__orange white">
				Télécharger
			</a>
		<?php endif; ?>
</div>

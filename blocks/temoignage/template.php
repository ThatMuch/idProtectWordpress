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
	<h3><?php echo $data['title']; ?></h3>
	<h4><?php echo $data['subtitle'];?></h4>
	<?php echo $data['description'];?>

	<?php if ( have_rows( 'video_preview' ) ) : ?>
	<?php while ( have_rows( 'video_preview' ) ) : the_row(); ?>
		<?php $image_1 = get_sub_field( 'image_1' ); ?>
		<?php if ( $image_1 ) : ?>
			<img src="<?php echo esc_url( $image_1['url'] ); ?>" alt="<?php echo esc_attr( $image_1['alt'] ); ?>" />
		<?php endif; ?>
		<?php $image_2 = get_sub_field( 'image_2' ); ?>
		<?php if ( $image_2 ) : ?>
			<img src="<?php echo esc_url( $image_2['url'] ); ?>" alt="<?php echo esc_attr( $image_2['alt'] ); ?>" />
		<?php endif; ?>
		<?php the_sub_field( 'video' ); ?>
	<?php endwhile; ?>
<?php endif; ?>
</div>



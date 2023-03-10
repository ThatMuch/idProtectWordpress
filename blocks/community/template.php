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
<h3> <?php echo $data['title'];?></h3>


<?php if ( have_rows( 'card_1' ) ) : ?>
	<?php while ( have_rows( 'card_1' ) ) : the_row(); ?>
	<?php $image = $data['card_1']['icon'];  ?>
		<?php if ( !empty( $image ) ) : ?>
			    <img
				src="<?php echo esc_url($image['url']); ?>"
				alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?>
		<p><?php the_sub_field( 'text' ); ?></p>
	<?php endwhile; ?>
<?php endif; ?>

<?php if ( have_rows( 'card_2' ) ) : ?>
	<?php while ( have_rows( 'card_2' ) ) : the_row(); ?>
		<?php the_sub_field( 'title' ); ?>
		<?php the_sub_field( 'description' ); ?>
		<?php $link = get_sub_field( 'link' ); ?>
		<?php if ( $link ) : ?>
			<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
</div>



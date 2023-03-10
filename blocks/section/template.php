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
	<h2><?php echo $data['title']; ?></h2>

<?php if ( $data['image'] ) : ?>
	<img src="<?php echo esc_url( $data['image']['url'] ); ?>" alt="<?php echo esc_attr( $data['image']['alt'] ); ?>" />
<?php endif; ?>

<?php if ( have_rows( 'card' ) ) : ?>
	<?php while ( have_rows( 'card' ) ) : the_row(); ?>
		<?php the_sub_field( 'title' ); ?>
		<?php the_sub_field( 'text' ); ?>
		<?php $link = get_sub_field( 'link' ); ?>
		<?php if ( $link ) : ?>
			<a
			href="<?php echo esc_url( $link['url'] ); ?>"
			target="<?php echo esc_attr( $link['target'] ); ?>">
				<?php echo esc_html( $link['title'] ); ?>
		</a>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
</div>



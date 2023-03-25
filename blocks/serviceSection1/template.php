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

<div class="row g-3 align-items-end">
<?php if ( have_rows( 'card_1' ) ) : ?>
	<?php while ( have_rows( 'card_1' ) ) : the_row(); ?>
	    <div class="col-xl-4 col-lg-6">
			<div class="card__text__box">
				<?php $image = get_sub_field('image');  ?>
					<?php if ( !empty( $image ) ) : ?>
						<img
						src="<?php echo esc_url($image['url']); ?>"
						alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
				<h2 class="mt-5"><?php echo get_sub_field('title'); ?></h2>
				<h4><?php echo get_sub_field('text'); ?></h4>
				<!-- get link -->
				<?php $link = get_sub_field('llink'); ?>
				<?php if ( $link ) : ?>
					<a
					class="btn btn__white"
					href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?>
				<img src="<?php echo get_template_directory_uri()?>/assets/images/arrow-right.svg" alt="Flèche vers la droite">
				</a>
				<?php endif; ?>
			</div>
        </div>
	<?php endwhile; ?>
<?php endif; ?>

<?php if(have_rows('card_2')) : ?>
	<?php while (have_rows('card_2')) : the_row(); ?>
		<div class="col-xl-8 col-lg-6">
			<div class="card__text__image">
				<?php $image = get_sub_field('image');  ?>
					<?php if ( !empty( $image ) ) : ?>
						<img
						src="<?php echo esc_url($image['url']); ?>"
						alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
			</div>
			<div class="card__text__body">
				<?php echo get_sub_field('title'); ?>
				<p><?php echo get_sub_field('text'); ?></p>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

</div>

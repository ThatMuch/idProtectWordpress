<?php
$block = $args['block'];
// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
?>

<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<div class="d-flex justify-content-center text-uppercase mb-3">
			<?php echo $data['title'];
			?>
		</div>
		<div class="row">
			<?php if (have_rows('blocks')) : ?>
				<?php while (have_rows('blocks')) : the_row(); ?>
					<div class="col-lg-4">
						<div class="card">
							<p class="card__title"><?php the_sub_field('data'); ?></p>
							<p><?php the_sub_field('text'); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

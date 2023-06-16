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
	<div class="promotion__bg" style="background-image: url(<?php echo esc_url($data['image']['url']); ?>)">
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="promotion">
					<div class="promotion__head">
						<?php echo $data['title']; ?>
					</div>
					<?php if (have_rows('card')) : ?>
						<div class="promotion__bottom">
							<?php while (have_rows('card')) : the_row(); ?>

								<h2><?php the_sub_field('title'); ?></h2>
								<p><?php the_sub_field('text'); ?></p>
								<?php $link = get_sub_field('link'); ?>
								<?php if ($link) : ?>
									<a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" class="btn btn__white">
										<?php echo esc_html($link['title']); ?>
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="Flèche vers la droite">
									</a>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>


				</div>
			</div>
		</div>
	</div>
</div>

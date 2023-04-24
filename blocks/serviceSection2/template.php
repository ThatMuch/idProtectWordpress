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
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card__title">
					<h2 class="title">la protection</h2>
					<h2 class="title"><span class="g-text">la plus simple du marché</span></h2>
				</div>
			</div>
		</div>
		<div class="row g-3 mt-3 align-items-start">
			<?php if (have_rows('section2_card_1')) : ?>
				<?php while (have_rows('section2_card_1')) : the_row(); ?>
					<div class="col-lg-5">
						<div class="card__text__box mb-3">
							<?php $image = get_sub_field('icon');  ?>
							<?php if (!empty($image)) : ?>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
							<h3 class="my-4"><?php echo get_sub_field('title'); ?></h3>
							<!-- get link -->
							<?php $link = get_sub_field('link'); ?>
							<?php if ($link) : ?>
								<a class="btn btn__white" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?>
									<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="Flèche vers la droite">
								</a>
							<?php endif; ?>
						</div>
						<div class="card__text__image full-width">
							<?php $image = get_sub_field('image');  ?>
							<?php if (!empty($image)) : ?>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-100" />
							<?php endif; ?>
						</div>

					</div>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php if (have_rows('section2_card_2')) : ?>
				<?php while (have_rows('section2_card_2')) : the_row(); ?>
					<div class="col-lg-7">
						<div class="card__text__body">
							<h2><?php echo get_sub_field('title'); ?></h2>
							<p><?php echo get_sub_field('text'); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</div>
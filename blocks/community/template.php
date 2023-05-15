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
		<div class="row align-items-start">
			<div class="col-lg-5 order-lg-1">
				<h3 class="title text__orange community__title"><?php echo $data['title']; ?></h3>
				<div class="community__image">
					<?php $image = $data['image'];  ?>
					<?php if (!empty($image)) : ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-7 order-lg-0">
				<div>
					<?php if (have_rows('card_1')) : ?>
						<div class="community__head">
							<?php while (have_rows('card_1')) : the_row(); ?>
								<?php $image = $data['card_1']['icon'];  ?>
								<?php if (!empty($image)) : ?>
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
								<h3><?php the_sub_field('text'); ?></p>
								<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php if (have_rows('card_2')) : ?>
						<div class="community__body">
							<?php while (have_rows('card_2')) : the_row(); ?>
								<h2><?php the_sub_field('title'); ?></h2>
								<p><?php the_sub_field('description'); ?></p>
								<?php $link = get_sub_field('link'); ?>
								<?php if ($link) : ?>
									<a class="btn btn__white text__orange" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?>
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right-orange.svg" alt="Flèche vers la droite">
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
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
		<div class="row justify-content-center">
			<!-- Display the group field tarif_card1 -->
			<?php if (have_rows('tarif_card')) : ?>
				<?php $i = 0; ?>
				<?php while (have_rows('tarif_card')) : the_row(); ?>
					<div class="col-lg-<?php echo $i <= 2 ? '5' : '4'; ?>">
						<div class="price__table">
							<div class="price__head">
								<div class="price__head__left">
									<h4 class="price__head__offer"><?php echo get_sub_field('offer'); ?></h4>
								</div>
								<div>
									<span class="price__head__price g-text"><?php echo get_sub_field('price'); ?>€</span>
								</div>
							</div>
							<section class="price__body">
								<h2 class="price__body__title"><?php echo get_sub_field('title'); ?></h2>
								<p><?php echo get_sub_field('text'); ?></p>
								<?php $link = get_sub_field('link'); ?>
								<?php if ($link) : ?>
									<a class="btn btn__primary" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?>
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="Flèche vers la droite">
									</a>
								<?php endif; ?>
							</section>
						</div>
					</div>
				<?php $i++;
				endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
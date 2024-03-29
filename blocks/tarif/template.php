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
					<h2 class="title">
						<span class="g-text">
							<?php echo get_field('section_title') ? get_field('section_title') : 'Tarifs'; ?>
						</span>
					</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php if (have_rows('tarif_card')) : ?>
				<?php $i = 0; ?>
				<?php while (have_rows('tarif_card')) : the_row(); ?>
					<div class="col-lg-<?php echo $i <= 2 ? '4' : '5'; ?>">
						<?php $isPromotion = count(get_sub_field('promotion')) > 0;
						?>
						<div class="price__table <?php echo get_sub_field('offer'); ?>">
							<?php if ($isPromotion) : ?>
								<div class="price__table__promotion">
									<p><?php echo get_sub_field('promotion_label'); ?></p>
								</div>
							<?php endif; ?>
							<div class="price__head">
								<div class="price__head__left">
									<h4><?php echo get_sub_field('offer'); ?></h4>
									<h2>
										<?php if ($isPromotion) : ?>
											<span class="price__table__promotion__price">
												<?php echo get_sub_field('promotion_price'); ?>€
											</span>
										<?php endif; ?>
										<span class="g-text <?php echo $isPromotion ? 'isPromotion' : ''; ?>">
											<?php echo get_sub_field('price'); ?>€</span>
									</h2>
									<?php if (get_sub_field('text_add')) : ?>
										<span class="section-price__column__text-add"><?php echo get_sub_field('text_add'); ?></span>
									<?php endif; ?>
								</div>
								<div class="price__head__right">
									<?php $image = get_sub_field('image');  ?>
									<?php if (!empty($image)) : ?>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>
								</div>
							</div>
							<div class="price__body">
								<h2><?php echo get_sub_field('title'); ?></h2>
								<p><?php echo get_sub_field('text'); ?></p>

								<?php if (have_rows('list')) : ?>
									<ul>
										<?php while (have_rows('list')) : the_row(); ?>
											<?php
											// Get the 'disabled' field value
											$disabled = get_sub_field('desactive');

											// Check if the 'disabled' checkbox is checked
											$disabled_class = $disabled ? 'disable' : '';

											?>
											<li class="<?php echo esc_attr($disabled_class); ?>"><?php echo get_sub_field('text') ?></li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
							<div class="price__footer">
								<?php $link = get_sub_field('link'); ?>
								<?php if ($link) : ?>
									<a class="btn btn__white" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?>
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="Flèche vers la droite">
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php $i++;
				endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
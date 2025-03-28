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
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<div class="row g-5 align-items-center <?php echo $data['orientation'] === "droite" ? "flex-row-reverse" : ""; ?>">
			<div class="col-lg-5">
				<?php $image = $data['image'];  ?>
				<?php if (!empty($image)) : ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
			</div>
			<div class="col-lg-7">
				<div class="step__list">
					<?php if ($data['title']) : ?>
						<h2 class="section__title h1"><?= $data['title'] ?> <span class="title text__orange"><?= $data['accent'] ?></span></h2>
					<?php endif; ?>
					<!-- display the list of elements from a repeater field in acf -->
					<?php if (have_rows('steps')) : ?>
						<div class="items">
							<?php $i = 1; ?>
							<?php while (have_rows('steps')) : the_row();
								// vars
								$step = get_sub_field('step');
								$step_number = get_sub_field('step_number');
								$step_title = get_sub_field('title');
								$step_description = get_sub_field('description');
							?>
								<div class="item">
									<span class="item__number">
										<?php echo $i; ?>
									</span>
									<div>
										<h3 class="text-uppercase h4"> <?php echo $step_title; ?></h3>
										<?php if ($step_description) {
											echo $step_description;
										}; ?>
									</div>
								</div>

							<?php $i++;
							endwhile; ?>
						</div>
					<?php endif; ?>
					<?php if ($data['cta']) : ?> <a class="btn btn__primary" href="<?php echo esc_url($data['cta']['url']); ?>"><span><?php echo esc_html($data['cta']['title']); ?></span></a> <?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</section>

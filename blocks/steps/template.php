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
<div class="row">
	<div class="col-md-12">
		<div class="card__title right">
			<?php echo $data['title'] ?>
		</div>
	</div>
</div>
<div class="row g-5 align-items-center">
	<div class="col-lg-5">
		<?php $image = $data['image'];  ?>
		<?php if (!empty($image)) : ?>
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?>
	</div>
	<div class="col-lg-7">
		<div class="step__list">

			<!-- display the list of elements from a repeater field in acf -->
			<?php if (have_rows('steps')) : ?>
				<ul class="nav nav-tabs">
					<?php $i = 1; ?>
					<?php while (have_rows('steps')) : the_row();
						// vars
						$step = get_sub_field('step');
						$step_number = get_sub_field('step_number');
						$step_title = get_sub_field('title');
						$step_description = get_sub_field('description');
					?>
						<li>
							<a data-bs-toggle="tab" href="#step-<?php echo $i; ?>">
								<span class="text">
									<span class="g-text"><?php echo $i; ?></span>
								</span>
								<div class="text__body">
									<span class="head"> <?php echo $step_title; ?></span>
									<?php if ($step_description) {
										echo $step_description;
									}; ?>

								</div>
							</a>
						</li>
					<?php $i++;
					endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</div>
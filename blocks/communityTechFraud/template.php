<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];

$size = 'medium'; // (thumbnail, medium, large, full or custom size)
?>
<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<div class="row align-items-end mb-5">
			<div class="col-lg-5">
				<?php echo $data['title']; ?>
				<?php if (have_rows('card_1')) : ?>
					<div class="community__body">
						<?php while (have_rows('card_1')) : the_row(); ?>
							<h2><?php the_sub_field('title'); ?></h2>
							<p><?php the_sub_field('description'); ?></p>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-7">
				<?php if (have_rows('card_2')) : ?>
					<div class="community__head">
						<?php while (have_rows('card_2')) : the_row(); ?>
							<?php $image = $data['card_2']['icon'];  ?>
							<?php if (!empty($image)) : ?>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
							<h3><?php the_sub_field('text'); ?></p>
							<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($data['gallery']) : ?>
			<div class="block-logos sponsor slider">
				<ul class="slide-track">
					<?php foreach ($data['gallery'] as $image) : ?>
						<li class="slide">
							<a href="<?php echo esc_url($image['description']); ?>" target="_blank">
								<img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							</a>
						</li>
					<?php endforeach; ?>
					<?php foreach ($data['gallery'] as $image) : ?>
						<li class="slide">
							<a href="<?php echo esc_url($image['description']); ?>" target="_blank">
								<img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</div>
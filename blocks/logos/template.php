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

// Used to label the auto-scrolling region for assistive tech.
$title_id = $block_id . '-title';
?>
<section class="section__logos">
	<h2 id="<?php echo esc_attr($title_id); ?>" class="section__logos__title"><span> <?php echo esc_html($data['title']); ?></span></h2>
	<div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($class_name); ?> slider" role="region" aria-labelledby="<?php echo esc_attr($title_id); ?>">
		<?php if ($data['gallery']) : ?>
			<ul class="slide-track" role="list">
				<?php foreach ($data['gallery'] as $image) : ?>
					<li class="slide">
						<?php if ($image['description']) : ?>
							<a href="<?php echo esc_url($image['description']); ?>" target="_blank" rel="noopener noreferrer">
								<img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<span class="screen-reader-text"> (ouvre dans un nouvel onglet)</span>
							</a>
						<?php else : ?>
							<img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
				<?php // Visual-only clone that completes the seamless scroll loop; hidden
				// from assistive tech so the same logos aren't announced twice. ?>
				<?php foreach ($data['gallery'] as $image) : ?>
					<li class="slide" aria-hidden="true">
						<img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="" />
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>

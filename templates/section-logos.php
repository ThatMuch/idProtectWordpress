<?

/**
 * Logos Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 *
 */
?>

<section class="section section-logos">
	<div class="container">
		<!-- Title -->
		<?php if (get_sub_field('title')) : ?>
			<h2 class="section__title"><?php echo get_sub_field('title'); ?></h2>
		<?php endif; ?>
		<!-- Title -->
		<?php

		$images = get_sub_field('logo_list');
		$size = 'medium';

		if ($images) : ?>
			<div class="section-logos__grid">
				<?php foreach ($images as $image) : ?>
					<div class="logo">
						<img src="<?php echo $image['sizes'][$size]; ?>" alt="<?php echo $image['alt']; ?>" />
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

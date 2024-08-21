<?php
$title = get_field('title') ?: 'Default title';
$text = get_field('text') ?: 'Default text';
$background = get_field('background');
$link = get_field('link');
$pro = get_field('pro');
// check if the field pro is checked

?>
<section class="mb-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="block__link promo <?php echo $pro ? 'professionnels' : ''; ?>" style="background-image: linear-gradient(0deg, rgba(15, 71, 143, 0.45), rgba(15, 71, 143, 0.45)), url(<?php echo esc_url($background['url']); ?>) ">
					<div class="promo__text">
						<h3><?php echo $title; ?></h3>
						<p><?php echo $text; ?> </p>
						<?php if ($link) : ?>
							<a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" class="btn btn__white"><?php echo esc_html($link['title']); ?><img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="Flèche vers la droite"></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

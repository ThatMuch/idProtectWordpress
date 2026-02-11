<?php
// The block attributes
$block = $args['block'];
$data = $args['data'];
$block_id = $args['block_id'];
$class_name = $args['class_name'];

$hero_title = $data['hero_title'] ?: 'Protégez votre identité en ligne';
$hero_description = $data['hero_description'] ?: 'Si vos données sont présentées au sein de notre réseau, vous en êtes <strong>immédiatement informé</strong>, vous permettant d’agir rapidement pour protéger votre identité.';
$card_icon = $data['card_icon']; // Array
$card_title = $data['card_title'] ?: '600 M de données <br> personnelles ont fuité en 2025';
$card_text_start = $data['card_text_start'] ?: 'Reprenez ';
$card_text_accent = $data['card_text_accent'] ?: 'gratuitement';
$card_text_end = $data['card_text_end'] ?: ' le contrôle de vos données';
$input_placeholder = $data['input_placeholder'] ?: 'Votre adresse e-mail';
$button_text = $data['button_text'] ?: 'Activer ID Tracker';
$footer_text = $data['footer_text'] ?: 'Utiliser idprotect est soumis au <a href="#">conditions générales d’utilisation</a>';

?>

<div id="<?php echo esc_attr($block_id); ?>" class="heroSection <?php echo esc_attr($class_name); ?>">
	<div class="heroSection__content">
		<h1><?php echo wp_kses_post($hero_title); ?></h1>
		<div class="heroSection__description"><?php echo wp_kses_post($hero_description); ?></div>

		<?php if (!empty($data['card_title'])) : // Check if we even want to show the card parts if fields exist
		?>
			<div class="heroSection__card">
				<?php if ($card_icon) : ?>
					<img class="heroSection__card__icon" src="<?php echo esc_url($card_icon['url']); ?>" alt="<?php echo esc_attr($card_icon['alt']); ?>">
				<?php else: ?>
					<img class="heroSection__card__icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/FileIdprotect.png" alt="FileIdprotect">
				<?php endif; ?>

				<h2><?php echo wp_kses_post($card_title); ?></h2>
				<p><?php echo esc_html($card_text_start); ?><span class="accent">
						<span class="corner"></span>
						<span class="corner"></span>
						<span class="corner"></span>
						<span class="corner"></span>
						<?php echo esc_html($card_text_accent); ?></span><?php echo esc_html($card_text_end); ?></p>
				<form action="" method="POST" class="heroSection__card__form">
					<input type="email" placeholder="<?php echo esc_attr($input_placeholder); ?>" required name="email" autocomplete="email" aria-label="<?php echo esc_attr($input_placeholder); ?>">
					<button class="btn" type="submit" aria-label="<?php echo esc_attr($button_text); ?>">
						<i class="fa fa-bell"></i>
						<?php echo esc_html($button_text); ?>
						<i class="fa fa-arrow-right"></i>
					</button>
					<input type="hidden" name="id_tracker_submit" value="1">
				</form>
				<p class="small"><?php echo wp_kses_post($footer_text); ?></p>
			</div>
		<?php else:
			// Fallback if no ACF data (just to be safe, though defaults are set above)
		?>
			<div class="heroSection__card">
				<img class="heroSection__card__icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/FileIdprotect.png" alt="FileIdprotect">
				<h2>600 M de données <br> personnelles ont fuité en 2025</h2>
				<p>Reprenez <span class="accent">
						<span class="corner"></span>
						<span class="corner"></span>
						<span class="corner"></span>
						<span class="corner"></span>
						gratuitement</span> le contrôle de vos données</p>
				<form action="" method="POST" class="heroSection__card__form">
					<input type="email" placeholder="Votre adresse e-mail" required name="email" autocomplete="email" aria-label="Votre adresse e-mail">
					<button class="btn" type="submit" aria-label="Activer ID Tracker">
						<i class="fa fa-bell"></i>
						Activer ID Tracker
						<i class="fa fa-arrow-right"></i>
					</button>
					<input type="hidden" name="id_tracker_submit" value="1">
				</form>
				<p class="small">Utiliser idprotect est soumis au <a href="https://idprotect.fr/cgv-cgu/">conditions générales d’utilisation</a></p>
			</div>
		<?php endif; ?>
	</div>
</div>

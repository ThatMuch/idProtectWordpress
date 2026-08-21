<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>
<?php
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');

// get the template type of the page
$template = get_page_template_slug();
$template = str_replace(array('page-', '.php'), '', $template);
?>

</div><!-- #content -->
<?php
$footer_year = date('Y');
$footer_menu_locations = get_nav_menu_locations();
$footer_columns = array(
	1 => get_field('footer_column_1_title', 'options') ?: 'Nos outils',
	2 => get_field('footer_column_2_title', 'options') ?: 'Offres',
	3 => get_field('footer_column_3_title', 'options') ?: 'Ressources',
);
$footer_social_icons = array(
	'facebook' => array('label' => 'Facebook', 'icon' => 'fa-facebook-f'),
	'instagram' => array('label' => 'Instagram', 'icon' => 'fa-instagram'),
	'linkedin' => array('label' => 'Linkedin', 'icon' => 'fa-linkedin-in'),
	'youtube' => array('label' => 'Youtube', 'icon' => 'fa-youtube'),
	'twitter' => array('label' => 'Twitter', 'icon' => 'fa-twitter'),
);
?>
<footer class="footer">
	<div class="container">
		<div class="footer__top">
			<div class="footer__brand">
				<a class="footer__logo" href="<?php echo esc_url(site_url()); ?>">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/idprotect-logo-footer-white.png'); ?>" alt="ID Protect">
				</a>
				<p class="footer__tagline text-body-1">Le bouclier moderne contre l'usurpation d'identité. La technologie entre vos mains, des experts à vos côtés.</p>

				<?php if (have_rows('rs', 'options')) : ?>
					<ul class="footer__social" aria-label="Réseaux sociaux">
						<?php while (have_rows('rs', 'options')) : the_row(); ?>
							<?php foreach ($footer_social_icons as $network => $data) : ?>
								<?php if (get_sub_field($network)) : ?>
									<li class="footer__social-item">
										<a class="footer__social-link" href="<?php the_sub_field($network); ?>" target="_blank" rel="noopener noreferrer">
											<i class="fab <?php echo esc_attr($data['icon']); ?>" aria-hidden="true"></i>
											<span class="visually-hidden"><?php echo esc_html($data['label']); ?> (nouvelle fenêtre)</span>
										</a>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>

			<?php if ($template !== "landing") : ?>
				<?php for ($i = 1; $i <= 3; $i++) : ?>
					<?php if (empty($footer_menu_locations['footer_menu_' . $i])) continue; ?>
					<nav class="footer__column" aria-labelledby="footer-menu-title-<?php echo esc_attr($i); ?>">
						<h2 class="footer__column-title text-label" id="footer-menu-title-<?php echo esc_attr($i); ?>"><?php echo esc_html($footer_columns[$i]); ?></h2>
						<?php wp_nav_menu(array(
							'theme_location' => 'footer_menu_' . $i,
							'container' => false,
							'menu_class' => 'footer__menu',
							'depth' => 1,
							'fallback_cb' => false,
						)); ?>
					</nav>
				<?php endfor; ?>
			<?php endif; ?>
		</div>

		<div class="footer__bottom">
			<p class="footer__copyright">&copy; <?php echo esc_html($footer_year); ?> ID Protect — Tous droits réservés.</p>
			<div class="footer__meta">
				<?php if ($template !== "landing") : ?>
					<nav aria-label="Informations légales">
						<?php wp_nav_menu(array(
							'theme_location' => 'submenu',
							'container' => false,
							'menu_class' => 'footer__legal-menu',
							'depth' => 1,
							'fallback_cb' => false,
						)); ?>
					</nav>
				<?php endif; ?>
				<a class="footer__credits" href="https://thatmuch.fr" target="_blank" rel="noopener noreferrer">
					<img src="https://cosmosdesign.thatmuch.fr/assets/logos/svg/THATMUCH_Logo_White.svg" alt="ThatMuch">
					<span class="visually-hidden">(nouvelle fenêtre)</span>
				</a>
			</div>
		</div>
	</div>
</footer>


<?php if (is_front_page()) : ?>
	<div class="modal fade" id="hubspotModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title">Vous souhaitez vous protéger contre l’usurpation d’identité ?
					</h2>
					<button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">X</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Inscrivez vous à notre newsletter</p>
					<div class="hubspot">
						<?php echo do_shortcode('[hubspot type="form" portal="25430769" id="79af16ac-3a9f-47bc-9f71-c8b7050ceac4"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>

<?php wp_footer() ?>

<!-- <script>
	document.addEventListener("DOMContentLoaded", function() {
		// Check if modal has already been shown in this session
		if (!sessionStorage.getItem('modalShown')) {
			setTimeout(function() {
				var myModal = new bootstrap.Modal(document.getElementById('hubspotModal'), {});
				myModal.show();
				// Mark modal as shown in this session
				sessionStorage.setItem('modalShown', 'true');
			}, 10000); // 10000 milliseconds = 10 seconds
		}
	});
</script> -->
</body>

</html>

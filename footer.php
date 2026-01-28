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

<!-- If the page is not the home page display the widget from the sidebar footer-1 -->

</div><!-- #content -->
<?php if (have_rows('rs', 'options') && $template !== "landing") : ?>
	<ul class="footer__rs">
		<?php while (have_rows('rs', 'options')) : the_row(); ?>
			<?php if (get_sub_field('facebook')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('facebook'); ?>" target="_blank" aria-label="Facebook">
						<i class="fab fa-facebook" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('twitter')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('twitter'); ?>" target="_blank" aria-label="Twitter">
						<i class="fab fa-twitter" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('instagram')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('instagram'); ?>" target="_blank" aria-label="Instagram">
						<i class="fab fa-instagram" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('google')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('google'); ?>" target="_blank" aria-label="Google">
						<i class="fab fa-google" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('linkedin')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('linkedin'); ?>" target="_blank" aria-label="Linkedin">
						<i class="fab fa-linkedin" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_sub_field('youtube')) : ?>
				<li class="footer__rs__item">
					<a href="<?php the_sub_field('youtube'); ?>" target="_blank" aria-label="Youtube">
						<i class="fab fa-youtube" aria-hidden="true"></i>
					</a>
				</li>
			<?php endif; ?>
		<?php endwhile; ?>
	</ul>
<?php endif; ?>

</div>
<div class="footer__area">
	<div class="row d-flex justify-content-between">
		<div class="footer__area__menu d-md-flex  justify-content-<?php echo $template !== "landing" ? "between" : "center" ?> align-items-center">
			<img class="footer__area__logo" src="<?= esc_url(get_template_directory_uri() . '/logo-IDPROTECT_footer.png'); ?>" alt="ID Protect logo">
			<?php if ($template !== "landing") : ?>
				<div class="d-md-flex align-center">
					<?php wp_nav_menu(array('theme_location' => 'submenu')); ?>
				</div>
				<div></div>
			<?php endif; ?>
		</div>
	</div>
	<div class="footer__area__bottom d-md-flex justify-content-between">
		<div></div>
		<div>
			<?php $year = date('Y'); ?>
			<p class="text-center"> © <?php echo $year ?> ID PROTECT tout droits réservés</p>
		</div>
		<a class="footer__area__credits" href="https://thatmuch.fr" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/THATMUCH_Logo_White.png" alt="logo that much">
		</a>
	</div>
</div>


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

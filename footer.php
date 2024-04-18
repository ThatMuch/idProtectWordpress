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
?>

<!-- If the page is not the home page display the widget from the sidebar footer-1 -->
<?php if (is_active_sidebar('footer-1')) : ?>
	<?php dynamic_sidebar('footer-1'); ?>
<?php endif; ?>

</div><!-- #content -->

<div class="footer__area">
	<div class="d-flex justify-content-center flex-wrap">
		<a href="<?php echo site_url(); ?>">
			<img src="<?php if ($image[0]) : echo $image[0];
						else : echo get_template_directory_uri() ?>/assets/images/stanlee_logo_texte.png<? endif; ?>" alt="ID Protect" class="footer__area__logo mb-4" />
		</a>
		<!-- afficher le submenu -->
		<?php
		wp_nav_menu(array(
			'theme_location' => 'submenu',
			'menu_id'        => 'menu-submenu',
			'container'      => false,
			'depth'          => 1,
			'menu_class'     => 'footer__area__menu m-auto',
			'walker'         => new Bootstrap_NavWalker(),
			'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
		));
		?>
	</div>

	<div class="footer__area__bottom d-flex justify-content-between">
		<div></div>
		<div>
			<?php $year = date('Y'); ?>
			<p class="text-center"> © <?php echo $year ?> ID PROTECT tout droits réservés</p>
		</div>
		<a class="footer__credits__thatmuch" href="https://thatmuch.fr" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/THATMUCH_Logo_White.png" alt="logo that much">
		</a>
	</div>
</div>

<?php wp_footer() ?>

<script>
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
</script>
</body>

</html>

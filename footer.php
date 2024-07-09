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
	<div class="row d-flex justify-content-between">
		<div class="footer__credits__thatmuch d-flex justify-content-between">
			<img src="<?= esc_url(get_template_directory_uri() . '/logo-IDPROTECT_footer.png'); ?>" alt="">
			<div class="d-flex align-center">
				<a style="color:white" class="footer_items" href="">FAQ</a>
				<a style="color:white" class="footer_items" href="">CGU</a>
				<a style="color:white" class="footer_items" href="">MENTIONS LéGALES</a>
				<a style="color:white" class="footer_items" href="">POLITIQUE DE CONFIDENTIALITé</a>
				<a style="color:white" class="footer_items" href="">CONTACT</a>

			</div>
			<?php $year = date('Y'); ?>
			<div class="d-flex align-items-end">
				<p> © <?php echo $year ?> ID PROTECT tout droits réservés</p>
			</div>
		</div>
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
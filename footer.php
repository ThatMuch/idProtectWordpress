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
<div class="logos__list">
	<?php if (is_active_sidebar('footer-1')) : ?>
		<?php dynamic_sidebar('footer-1'); ?>
	<?php endif; ?>
</div>

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

<div class="modal fade" id="tallyModal" tabindex="-1" role="dialog" aria-labelledby="tallyModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<button type="button" class="close btn btn-close " data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">Fermer x</span>
			</button>
			<div class="modal-body tally">
				<div class="row">
					<div class="col-sm-6">
						<div class="form">
							<iframe data-tally-src="https://tally.so/embed/wLdZKz?alignLeft=1&hideTitle=1&transparentBackground=1&dynamicHeight=1" loading="lazy" width="100%" frameborder="0" marginheight="0" marginwidth="0" title="Quel type de préjudice avez-vous subi ?"></iframe>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="illu">
							<img src="<?php echo get_template_directory_uri() ?>/assets/images/modal_illustration.png" class="img" alt="SOS Usurpation logo">
							<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo_sos.png" class="logo" alt="SOS Usurpation logo">
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<script>
	Tally.loadEmbeds();
</script>
</body>

</html>

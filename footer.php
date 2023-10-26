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
	<div class="row">
		<div class="col-md-3">
			<img src="<?php if ($image[0]) : echo $image[0];
						else : echo get_template_directory_uri() ?>/assets/images/stanlee_logo_texte.png<? endif; ?>" alt="ID Protect" class="footer__area__logo mb-4">

			<p class="footer__area__text"><?php echo get_bloginfo('description'); ?></p>
			<?php if (have_rows('rs', 'options')) : ?>

				<ul class="footer__area__rs">
					<?php while (have_rows('rs', 'options')) : the_row(); ?>
						<?php if (get_sub_field('facebook')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('facebook'); ?>">
									<i class="fab fa-facebook" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('twitter')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('twitter'); ?>">
									<i class="fab fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('instagram')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('instagram'); ?>">
									<i class="fab fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('google')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('google'); ?>">
									<i class="fab fa-google" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('linkedin')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('linkedin'); ?>">
									<i class="fab fa-linkedin" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('youtube')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('youtube'); ?>">
									<i class="fab fa-youtube" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
					<?php endwhile; ?>
				</ul>
				<?php dynamic_sidebar('footer-partenaires'); ?>
			<?php endif; ?>

		</div>
		<?php if (is_active_sidebar('footer-par')) : ?>
			<div class="col-md-3 ps-5 pe-5">
				<?php dynamic_sidebar('footer-par'); ?>
			</div>
		<?php endif; ?>
		<?php if (is_active_sidebar('footer-pro')) : ?>
			<div class="col-md-3 ps-5 pe-5">
				<?php dynamic_sidebar('footer-pro'); ?>
			</div>
		<?php endif; ?>
		<?php if (is_active_sidebar('footer-about')) : ?>
			<div class="col-md-3 ps-5 pe-5">
				<?php dynamic_sidebar('footer-about'); ?>
			</div>
		<?php endif; ?>

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
<?php
$block = find_block_by_name('acf/temoignage', $post->ID);
if ($block) :
	$field_value = $block['attrs']['data']["video_preview_video"]; ?>
	<!-- Modal bootstrap -->
	<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-body">
					<div class="oembed-container">
						<?php echo wp_oembed_get($field_value); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php wp_footer() ?>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		setTimeout(function() {
			var myModal = new bootstrap.Modal(document.getElementById('hubspotModal'), {});
			myModal.show();
		}, 10000); // 10000 milliseconds = 10 seconds
	});
</script>
</body>

</html>
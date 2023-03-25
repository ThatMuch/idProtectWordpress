<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>
<!-- If the page is not the home page display the widget from the sidebar footer-1 -->
	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php dynamic_sidebar( 'footer-1' ); ?>
	<?php endif; ?>

	</div><!-- #content -->

	<div class="footer__area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/logo-white.svg" alt="ID Protect">
                </div>
                <div class="col-lg-6">
                    <div class="footer__menu">

                        <?php
				wp_nav_menu(array(
					'theme_location' => 'submenu', // Defined when registering the menu
					'menu_id'        => 'sub-main',
					'container'      => false,
					'depth'          => 2,
					'menu_class'     => '',
					'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
					'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
				));
				?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="copyright">
                        © 2021 ID PROTECT tout droits réservés
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
	$block = find_block_by_name( 'acf/temoignage', $post->ID );
	if($block) :
		 $field_value = $block['attrs']['data']["video_preview_video"]; ?>
	<!-- Modal bootstrap -->
	<div
	class="modal fade"
	id="videoModal"
	tabindex="-1"
	aria-labelledby="videoModalLabel"
	aria-hidden="true"
	>
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
	<?php endif;?>
    <?php wp_footer() ?>
  </body>
</html>

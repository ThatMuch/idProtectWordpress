<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($related_products) : ?>

	<section class="related toto products">

		<?php
		$heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));

		if ($heading) :
		?>
			<h2><?php echo esc_html($heading); ?></h2>
		<?php endif; ?>

		<?php woocommerce_product_loop_start();
		?>

		<?php foreach ($related_products as $related_product) : ?>

			<?php
			$post_object = get_post($related_product->get_id());

			setup_postdata($GLOBALS['post'] = &$post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

			$product_title = $related_product->get_title();
			$image_id  = $related_product->get_image_id();
			$image_url = wp_get_attachment_image_url($image_id, 'medium');
			$product_price = $related_product->get_price();
			?>
			<div class="row">
				<div class="col-sm-2">
					<img src="<?php echo $image_url ?>" alt="<?php echo $product_title ?>">
				</div>
				<div class="col-sm-10">
					<p><?php echo $product_title ?></p>
					<p><?php echo $product_price ?></p>
				</div>
			</div>
		<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>
<?php
endif;

wp_reset_postdata();

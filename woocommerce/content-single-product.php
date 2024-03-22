<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('product__content', $product); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	//do_action('woocommerce_before_single_product_summary');
	?>
	<?php


	// Retrieve the image ID associated with the product
	$image_id  = $product->get_image_id();

	// Get the image URL using the image ID and specify the image size ('full' in this case)
	$image_url = wp_get_attachment_image_url($image_id, 'full');
	$product_title = $product->get_title();
	$product_description = $product->get_description();
	$product_price = $product->get_price();
	$product_excerpt = $product->get_short_description();
	$product_interval = $product->get_attribute('interval');
	$product_addToCart = $product->add_to_cart_url();
	$product_tabs = apply_filters('woocommerce_product_tabs', array());
	?>
	<div class="row mb-4">
		<div class="col-sm-3">
			<img src="<?php echo $image_url; ?>" class="product__content__img">
		</div>
		<div class="col-sm-9">
			<h1 class="product__content__title">
				<?php echo $product_title ?>
			</h1>
			<p class="product__content__exc">
				<?php echo $product_excerpt ?>

			</p>
			<p class="product__content__price"><?php echo $product->get_price_html(); ?></p>
			<a href="<?php echo $product_addToCart; ?>" class="btn btn__primary">Souscrire</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="product__content__featured">
				<?php if (get_field('featured_image')) : $image = get_field('featured_image'); ?>
					<!-- Full size image -->
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-12">
			<?php if (!empty($product_tabs)) : ?>

				<div class="woocommerce-tabs wc-tabs-wrapper">
					<ul class="tabs wc-tabs" role="tablist">
						<?php foreach ($product_tabs as $key => $product_tab) : ?>
							<li class="<?php echo esc_attr($key); ?>_tab" id="tab-title-<?php echo esc_attr($key); ?>" role="tab" aria-controls="tab-<?php echo esc_attr($key); ?>">
								<a href="#tab-<?php echo esc_attr($key); ?>">
									<?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php foreach ($product_tabs as $key => $product_tab) : ?>
						<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr($key); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr($key); ?>">
							<?php
							if (isset($product_tab['callback'])) {
								call_user_func($product_tab['callback'], $key, $product_tab);
							}
							?>
						</div>
					<?php endforeach; ?>

					<?php do_action('woocommerce_product_after_tabs'); ?>
				</div>

			<?php endif; ?>
		</div>
	</div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>

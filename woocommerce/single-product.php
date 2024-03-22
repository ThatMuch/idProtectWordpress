<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */
// Get the post's categories
$categories = get_the_category();
$category_name = '';

// Check if the post has any categories
if (!empty($categories)) {
	// Get the first category's name (you can change this to adapt to your needs)
	$category_name = strtolower($categories[0]->name);
}
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<div class="page__area <?php echo $category_name ?>">
	<div class="container">

		<div class="row g-3">
			<div class="col-lg-9">
				<?php while (have_posts()) : ?>
					<?php the_post(); ?>
					<?php wc_get_template_part('content', 'single-product'); ?>
				<?php endwhile; ?>
			</div>
			<div class="col-lg-3">
				<?php dynamic_sidebar('sidebar-products'); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer(); ?>

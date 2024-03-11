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

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<div class="page__area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="blog__featured">
					<?php if (get_field('featured_image')) : $image = get_field('featured_image'); ?>
						<!-- Full size image -->
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

					<div class="blog__featured__text">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-3">
			<div class="col-lg-8">
				<?php while (have_posts()) : ?>
					<?php the_post(); ?>

					<?php wc_get_template_part('content', 'single-product'); ?>

				<?php endwhile; // end of the loop.
				?>
			</div>
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>




<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>

<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

<?php

/**
 * Template Name: Application Mobile
 *
 * @package WordPress
 * @subpackage idProtect
 * @since idProtect 3.0
 */

get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>

<div class="page__area page__app">
	<?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>

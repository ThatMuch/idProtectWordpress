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

<div class="page__area">
	<div class="container">
		<?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>

<?php

/**
 * Template Name: Simple Page
 *
 * @package WordPress
 * @subpackage idProtect
 * @since idProtect 3.0
 */

get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>

<div class="page__area page__simple">
	<div class="container">
		<div class="pt-4 pb-4">
			<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>

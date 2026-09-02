<?php

/**
 * Template Name: Landing page
 *
 * @package WordPress
 * @subpackage idProtect
 * @since idProtect 3.0
 */
?>

get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>

<div class="page__area page__landing">
	<?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>

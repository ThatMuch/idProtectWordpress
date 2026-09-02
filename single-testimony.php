<?php

/**
 * Template Name: Témoignages
 *
 * @package WordPress
 * @subpackage idProtect
 * @since idProtect 3.0
 */

get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>

<div class="page__area p-4">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

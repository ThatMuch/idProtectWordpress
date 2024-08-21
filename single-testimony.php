<?php

/**
 * Template Name: Témoignages
 *
 * @package WordPress
 * @subpackage idProtect
 * @since idProtect 3.0
 */

$titleIsHidden = get_field('hide_title');
get_header(); ?>
<div class="page__area">
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

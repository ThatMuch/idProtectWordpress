<?

/**
 * The template for displaying single "outil" posts.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */

get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>

<div class="page__area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php while (have_posts()) : the_post(); ?>
					<div class="article__text">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

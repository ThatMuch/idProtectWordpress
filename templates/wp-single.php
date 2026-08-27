<?

/**
 * The template for displaying all single posts and attachments
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>

<div class="page__area p-4">
	<div class="container">
		<div class="row g-3">
			<div class="col-lg-8">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="article__text">
							<?php the_content(); ?>
						</div>
				<?php endwhile;
				endif; ?>
			</div>
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>

	</div>
</div>
<?php get_footer(); ?>

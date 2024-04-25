<?

/**
 * The template for displaying all single testimonials
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */

// Get the post's categories
$categories = get_the_category();
$category_name = '';

// Check if the post has any categories
if (!empty($categories)) {
	// Get the first category's name (you can change this to adapt to your needs)
	$category_name = strtolower($categories[0]->name);
}
?>

<?php get_header(); ?>

<div class="page__area pt-0">
	<div class="container">
		<h1><?php the_title(); ?></h1>
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

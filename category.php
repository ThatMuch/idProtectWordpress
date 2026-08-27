<?php
$term = get_queried_object();
$category_description = category_description(get_category_by_slug($term->slug));

// Number of posts to exclude
$total_posts = wp_count_posts()->publish; // Total number of published posts
$argsAll = array(
	'post_type' => 'post',
	'posts_per_page' => $total_posts,
	'category_name' => $term->slug,

);
$queryAll = new WP_Query($argsAll);

?>
<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<div class="container content-area page__area blog pt-4">
	<main id="blog">
		<div class="container">
			<div class="row">
				<?php if ($queryAll->have_posts()) : ?>
					<?php while ($queryAll->have_posts()) : $queryAll->the_post(); ?>
						<div class="col-md-3 mb-4">
							<?php get_template_part('templates/wp', 'post'); ?>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>

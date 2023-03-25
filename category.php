<?php
$term = get_queried_object();
$category_description = category_description( get_category_by_slug( $term->slug) );
$args = array(
    'posts_per_page' => 4,
	'category_name' => $term->slug
);

$the_query = new WP_Query($args);
$exclude_posts = 4; // Number of posts to exclude
$total_posts = wp_count_posts()->publish; // Total number of published posts
$argsAll = array(
    'post_type' => 'post',
    'posts_per_page' => $total_posts - $exclude_posts,
	'category_name' => $term->slug,
    'offset' => $exclude_posts
);
$queryAll = new WP_Query( $argsAll );

?>
<?php get_header(); ?>
<div class="container content-area page__area blog">
  <main id="blog">
    <div class="container">
		<div class="row g-3">
			<div class="col-lg-4">
				<div class="blog__left">
					<div class="blog__box">
						<h2><?php single_cat_title(); ?></h2>
						<?php

							echo $category_description;
						?>
					</div>
				</div>
			</div>
				<div class="col-lg-8">
						<div class="blog__list owl-carousel">
							<?php if ( $the_query->have_posts() ) : ?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php get_template_part('templates/wp', 'post'); ?>
								<?php endwhile; ?>
								<?php	wp_reset_postdata(); ?>
							<?php endif; ?>
						</div> <!-- end blog list -->
					</div>
		</div>
<div class="row">
	<?php if ( $queryAll->have_posts() ) : ?>
		<?php while ( $queryAll->have_posts() ) : $queryAll->the_post(); ?>
		<div class="col-md-3">
			<?php get_template_part('templates/wp', 'post'); ?>
		</div>
		<?php endwhile; ?>
		<?php	wp_reset_postdata(); ?>
	<?php endif; ?>
</div>
	</div>
</main>
</div>
<?php get_footer(); ?>

<?php
$term = get_queried_object();
$category_description = category_description(get_category_by_slug($term->slug));

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$argsAll = array(
	'post_type' => 'post',
	'posts_per_page' => 12,
	'category_name' => $term->slug,
	'paged' => $paged,
);
$queryAll = new WP_Query($argsAll);

?>
<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<div class="container content-area page__area blog pt-4 pb-4">
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
			<?php if ($queryAll->max_num_pages > 1) : ?>
				<nav class="pagination" aria-label="Pagination des articles">
					<?php
					echo paginate_links(array(
						'total'     => $queryAll->max_num_pages,
						'current'   => $paged,
						'mid_size'  => 2,
						'prev_text' => '<span aria-hidden="true">‹</span><span class="screen-reader-text">Page précédente</span>',
						'next_text' => '<span aria-hidden="true">›</span><span class="screen-reader-text">Page suivante</span>',
					));
					?>
				</nav>
			<?php endif; ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>

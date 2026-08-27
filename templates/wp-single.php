<?

/**
 * The template for displaying all single posts and attachments
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>

<?php
$current_post_id  = get_queried_object_id();
$categories       = get_the_category($current_post_id);
$current_category = !empty($categories) ? $categories[0] : null;
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>

<div class="page__area p-4">
	<div class="container">
		<?php get_template_part('template-parts/article-meta'); ?>
		<div class="row g-5">
			<div class="col-lg-8">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<figure class="article__image">
							<?php the_post_thumbnail('large'); ?>
						</figure>
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

		<?php if ($current_category) :
			$related_query = new WP_Query(array(
				'post_type'      => 'post',
				'posts_per_page' => 3,
				'category__in'   => array($current_category->term_id),
				'post__not_in'   => array($current_post_id),
				'orderby'        => 'date',
				'order'          => 'DESC',
			));
			if ($related_query->have_posts()) : ?>
				<section class="related-posts" aria-labelledby="related-posts-title">
					<div class="related-posts__header">
						<div>
							<span class="related-posts__eyebrow"><?php echo esc_html($current_category->name); ?></span>
							<h2 id="related-posts-title" class="related-posts__title h1">À lire aussi</h2>
						</div>
						<a href="<?php echo esc_url(get_category_link($current_category->term_id)); ?>" class="btn btn--primary btn--link related-posts__link">
							Tous les articles
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/arrow-right.svg'); ?>" alt="" class="btn__icon">
						</a>
					</div>
					<div class="related-posts__grid">
						<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
							<?php get_template_part('templates/wp', 'post'); ?>
						<?php endwhile; ?>
					</div>
				</section>
		<?php endif;
			wp_reset_postdata();
		endif; ?>
	</div>
</div>
<?php get_footer(); ?>

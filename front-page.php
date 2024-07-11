<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 4,

);
$the_query = new WP_Query($args);
?>

<?php get_header(); ?>
<?php if (has_post_thumbnail()) : ?>
	<section>
		<div class="element teaser">
			<?php the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
		</div>
	</section>
<?php endif ?>

<?php while (have_posts()) : the_post(); ?>

	<?php if (!is_front_page()) : ?> <h1><?php the_title(); ?></h1> <?php endif; ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<div class="container">
	<div class="row g-3">
		<div class="col-lg-4">
			<div class="blog__left">
				<div class="blog__box">
					<h2>Actualités</h2>
					<p>Restez informé et suivez toutes les dernières actualités sur les leaks de données</p>
				</div>
				<a href="<?php echo site_url();  ?>/community-blog/" class="btn btn__orange blue text-uppercase">Tous les articles</a>
			</div> <!-- end blog left -->
		</div>
		<div class="col-lg-8">
			<div class="blog__list owl-carousel">
				<?php if ($the_query->have_posts()) : ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<?php get_template_part('templates/wp', 'post'); ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div> <!-- end blog list -->
		</div> <!-- end col -->
	</div> <!-- end row -->
</div>
<?php get_footer(); ?>

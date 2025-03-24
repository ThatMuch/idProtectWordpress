<?
/* Template Name: Custom Home Page */

/**
 * The template displaying the posts-overview
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 * @wordpress   5.5.1
 */

?>
<!-- A worpdress query to get the last post with the tag "À la une"  -->
<?php
$argsFeatured = array(
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'post_tag',
			'field'    => 'name',
			'terms'    => 'À la une',
		),
	),
);
$the_queryFeatured = new WP_Query($argsFeatured);

$argsParticulier = array(
	'category_name' => 'particulier',
	'posts_per_page' => 4,

);
$the_queryParticulier = new WP_Query($argsParticulier);
$argsPro = array(
	'category_name' => 'professionnel',
	'posts_per_page' => 4,

);
$the_queryPro = new WP_Query($argsPro);

$argsTem = array(
	'category_name' => 'temoignage',
	'posts_per_page' => 4,

);
$the_queryTem = new WP_Query($argsTem);
?>


<?php get_header(); ?>
<div class="container content-area page__area blog">
	<main id="blog">
		<div class="container">
			<!-- Featured post -->
			<?php if ($the_queryFeatured->have_posts()) : ?>
				<?php while ($the_queryFeatured->have_posts()) : $the_queryFeatured->the_post(); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="blog__featured">
								<?php the_post_thumbnail('large', array('class' => 'blog__image')); ?>
								<a href="<?php the_permalink() ?>" class="blog__link"><img src="<?php echo get_template_directory_uri() ?>/assets/images/eye-blue.svg" alt="Lire l'article"></a>
								<div class="blog__featured__text">
									<h4>À la une</h4>
									<h2><?php the_title(); ?></h2>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			<!-- End of featured post -->
			<!-- Particulier -->
			<div class="row g-3">
				<div class="col-lg-4">
					<div class="blog__left">
						<div class="blog__box">
							<h2>Particuliers</h2>
							<!-- Get the description of the category -->
							<?php
							$category_description = category_description(get_category_by_slug('particulier'));
							?>
							<h1 class="blog__box__title"><?php echo $category_description; ?></h1>
						</div>

						<a href="<?php echo site_url();  ?>/category/particulier" class="btn btn__orange blue text-uppercase">Tous les articles</a>
					</div> <!-- end blog left -->
				</div>
				<div class="col-lg-8">
					<div class="blog__list owl-carousel">
						<?php if ($the_queryParticulier->have_posts()) : ?>
							<?php while ($the_queryParticulier->have_posts()) : $the_queryParticulier->the_post(); ?>
								<?php get_template_part('templates/wp', 'post'); ?>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div> <!-- end blog list -->
				</div> <!-- end col -->
			</div> <!-- end row -->
			<!-- End of Particulier -->
			<!-- Pro -->
			<div class="row g-3 mt-4">
				<div class="col-lg-4">
					<div class="blog__left">
						<div class="blog__box dark">
							<h2>Professionnels</h2>
							<?php
							$category_description = category_description(get_category_by_slug('professionnel'));
							?>
							<p><?php echo $category_description; ?></p>
						</div>
						<a href="<?php echo site_url();  ?>/category/professionnel" class="btn btn__orange blue dark text-uppercase">Tous les articles</a>
					</div> <!-- end blog left -->
				</div>
				<div class="col-lg-8">
					<div class="blog__list owl-carousel">
						<?php if ($the_queryPro->have_posts()) : ?>
							<?php while ($the_queryPro->have_posts()) : $the_queryPro->the_post(); ?>
								<?php get_template_part('templates/wp', 'post'); ?>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div> <!-- end blog list -->
				</div> <!-- end col -->
			</div> <!-- end row -->
			<!-- End of Pro -->

			<?php if (have_posts()) {
				while (have_posts()) {
					the_post();
					the_content();
				}
			} ?>


		</div> <!-- end container -->

	</main>
</div>
<?php get_footer(); ?>

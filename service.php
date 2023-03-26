<?php

/**
 * Template Name: Service
 *
 * @package WordPress
 * @subpackage idProtect
 * @since idProtect 1.0
 */
//
$argsParticulier = array(
	'post_type' => 'post',
	'category_name' => 'particulier',
	'posts_per_page' => 4,

);
$the_queryParticulier = new WP_Query($argsParticulier);
$argsPro = array(
	'post_type' => 'post',
	'category_name' => 'professionnel',
	'posts_per_page' => 4,

);
$the_queryPro = new WP_Query($argsPro);

$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
$category_name = $categories[0]->name;
$category_slug = $categories[0]->slug;

$category_description = category_description(get_category_by_slug($category_slug));

get_header(); ?>
<!-- Page Hero Area Start -->
<div class="page__hero__area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page__hero">
					<div class="page__hero__image">
						<?php the_post_thumbnail('large', array()); ?>
					</div>
					<div class="page__hero__text">
						<h3><span class="g-text"><?php the_title(); ?></span></h3>
						<h2><span class="g-text">L'expertise d'ID </span> <br><span class="g-text">Protect pour
							</span> <br><span class="g-text">faire cesser</span></h2>
						<h6>l’usurpation d’identité</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Hero Area End -->
<div class="section__area pt-0 <?php echo $category_slug; ?>">
	<!-- Display content or the page -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
	<?php endwhile;
	endif; ?>
	<!-- Articles -->
	<div class="container">
		<div class="row mt-5 g-3">
			<div class="col-lg-4">
				<div class="blog__left">
					<div class="blog__box">
						<h2><?php echo $category_name; ?></h2>
						<p><?php echo $category_description; ?></p>
					</div>

					<a href="<?php echo site_url();  ?>/category/<?php echo $category_slug; ?>" class="btn btn__orange blue text-uppercase">Tous les articles</a>
				</div> <!-- end blog left -->
			</div>
			<div class="col-lg-8">
				<div class="blog__list owl-carousel">
					<?php if ($category_slug === 'particulier') : ?>
						<?php if ($the_queryParticulier->have_posts()) : ?>
							<?php while ($the_queryParticulier->have_posts()) : $the_queryParticulier->the_post(); ?>
								<?php get_template_part('templates/wp', 'post'); ?>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					<?php else : ?>
						<?php if ($the_queryPro->have_posts()) : ?>
							<?php while ($the_queryPro->have_posts()) : $the_queryPro->the_post(); ?>
								<?php get_template_part('templates/wp', 'post'); ?>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					<?php endif; ?>
				</div> <!-- end blog list -->
			</div> <!-- end col -->
		</div>
	</div>
	<!-- Articles end -->
</div>

<?php get_footer(); ?>
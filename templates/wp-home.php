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

<?php get_template_part('template-parts/hero'); ?>

<div class="content-area page__area blog">
	<main id="blog">
		<?php if (have_posts()) {
			while (have_posts()) {
				the_post();
				the_content();
			}
		} ?>
	</main>
</div>
<?php get_footer(); ?>

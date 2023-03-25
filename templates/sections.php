<?

/**
 * Template for ACF flexible elements
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 *
 *
 */
?>
<?php /* Template Name: Sections */ ?>

<?php get_header(); ?>

<main id="sections">

	<?php if (have_posts()) : while (have_posts()) : the_post() ?>

			<?php stanlee_sections() ?>
	<?php endwhile;
	endif ?>

</main>

<?php get_footer() ?>

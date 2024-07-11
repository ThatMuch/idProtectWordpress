<?

/**
 * Template for formulaire
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 *
 *
 */
?>
<?php /* Template Name: Formulaire */ ?>

<?php get_header(); ?>

<main id="sections" class="tally tally--page">

	<?php if (have_posts()) : while (have_posts()) : the_post() ?>
			<div class="container">
				<div class="row h-100">
					<div class="col-sm-6">
						<div class="form">
							<?php the_content() ?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="illu">
							<img src="<?php echo get_template_directory_uri() ?>/assets/images/modal_illustration.png" class="img" alt="SOS Usurpation logo">
							<a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo_sos.png" alt="SOS Usurpation logo"></a>
						</div>
					</div>
				</div>
			</div>

	<?php endwhile;
	endif ?>

</main>

<?php get_footer() ?>

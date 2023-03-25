<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>

<?php get_header(); ?>

<!-- Page Header Start -->
<div class="page__header__area" style="background-image: linear-gradient(0deg, rgba(23, 28, 96, 0.5), rgba(23, 28, 96, 0.5)), url('<?php the_post_thumbnail_url(); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page__header">
					<h1 class="page__header__title"><?php the_title(); ?></h1>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Header End -->
<div class="page__area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page__text">
					<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

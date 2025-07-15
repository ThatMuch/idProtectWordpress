<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
$titleIsHidden = get_field('hide_title');
?>

<?php get_header(); ?>

<!-- Page Header Start -->
<?php if (has_post_thumbnail($post->ID) && !$titleIsHidden) : ?>
	<div class="page__header__area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page__header" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
						<h1 class="page__header__title"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php elseif (!$titleIsHidden) : ?>
	<div class="page__header__area--noBg <?php echo  $titleIsHidden ? "d-none" : "" ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page__header__title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- Page Header End -->
<div class="page__area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>

			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

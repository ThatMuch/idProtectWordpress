<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
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
	<div class="heroSection">
		<div class="heroSection__content">
			<h1>Protégez votre identité en ligne</h1>
			<p>Si vos données sont présentées au sein de notre réseau, vous en êtes <strong>immédiatement informé</strong>, vous permettant d’agir rapidement pour protéger votre identité.</p>

			<div class="heroSection__card">
				<img class="heroSection__card__icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/FileIdprotect.png" alt="FileIdprotect">
				<h2>600 M de données <br> personnelles ont fuité en 2025</h2>
				<p>Reprenez <span class="accent">
						<span class="corner"></span>
						<span class="corner"></span>
						<span class="corner"></span>
						<span class="corner"></span>
						gratuitement</span> le contrôle de vos données</p>
				<form action="" class="heroSection__card__form">
					<input type="email" placeholder="Votre adresse e-mail" required name="email" autocomplete="email" aria-label="Votre adresse e-mail">
					<button class="btn" type="submit" aria-label="Activer ID Tracker">
						<i class="fa fa-bell"></i>
						Activer ID Tracker
						<i class="fa fa-arrow-right"></i>
					</button>
				</form>
				<p class="small">Utiliser idprotect est soumis au <a href="#">conditions générales d’utilisation</a></p>
			</div>
		</div>
	</div>
	<?php the_content(); ?>

<?php endwhile; ?>
<?php get_footer(); ?>

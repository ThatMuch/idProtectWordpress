<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>

<?php
// Form handling logic for redirection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email'])) {
	$email = sanitize_email($_POST['email']);

	// Encryption configuration (AES-256)
	// TODO: Replace with secure keys stored in environment variables or configuration for production
	$ciphering = "AES-256-CBC";
	$encryption_key = "12345678901234567890123456789012"; // 32 bytes test key
	$encryption_iv = "1234567890123456"; // 16 bytes test IV

	// Encrypt the email
	$encrypted_email = openssl_encrypt($email, $ciphering, $encryption_key, 0, $encryption_iv);

	// Redirect to test URL with encrypted email parameter
	if ($encrypted_email) {
		$test_url = "https://id-protect-v2-preprod-fee0e714ea51.herokuapp.com/fuites-donnees?email=" . urlencode($encrypted_email);
		wp_redirect($test_url);
		exit;
	}
}
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
				<form action="" method="POST" class="heroSection__card__form">
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

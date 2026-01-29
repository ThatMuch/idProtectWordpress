<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email'])) {
	$email = sanitize_email($_POST['email']);

	// 1. Définissez vos secrets (Doivent être IDENTIQUES au .env de React)
	$secret_key_string = "UZOZ728EUII2990EUIU29";
	$secret_iv_string  = "PPAZI823829HHJ282jkj289";

	// 2. Transformation comme dans Node.js (Hashage)
	// SHA256 produit 32 bytes (parfait pour AES-256)
	// MD5 produit 16 bytes (parfait pour l'IV AES)
	// Le paramètre 'true' demande une sortie binaire brute (raw binary)
	$key = hash('sha256', $secret_key_string, true);
	$iv  = hash('md5', $secret_iv_string, true);

	$ciphering = "AES-256-CBC";

	// 3. Encryptage
	$encrypted_email = openssl_encrypt($email, $ciphering, $key, 0, $iv);

	// Redirection
	if ($encrypted_email) {
		// Note: encodez deux fois si nécessaire, mais urlencode suffit souvent
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

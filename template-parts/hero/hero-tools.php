<?php

/**
 * Hero — variante "outils" et "application mobile" (partagée).
 * Champs ACF : hero_title, hero_title_accent, hero_description, hero_stats
 * (2 items), et hero_cta_group (outils) OU hero_eyebrow / hero_app_store_url /
 * hero_google_play_url (application mobile — voir acf-json/group_hero_app).
 * Image : image mise en avant (droite).
 *
 * Sur la variante "outils", le badge n'est pas un champ éditable : c'est la
 * catégorie de l'outil (taxonomie categorie-outil), comme pour les articles.
 * La page "Application mobile" n'ayant pas de taxonomie, elle garde un champ
 * hero_eyebrow libre.
 *
 * @param bool $args['is_app'] true pour la variante "Application mobile"
 *                              (boutons stores au lieu des CTA).
 */

$is_app = $args['is_app'] ?? false;

if ($is_app) {
	$eyebrow = get_field('hero_eyebrow');
} else {
	$terms = get_the_terms(get_the_ID(), 'categorie-outil');
	$eyebrow = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : '';
}

$title       = get_field('hero_title') ?: get_the_title();
$accent      = get_field('hero_title_accent');
$description = get_field('hero_description');
$cta_group   = get_field('hero_cta_group');
$stats       = get_field('hero_stats');
$heading_id  = 'hero-title-' . get_the_ID();
$variant     = $is_app ? 'app' : 'tools';
?>
<section class="hero hero--<?php echo esc_attr($variant); ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>">
	<div class="container">
		<div class="hero__grid">
			<div class="hero__content">
				<?php if ($eyebrow) : ?>
					<span class="tag tag--light hero__badge"><?php echo esc_html($eyebrow); ?></span>
				<?php endif; ?>
				<h1 id="<?php echo esc_attr($heading_id); ?>" class="hero__title">
					<?php echo esc_html($title); ?>
					<?php if ($accent) : ?>
						<span class="hero__title-accent"><?php echo esc_html($accent); ?></span>
					<?php endif; ?>
				</h1>
				<?php if ($description) : ?>
					<p class="hero__description"><?php echo esc_html($description); ?></p>
				<?php endif; ?>

				<?php if ($is_app) : ?>
					<?php idprotect_render_hero_store_buttons(); ?>
				<?php else : ?>
					<?php idprotect_render_hero_cta_group($cta_group); ?>
				<?php endif; ?>

				<?php if ($stats) : ?>
					<dl class="hero__stats">
						<?php foreach ($stats as $stat) : ?>
							<div class="hero__stats__item">
								<dt class="hero__stats__label"><?php echo esc_html($stat['label']); ?></dt>
								<dd class="hero__stats__sublabel"><?php echo esc_html($stat['sublabel']); ?></dd>
							</div>
						<?php endforeach; ?>
					</dl>
				<?php endif; ?>
			</div>
			<?php if (has_post_thumbnail()) : ?>
				<div class="hero__image">
					<?php the_post_thumbnail('large', array('class' => 'hero__image-img', 'alt' => the_title_attribute(array('echo' => false)))); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php

/**
 * Hero — variante "page" générique.
 * Champs ACF (acf-json/group_hero_page) : hero_eyebrow, hero_title,
 * hero_title_accent, hero_description, hero_cta_group.
 * Image : image mise en avant de la page (optionnelle — bascule le layout
 * en 2 colonnes quand elle est renseignée, sinon centré).
 *
 * $post_id vient de get_queried_object_id() plutôt que get_the_ID() : sur la
 * page "Blog" (Réglages > Lecture > Page des articles), get_the_ID() renvoie
 * le premier article de la boucle, pas la page elle-même — voir
 * template-parts/hero.php.
 *
 * Sur les pages de catégorie, aucun groupe ACF ne cible les termes : on
 * n'appelle donc pas get_field() avec l'ID (numérique) du terme, qui serait
 * interprété par ACF comme un ID d'article et pourrait remonter le champ
 * d'un post sans rapport. Le titre vient du nom de la catégorie.
 */

if (is_category()) {
	$term        = get_queried_object();
	$eyebrow     = '';
	$title       = single_cat_title('', false);
	$accent      = '';
	$description = wp_strip_all_tags(category_description($term->term_id));
	$cta_group   = null;
	$has_image   = false;
	$heading_id  = 'hero-title-category-' . $term->term_id;
} else {
	$post_id     = get_queried_object_id();
	$eyebrow     = get_field('hero_eyebrow', $post_id);
	$title       = get_field('hero_title', $post_id) ?: get_the_title($post_id);
	$accent      = get_field('hero_title_accent', $post_id);
	$description = get_field('hero_description', $post_id);
	$cta_group   = get_field('hero_cta_group', $post_id);
	$has_image   = has_post_thumbnail($post_id);
	$heading_id  = 'hero-title-' . $post_id;
}
?>
<section class="hero hero--default<?php echo $has_image ? ' hero--has-image' : ''; ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>">
	<div class="container">
		<div class="hero__grid">
			<div class="hero__content">
				<?php if ($eyebrow) : ?>
					<span class="hero__eyebrow"><?php echo esc_html($eyebrow); ?></span>
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
				<?php idprotect_render_hero_cta_group($cta_group); ?>
			</div>
			<?php if ($has_image) : ?>
				<div class="hero__image">
					<?php echo get_the_post_thumbnail($post_id, 'large', array('class' => 'hero__image-img', 'alt' => $title)); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

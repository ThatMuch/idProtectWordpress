<?php

/**
 * Hero dispatcher — selects and renders the Hero variant automatically based
 * on the current post type / page template. Called once, right after
 * get_header(), by each template that should display an automatic hero.
 *
 * Uses is_singular()/get_queried_object_id() rather than get_post_type()/
 * get_the_ID(): sur la page "Blog" quand elle est définie comme Page des
 * articles (Réglages > Lecture), WordPress met is_page() à false et $post
 * pointe sur le premier article de la boucle — get_post_type()/get_the_ID()
 * y renverraient donc les infos du premier article, pas de la page elle-même.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */

if (is_page_template('page-app.php')) {
	get_template_part('template-parts/hero/hero-tools', null, array('is_app' => true));
} elseif (is_singular('outil')) {
	get_template_part('template-parts/hero/hero-tools', null, array('is_app' => false));
} elseif (is_singular('testimony')) {
	get_template_part('template-parts/hero/hero-testimony');
} elseif (is_singular('post')) {
	get_template_part('template-parts/hero/hero-article');
} elseif (is_category()) {
	get_template_part('template-parts/hero/hero-default');
} elseif ((is_page() || is_home()) && !is_page_template('service.php')) {
	$page_id = get_queried_object_id();

	if ($page_id && !get_field('hide_title', $page_id)) {
		get_template_part('template-parts/hero/hero-default');
	}
}

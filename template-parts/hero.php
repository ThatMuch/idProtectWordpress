<?php

/**
 * Hero dispatcher — selects and renders the Hero variant automatically based
 * on the current post type / page template. Called once, right after
 * get_header(), by each template that should display an automatic hero.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */

if (is_page_template('page-app.php')) {
	get_template_part('template-parts/hero/hero-tools', null, array('is_app' => true));
} elseif (get_post_type() === 'outil') {
	get_template_part('template-parts/hero/hero-tools', null, array('is_app' => false));
} elseif (get_post_type() === 'testimony') {
	get_template_part('template-parts/hero/hero-testimony');
} elseif (get_post_type() === 'post') {
	get_template_part('template-parts/hero/hero-article');
} elseif (is_page() && !is_page_template(array('contact.php', 'service.php'))) {
	if (!get_field('hide_title')) {
		get_template_part('template-parts/hero/hero-default');
	}
}

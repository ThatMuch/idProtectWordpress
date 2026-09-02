<?php

/**
 * Helpers for the article meta/share bar (template-parts/article-meta.php).
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */

/**
 * Estimated reading time (minutes) for a post, based on a 200 words/minute
 * average reading speed.
 */
function idprotect_reading_time($post_id)
{
	$text = trim(wp_strip_all_tags(get_the_content(null, false, $post_id)));
	$word_count = $text === '' ? 0 : count(preg_split('/\s+/u', $text));

	return max(1, (int) ceil($word_count / 200));
}

/**
 * Injects an id on every <h2> rendered by the_content() (posts only) and
 * records the heading list per post, so template-parts/sidebar can build a
 * "Sommaire" of anchor links pointing at the exact same ids.
 * Runs on the `the_content` filter so it fires before the sidebar (called
 * after the main Loop in templates/wp-single.php) reads idprotect_get_toc().
 */
function idprotect_add_heading_ids($content)
{
	if (!is_singular('post') || trim($content) === '') {
		return $content;
	}

	libxml_use_internal_errors(true);
	$dom = new DOMDocument();
	$dom->loadHTML(
		'<?xml encoding="utf-8"?><div id="idprotect-toc-root">' . $content . '</div>',
		LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
	);
	libxml_clear_errors();

	$root = $dom->getElementsByTagName('div')->item(0);
	if (!$root) {
		return $content;
	}

	$headings = array();
	$used_ids = array();

	foreach ($dom->getElementsByTagName('h2') as $node) {
		$text = trim($node->textContent);
		if ($text === '') {
			continue;
		}

		$slug = sanitize_title($text);
		$id   = $slug;
		$i    = 2;
		while (isset($used_ids[$id])) {
			$id = $slug . '-' . $i++;
		}
		$used_ids[$id] = true;

		$node->setAttribute('id', $id);
		$headings[] = array('id' => $id, 'text' => $text);
	}

	global $idprotect_toc;
	$idprotect_toc[get_the_ID()] = $headings;

	$html = '';
	foreach ($root->childNodes as $child) {
		$html .= $dom->saveHTML($child);
	}

	return $html;
}
add_filter('the_content', 'idprotect_add_heading_ids', 20);

/**
 * Heading list collected by idprotect_add_heading_ids() for a given post.
 * Empty until the_content() has actually run for that post in this request.
 */
function idprotect_get_toc($post_id)
{
	global $idprotect_toc;

	return $idprotect_toc[$post_id] ?? array();
}

<?

/**
 * Sidebar de templates/wp-single.php : sommaire de l'article, généré à
 * partir des <h2> du contenu (voir idprotect_add_heading_ids() dans
 * functions/functions-article.php, qui tourne avant cet appel).
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>

<?php $toc = idprotect_get_toc(get_the_ID()); ?>

<?php if (!empty($toc)) : ?>
	<details class="toc" open>
		<summary class="toc__summary">
			<i class="fa-solid fa-list-ul toc__icon" aria-hidden="true"></i>
			<span class="toc__label">Sommaire</span>
		</summary>
		<ol class="toc__list">
			<?php foreach ($toc as $heading) : ?>
				<li class="toc__item">
					<a href="#<?php echo esc_attr($heading['id']); ?>" class="toc__link"><?php echo esc_html($heading['text']); ?></a>
				</li>
			<?php endforeach; ?>
		</ol>
	</details>
<?php endif; ?>

<?php

/**
 * Barre méta + partage — sous le hero, au-dessus du contenu de l'article.
 * Appelée avant la Loop (comme idProtect_ogtags() dans header.php) : sur un
 * gabarit singulier, get_the_ID()/get_the_author() renvoient déjà l'article
 * demandé sans attendre the_post().
 */

$post_id      = get_the_ID();
$permalink    = get_permalink($post_id);
$share_title  = get_the_title($post_id);
$reading_time = idprotect_reading_time($post_id);
?>
<div class="article-meta">
	<div class="article-meta__info">
		<div class="article-meta__item">
			<span class="article-meta__label">Publiée par</span>
			<span class="article-meta__value"><?php echo esc_html(get_the_author()); ?></span>
		</div>
		<div class="article-meta__item">
			<span class="article-meta__label">Mis à jour le</span>
			<span class="article-meta__value"><?php echo esc_html(get_the_modified_date('d/m/Y', $post_id)); ?></span>
		</div>
		<div class="article-meta__item">
			<span class="article-meta__label">Lecture</span>
			<span class="article-meta__value"><?php echo esc_html($reading_time); ?> min.</span>
		</div>
	</div>

	<div class="article-meta__share">
		<button type="button" class="btn btn--primary btn--outlined article-meta__copy" data-copy-url="<?php echo esc_url($permalink); ?>">
			<i class="fa-solid fa-link btn__icon" aria-hidden="true"></i>
			<span class="article-meta__copy-label" aria-live="polite">Copier le lien</span>
		</button>

		<ul class="article-meta__social" role="list">
			<li>
				<a
					class="article-meta__social-link btn btn--primary btn--outlined"
					href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode($permalink); ?>"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="Partager sur Facebook (ouvre dans un nouvel onglet)">
					<i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
				</a>
			</li>
			<li>
				<a
					class="article-meta__social-link btn btn--primary btn--outlined"
					href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode($permalink); ?>"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="Partager sur LinkedIn (ouvre dans un nouvel onglet)">
					<i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
				</a>
			</li>
			<li>
				<a
					class="article-meta__social-link btn btn--primary btn--outlined"
					href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode($permalink); ?>&text=<?php echo rawurlencode($share_title); ?>"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="Partager sur X (ouvre dans un nouvel onglet)">
					<i class="fa-brands fa-twitter" aria-hidden="true"></i>
				</a>
			</li>
			<li>
				<a
					class="article-meta__social-link btn btn--primary btn--outlined"
					href="mailto:?subject=<?php echo rawurlencode($share_title); ?>&body=<?php echo rawurlencode($permalink); ?>"
					aria-label="Partager par e-mail">
					<i class="fa-solid fa-envelope" aria-hidden="true"></i>
				</a>
			</li>
		</ul>
	</div>
</div>

<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];

// Le champ ACF "category" (taxonomy, return_format "object") renvoie un WP_Term
$category_term = ($data["category"] instanceof WP_Term) ? $data["category"] : false;

$argsQuery = array(
	"post_type" => "offer",
	"posts_per_page" => 3,
	'orderby' => 'date',
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'offer_category', // Taxonomy, in my case I need default post categories
			'field'    => 'slug',
			'terms'    => $category_term ? $category_term->slug : '', // Your category slug (I have a category 'interior')
		),
	)
);

$the_query = new WP_Query($argsQuery);

// Vérifier s'il y a des offres avec abonnement
$has_subscription_offers = false;
if ($the_query->have_posts()) {
	// Sauvegarder les posts pour éviter de refaire la requête
	$posts_array = $the_query->posts;

	foreach ($posts_array as $post_item) {
		$abonnement_check = get_field('abonnement', $post_item->ID);
		if ($abonnement_check) {
			$has_subscription_offers = true;
			break;
		}
	}

	// Remettre à zéro les compteurs pour la boucle d'affichage
	$the_query->rewind_posts();
}
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<?php if ($data["title"]) : ?>
			<h2 class="section__title h1"><?php echo $data["title"]; ?> <span class="title text__orange"><?php echo $data["accent"] ?></span></h2>
		<?php endif; ?>

		<?php if ($has_subscription_offers) : ?>
			<!-- Onglets de prix -->
			<div class="pricing-tabs">
				<div class="tabs-navigation">
					<button class="tab-btn active" data-tab="yearly">
						Annuel
						<?php if ($data["savings_percentage"]) : ?>
							<span class="savings-badge">-<?php echo $data["savings_percentage"]; ?>%</span>
						<?php endif; ?>
					</button>
					<button class="tab-btn " data-tab="monthly">Mensuel</button>
				</div>
			</div>
		<?php endif; ?>

		<div class="price__list">
			<?php if ($the_query->have_posts()) : ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post();
					$description = get_field('description', $post->ID);
					$price_monthly = get_field('price_monthly', $post->ID);
					$price_yearly = get_field('price_yearly', $post->ID);
					$price_fixed = get_field('price_fixed', $post->ID);
					$infos = get_field('infos', $post->ID);
					$link_fixed = get_field('link_fixed', $post->ID);
					$link_monthly = get_field('link_monthly', $post->ID);
					$link_yearly = get_field('link_yearly', $post->ID);
					$popular = get_field('populaire', $post->ID);
					$abonnement = get_field('abonnement', $post->ID);
					$content = get_field('content', $post->ID);
					$indice_prix_fixed = get_field('indice_du_prix_fixe', $post->ID);
					$indice_prix_monthly = get_field('indice_du_prix_mensuel', $post->ID);
					$indice_prix_yearly = get_field('indice_du_prix_annuel', $post->ID);
					$option_title = get_field('option_title', $post->ID);
					$option_price = get_field('option_price', $post->ID);
					$option_description = get_field('option_description', $post->ID);
					$card_class = 'price__table' . ($popular ? ' price__table--highlight' : '');
				?>
					<article class="<?php echo $card_class; ?>" data-offer-id="offer-<?php echo $post->ID; ?>">
						<?php if ($popular) : ?>
							<span class="price__ribbon">Le plus demandé</span>
						<?php endif; ?>
						<div class="price__body">
							<div class="price__head">
								<?php if ($category_term) : ?>
									<span class="price__tag">
										<i class="fa-solid fa-bolt" aria-hidden="true"></i>
										<?php echo esc_html($category_term->name); ?>
									</span>
								<?php endif; ?>

								<h3 class="price__name h4"><?php the_title(); ?></h3>

								<?php if ($description) : ?>
									<p class="price__description"><?php echo esc_html($description); ?></p>
								<?php endif; ?>
								<hr>
								<div class="d-flex gap-2 align-items-center justify-content-start price__amount">
									<?php if ($abonnement) : ?>
										<!-- Offre avec abonnement - affichage mensuel/annuel -->
										<div class="pricing-container">
											<span class="price price-monthly" style="display: none;">
												<?php echo $price_monthly ? $price_monthly : "0"; ?> €
											</span>
											<span class="price price-yearly" style="display: block;">
												<?php echo $price_yearly ? $price_yearly : "0"; ?> €
											</span>
										</div>
										<div class="abonnement">
											<span class="period-monthly" style="display: none;"><?php echo $indice_prix_monthly ? $indice_prix_monthly : "/mois"; ?></span>
											<span class="period-yearly"><?php echo $indice_prix_yearly ? $indice_prix_yearly : "/an"; ?></span>
										</div>
									<?php else : ?>
										<!-- Offre sans abonnement - prix unique -->
										<div class="pricing-container">
											<span class="price">
												<?php echo $price_fixed ? $price_fixed : "0"; ?> €
											</span>
										</div>
										<div class="abonnement">
											<span class="period-fixed"><?php echo $indice_prix_fixed ? $indice_prix_fixed : "/ l'intervention"; ?></span>
										</div>
									<?php endif; ?>
								</div>

								<?php if ($infos) : ?>
									<div class="infos"><?php echo $infos; ?></div>
								<?php endif; ?>
								<hr>
							</div>
							<div class="price__content">
								<?php if ($content) : ?>
									<div class="offer-details <?php echo $data["hide_details"] ? 'details-hidden' : ''; ?>" data-details-for="offer-<?php echo $post->ID; ?>">
										<?php echo $content; ?>
									</div>
								<?php endif; ?>
								<?php if ($data["hide_details"]) : ?>
									<button class="btn <?php echo $popular ? 'btn--light' : 'btn--primary'; ?> btn--outlined text-center toggle-details-btn" data-target="offer-<?php echo $post->ID; ?>">
										<span class="btn-text">Voir le détail</span>
									</button>
								<?php endif; ?>
							</div>

							<?php if ($option_title) : ?>
								<label class="price__option">
									<input type="checkbox" class="price__option-checkbox">
									<span class="price__option-box">
										<span class="price__option-header">
											<span class="price__option-title"><?php echo esc_html($option_title); ?></span>
											<?php if ($option_price) : ?>
												<span class="price__option-price">+ <?php echo esc_html($option_price); ?> €</span>
											<?php endif; ?>
										</span>
										<?php if ($option_description) : ?>
											<span class="price__option-description"><?php echo esc_html($option_description); ?></span>
										<?php endif; ?>
									</span>
								</label>
							<?php endif; ?>
						</div>
						<div class="price__footer">
							<?php
							$footer_links = $abonnement
								? array(
									array($link_monthly, 'payment-link-monthly', true),
									array($link_yearly, 'payment-link-yearly', false),
								)
								: array(
									array($link_fixed, '', false),
								);
							foreach ($footer_links as $footer_link) :
								list($link, $extra_class, $hidden) = $footer_link;
								if (!$link) continue;
								$is_blank = ($link['target'] ?? '') === '_blank';
								$btn_variant = $popular ? 'btn--secondary btn--solid' : 'btn--primary btn--outlined';
							?>
								<a
									class="btn <?php echo $btn_variant; ?> payment-link <?php echo $extra_class; ?>"
									<?php echo $hidden ? 'style="display: none;"' : ''; ?>
									href="<?php echo esc_url($link['url']); ?>"
									<?php echo $is_blank ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
									<span><?php echo esc_html($link['title']); ?></span>
									<?php if ($popular) : ?>
										<span class="btn__icon" aria-hidden="true">
											<i class="fa-solid fa-arrow-right" style="color: white;"></i>
										</span>
									<?php endif; ?>
									<?php if ($is_blank) : ?>
										<span class="screen-reader-text"> (ouvre dans un nouvel onglet)</span>
									<?php endif; ?>
								</a>
							<?php endforeach; ?>
						</div>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

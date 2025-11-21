<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];

$argsQuery = array(
	"post_type" => "offer",
	"posts_per_page" => 3,
	'orderby' => 'date',
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'offer_category', // Taxonomy, in my case I need default post categories
			'field'    => 'slug',
			'terms'    => $data["category"], // Your category slug (I have a category 'interior')
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
				<?php $i = 0; ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post();
					$type = get_field('type', $post->ID);
					$price_monthly = get_field('price_monthly', $post->ID);
					$price_yearly = get_field('price_yearly', $post->ID);
					$price_fixed = get_field('price_fixed', $post->ID);
					$infos = get_field('infos', $post->ID);
					$block = get_field('block', $post->ID);
					$link_fixed = get_field('link_fixed', $post->ID);
					$link_monthly = get_field('link_monthly', $post->ID);
					$link_yearly = get_field('link_yearly', $post->ID);
					$popular = get_field('populaire', $post->ID);
					$abonnement = get_field('abonnement', $post->ID);
				?>
					<div class="price__table">
						<div class="price__body">
							<div class="price__head">
								<?php if ($type) : ?>
									<h3 class="type h4"><?php echo $type["label"]; ?></h3>
								<?php endif; ?>
								<?php if ($popular) : ?>
									<div class="popular"><span>Le plus populaire</span> </div>
								<?php endif; ?>

								<div class="d-flex gap-2 align-items-center justify-content-center">
									<?php if (the_post_thumbnail()) : ?>
										<div class="price__image">
											<?php the_post_thumbnail('medium'); ?>
										</div>
									<?php endif; ?>

									<?php if ($abonnement) : ?>
										<!-- Offre avec abonnement - affichage mensuel/annuel -->
										<div class="pricing-container">
											<span class="price price-monthly" style="display: block;">
												<?php echo $price_monthly ? $price_monthly : "0"; ?> €
											</span>
											<span class="price price-yearly" style="display: none;">
												<?php echo $price_yearly ? $price_yearly : "0"; ?> €
											</span>
										</div>
										<div class="abonnement">
											<span class="period-monthly">/mois</span>
											<span class="period-yearly" style="display: none;">/an</span>
										</div>
									<?php else : ?>
										<!-- Offre sans abonnement - prix unique -->
										<span class="price">
											<?php echo $price_fixed ? $price_fixed : "0"; ?> €
										</span>
									<?php endif; ?>
								</div>

								<?php if ($infos) : ?>
									<div class="infos"><?php echo $infos; ?></div>
								<?php endif; ?>
							</div>
							<div class="price__content">
								<?php if ($block) : ?>
									<!-- loop through block -->
									<?php foreach ($block as $item) : ?>
										<div class="mb-4">
											<?php if ($item['title']) : ?>
												<h4 class="mb-3 h5"><?php echo $item['title']; ?></h4>
											<?php endif; ?>
											<?php if ($item['option']) : ?>
												<?php foreach ($item['option'] as $option) : ?>
													<div class="d-flex gap-1 align-items-center mb-2">
														<?php if ($option['text']) : ?>
															<img src="<?php echo get_template_directory_uri() ?>/assets/images/icon_<?php echo $option['active'] ? "check" : "cancel" ?>.svg" alt="Check">
															<span class="text"><?php echo $option['text']; ?></span>
														<?php endif; ?>
													</div>
												<?php endforeach; ?>
											<?php endif; ?>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="price__footer">
							<?php if ($abonnement) : ?>
								<!-- Offre avec abonnement - liens conditionnels -->
								<?php if ($link_monthly) : ?>
									<a class="btn btn__white payment-link payment-link-monthly" href="<?php echo esc_url($link_monthly['url']); ?>" target="<?php echo esc_attr($link_monthly['target']); ?>"><?php echo esc_html($link_monthly['title']); ?>
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="Flèche vers la droite">
									</a>
								<?php endif; ?>
								<?php if ($link_yearly) : ?>
									<a class="btn btn__white payment-link payment-link-yearly" style="display: none;" href="<?php echo esc_url($link_yearly['url']); ?>" target="<?php echo esc_attr($link_yearly['target']); ?>"><?php echo esc_html($link_yearly['title']); ?>
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="Flèche vers la droite">
									</a>
								<?php endif; ?>
							<?php else : ?>
								<!-- Offre sans abonnement - lien fixe -->
								<?php if ($link_fixed) : ?>
									<a class="btn btn__white" href="<?php echo esc_url($link_fixed['url']); ?>" target="<?php echo esc_attr($link_fixed['target']); ?>"><?php echo esc_html($link_fixed['title']); ?>
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="Flèche vers la droite">
									</a>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				<?php $i++;
				endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

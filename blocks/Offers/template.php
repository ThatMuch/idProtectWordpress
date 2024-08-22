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
			'taxonomy' => 'category', // Taxonomy, in my case I need default post categories
			'field'    => 'slug',
			'terms'    => $data["category"], // Your category slug (I have a category 'interior')
		),
	)
);

$the_query = new WP_Query($argsQuery);
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<?php if ($data["title"]) : ?>
			<h1 class="section__title"><?php echo $data["title"]; ?> <span class="title text__orange"><?php echo $data["accent"] ?></span></h1>
		<?php endif; ?>
		<div class="price__list">
			<?php if ($the_query->have_posts()) : ?>
				<?php $i = 0; ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post();
					$type = get_field('type', $post->ID);
					$price = get_field('price', $post->ID);
					$infos = get_field('infos', $post->ID);
					$block = get_field('block', $post->ID);
					$link = get_field('link', $post->ID);
					$popular = get_field('populaire', $post->ID);
					$abonnement = get_field('abonnement', $post->ID);
				?>
					<div class="price__table">
						<div class="price__body">
							<div class="price__head">
								<?php if ($type) : ?>
									<h4 class="type"><?php echo $type["label"]; ?></h4>
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
									<span class="price">
										<?php echo $price ? $price : "0"; ?> €
									</span>
									<?php if ($abonnement) : ?>
										<div class="abonnement"><span>/mois</span> </div>
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
												<h5 class="mb-3"><?php echo $item['title']; ?></h5>
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
							<?php if ($link) : ?>
								<a class="btn btn__white" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?>
									<img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="Flèche vers la droite">
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php $i++;
				endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

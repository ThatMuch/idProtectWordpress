<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];

$the_query = new WP_Query(array(
	'post_type'      => 'testimony',
	'posts_per_page' => 3,
	'orderby'        => 'date',
	'order'          => 'ASC',
));

// get post type
$isTestimony = get_post_type() === 'testimony';
// the post id
$current_post_id = get_the_ID();
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<span class="eyebrow">Témoignages</span>
		<h2 class="testimonial__title h1"><?= $data['title'] ?></h2>
		<div class="list">
			<?php if ($the_query->have_posts()) : ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post();
					$post_id     = get_the_ID();
					$prenom      = get_field('prenom', $post_id);
					$description = get_field('hero_description', $post_id);
				?>
					<article class="testimonial__item<?php echo $isTestimony && $current_post_id === $post_id ? ' disabled' : ''; ?>">
						<div class="testimonial__header">
							<?php the_post_thumbnail('thumbnail', array('class' => 'testimonial__avatar', 'alt' => '')); ?>
							<span class="testimonial__name"><?php echo esc_html($prenom ?: get_the_title()); ?></span>
							<span class="tag tag--error testimonial__badge">Témoignage</span>
						</div>
						<h3 class="testimonial__fraude"><?php the_title(); ?></h3>
						<?php if ($description) : ?>
							<p class="testimonial__consequence"><?php echo esc_html(wp_trim_words($description, 24, '…')); ?></p>
						<?php endif; ?>

						<a
							href="<?php the_permalink(); ?>"
							class="testimonial__link"
							aria-label="<?php echo esc_attr(sprintf("Lire l'histoire de %s", get_the_title())); ?>">
							Lire son histoire
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.svg" alt="" class="testimonial__link-icon">
						</a>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>

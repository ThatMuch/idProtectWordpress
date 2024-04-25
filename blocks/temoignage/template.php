<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];

// get 3 last wordpress posts  of type testimonial
$args = array(
	'post_type' => 'testimonials',
	'posts_per_page' => 3,
	'orderby' => 'date',
	'order' => 'ASC',
);
$the_query = new WP_Query($args);


?>
<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<div class="testimonial__title"><?php echo $data['title']; ?></div>
		<div class="testimonial__list">
			<?php if ($the_query->have_posts()) : ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post();
					$consequence = get_field('consequence', $post->ID);
					$fraude = get_field('fraude', $post->ID);
				?>
					<a href="<?php the_permalink() ?>" class="testimonial__post">
						<h4 class="testimonial__post__title"><?php the_title(); ?></h4>
						<?php the_post_thumbnail('large', array('class' => 'temoignage__image')); ?>
						<div class="temoignage__text">
							<?php if ($consequence) : ?>
								<h3 class="title"><?php echo $consequence ?></h3>
							<?php endif; ?>
							<?php if ($fraude) : ?>
								<p><?php echo $fraude; ?></p>
							<?php endif; ?>
						</div>
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

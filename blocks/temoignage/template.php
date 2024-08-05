<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
$args = array(
	"post_type" => "testimony",
	"posts_per_page" => 3,
	'orderby' => 'date',
	'order' => 'ASC',
);

$the_query = new WP_Query($args);
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<h1><?= $data['title'] ?> <span class="title text__orange"><?= $data['accent'] ?></span> </h1>
		<div class="list">
			<?php if ($the_query->have_posts()) : ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post();
					$consequence = get_field('consequence', $post->ID);
					$fraude = get_field('fraude', $post->ID);
				?>
					<a href="<?php the_permalink() ?>" class="testimonial__item">
						<div class="testimonial__img">
							<?php the_post_thumbnail('large', array('class' => 'testimonial__image')); ?>
						</div>
						<div class="content">
							<?php
							$title = explode(' ', get_the_title());
							unset($title[0]);
							$desc = implode(' ', $title);
							?>
							<h4 class="content__title mb-0"><?php echo explode(' ', get_the_title())[0]; ?></h4>
							<p class="content__desc"><?= $desc ?></p>
						</div>
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 4,

);

$the_query = new WP_Query($args);
?>
<section class="block__blog">
	<div class="container">
		<div class="row g-3">
			<div class="col-lg-4">
				<h1 class="section__title"><span class="text__orange title">Suivez</span> nos dernières actualités</h1>
				<a href="<?php echo site_url();  ?>/community-blog" class="btn btn__primary">Voir tous les articles</a>
			</div>
			<div class="col-lg-8">
				<div class="blog__list owl-carousel">
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<?php get_template_part('templates/wp', 'post'); ?>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div> <!-- end blog list -->
			</div> <!-- end col -->
		</div>
	</div>
</section>

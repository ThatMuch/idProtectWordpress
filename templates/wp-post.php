<div class="blog__item">
	<div class="blog__item__image">
			<?php the_post_thumbnail('medium'); ?>
			<a href="<?php the_permalink()?>" class="blog__link"><img src="<?php echo get_template_directory_uri()?>/assets/images/arrow-right.svg" alt="Lire l'article"></a>
	</div>
	<div class="blog__item__text">
			<?php
		// Get the post's categories
		$categories = get_the_category();

		if ( ! empty( $categories ) ) :
				$category_name = esc_html( $categories[0]->name );
		?>
			<h5><a href="<?php echo site_url();  ?>/category/<?php echo $categories[0]->slug; ?>" >• <?php echo $category_name; ?></a></h5>
		<?php endif; ?>
			<h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
	</div>
</div>

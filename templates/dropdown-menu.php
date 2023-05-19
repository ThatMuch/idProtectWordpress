<?

/**
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 *
 */
$parent_categories = array("particulier", "professionnel");
foreach ($parent_categories as $parent_category) {
	$parent_id = get_cat_ID($parent_category);

	$args = array(
		'child_of' => $parent_id,
		'orderby' => 'slug',
		'order' => 'ASC'
	);

	$subcategories = get_categories($args); ?>
	<li class="menu-item menu-item-has-children nav-item dropdown">
		<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button"><?php echo $parent_category; ?></a>
		<div class="dropdown-menu mega__menu">
			<div class="row">
				<?php
				foreach ($subcategories as $subcategory) {
					$query_args = array(
						'cat' => $subcategory->term_id,
						'post_type' => 'page',
						'post_parent' => 0,
						'posts_per_page' => -1,

					);

					$query = new WP_Query($query_args);
				?>
					<div class="col-lg-4">
						<div class="mega__menu__item">
							<h2><?php
								//get the description of the $subcategory
								echo $subcategory->description; ?></h2>
							<ul>
								<?php
								if ($query->have_posts()) :
									while ($query->have_posts()) : $query->the_post();
								?>
										<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
								<?php
									endwhile;
									wp_reset_postdata();
								endif;
								?>

							</ul>
						</div>
					</div>
					<?php if ($parent_category === "professionnel") : ?>
						<div class="col-lg-4">
							<div class="mega__menu__item">
								<h2>API</h2>
								<ul>
									<li><a href="https://api.prod.idprotect.fr/service/docs/" target="_blank">API</a></li>
								</ul>
							</div>
						</div>
					<?php endif; ?>
				<?php	}; ?>


			</div>
		</div>
	<?php

}
	?>
	</li>
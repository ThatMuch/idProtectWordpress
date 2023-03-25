<?

/**
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 *
 */

$args = array(
	'post_type' => 'page',
	'post_parent' => 0,
	'posts_per_page' => -1,
	'category_name' => 'particulier',
);
$query = new WP_Query($args);
$argsPro = array(
	'post_type' => 'page',
	'post_parent' => 0,
	'posts_per_page' => -1,
	'category_name' => 'professionnel',
);
$queryPro = new WP_Query($argsPro);
?>
<div class="dropdown-menu mega__menu">
	<div class="row">
		<div class="col-lg-4">
			<div class="mega__menu__item">
				<h2>Particulier</h2>
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
		<div class="col-lg-4">
			<div class="mega__menu__item">
				<h2>Professionnel</h2>
				<ul>
					<?php
					if ($queryPro->have_posts()) :
						while ($queryPro->have_posts()) : $queryPro->the_post();
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
		<div class="col-lg-4">
			<div class="mega__menu__item">
				<h2>api</h2>
				<ul>
					<li><a href="#">documentation api</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
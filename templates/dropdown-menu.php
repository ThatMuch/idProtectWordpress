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
	'category_name' => 'victime-usurpation',
);
$query = new WP_Query($args);
$argsPro = array(
	'post_type' => 'page',
	'post_parent' => 0,
	'posts_per_page' => -1,
	'category_name' => 'prevention',
);
$queryPro = new WP_Query($argsPro);
$argsVer = array(
	'post_type' => 'page',
	'post_parent' => 0,
	'posts_per_page' => -1,
	'category_name' => 'verification',
);
$queryVer = new WP_Query($argsVer);
?>

<li class="menu-item menu-item-has-children nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">Services</a>
	<div class="dropdown-menu mega__menu">
		<div class="row">
			<div class="col-lg-4">
				<div class="mega__menu__item">
					<h2>Victime d'usurpation d'identité ?</h2>
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
					<h2>Prévenir l'usurpation d'identité</h2>
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
					<h2>Verification</h2>
					<ul>
						<?php
						if ($queryVer->have_posts()) :
							while ($queryVer->have_posts()) : $queryVer->the_post();
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
		</div>
	</div>
</li>
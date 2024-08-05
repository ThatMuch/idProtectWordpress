<?php

/**
 * Template Name: ContactCustom
 *
 * @package WordPress
 * @subpackage idProtect
 * @since idProtect 1.0
 */
//
get_header(); ?>
<!-- Page Header Start -->
<div class="page__header__area contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page__header">
					<h1 class="page__header__title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Header End -->
<div class="page__area">
	<div class="container">
		<div class="col-xl-11 mx-auto">
			<div class="row g-2">
				<?php if (have_rows('card_contact')) : ?>
					<?php while (have_rows('card_contact')) : the_row(); ?>
						<div class="col-lg-4 order-lg-1">
							<div class="community">
								<div class="community__head mb-20">
									<img src="<?php echo get_template_directory_uri() ?>/assets/images/blasons.svg" alt="">
									<h3><?php the_sub_field('title'); ?></h3>
									<h6 class="my-4"><?php the_sub_field('text'); ?></h6>
									<a href="tel:<?php the_sub_field('phone'); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/phone.svg" alt="Téléphone"></a>
								</div>
								<div class="community__image mt-1">
									<img src="<?php echo get_template_directory_uri() ?>/assets/images/contact-image.jpg" alt="Contact">
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<div class="col-lg-8 order-lg-0">
					<div class="community__form">
						<?php if (get_field("formulaire")) : ?>
							<?php echo do_shortcode(get_field("formulaire")); ?>
						<?php endif; ?>
					</div>
					<?php if (have_rows('card_rs')) : ?>
						<?php while (have_rows('card_rs')) : the_row(); ?>
							<div class="community__info">
								<h2><?php the_sub_field('title'); ?></h2>
								<p><?php the_sub_field('text'); ?></p>
								<?php if (have_rows('rs')) : ?>
									<ul>
										<?php while (have_rows('rs')) : the_row(); ?>
											<li><a href="<?php the_sub_field('url'); ?>" target="_blank">
													<?php the_sub_field('icon'); ?>
												</a></li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

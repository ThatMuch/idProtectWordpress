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

<?php get_template_part('template-parts/hero'); ?>

<div class="page__area pt-4">
	<div class="container">
		<div class="row g-4">
			<div class="col-lg-4 order-lg-1">
				<ul class="contact-info">
					<?php $contact_mail = get_field('contact_mail', 'option'); ?>
					<?php if ($contact_mail) : ?>
						<li class="contact-info__card">
							<span class="contact-info__icon" aria-hidden="true"><i class="fa-solid fa-envelope"></i></span>
							<h2 class="contact-info__title">Par e-mail</h2>
							<a class="contact-info__link" href="mailto:<?php echo esc_attr($contact_mail); ?>"><?php echo esc_html($contact_mail); ?></a>
						</li>
					<?php endif; ?>

					<?php $phone = get_field('phone', 'option'); ?>
					<?php if ($phone) : ?>
						<li class="contact-info__card">
							<span class="contact-info__icon" aria-hidden="true"><i class="fa-solid fa-phone"></i></span>
							<h2 class="contact-info__title">Par téléphone</h2>
							<a class="contact-info__link" href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
							<?php $hours = get_field('hours', 'option'); ?>
							<?php if ($hours) : ?>
								<p class="contact-info__hours"><?php echo esc_html($hours); ?></p>
							<?php endif; ?>
						</li>
					<?php endif; ?>

					<?php
					$social_networks = array(
						'facebook'  => array('label' => 'Facebook', 'icon' => 'fa-facebook-f'),
						'instagram' => array('label' => 'Instagram', 'icon' => 'fa-instagram'),
						'linkedin'  => array('label' => 'Linkedin', 'icon' => 'fa-linkedin-in'),
						'youtube'   => array('label' => 'Youtube', 'icon' => 'fa-youtube'),
					);
					?>
					<?php if (have_rows('rs', 'option')) : ?>
						<?php while (have_rows('rs', 'option')) : the_row(); ?>
							<?php
							$has_social = false;
							foreach ($social_networks as $network => $data) {
								if (get_sub_field($network)) {
									$has_social = true;
									break;
								}
							}
							?>
							<?php if ($has_social) : ?>
								<li class="contact-info__card">
									<span class="contact-info__icon" aria-hidden="true"><i class="fa-solid fa-globe"></i></span>
									<h2 class="contact-info__title">Nous suivre</h2>
									<ul class="contact-info__social">
										<?php foreach ($social_networks as $network => $data) : ?>
											<?php if (get_sub_field($network)) : ?>
												<li>
													<a class="contact-info__social-link" href="<?php the_sub_field($network); ?>" target="_blank" rel="noopener noreferrer">
														<i class="fa-brands <?php echo esc_attr($data['icon']); ?>" aria-hidden="true"></i>
														<span class="screen-reader-text"><?php echo esc_html($data['label']); ?> (nouvelle fenêtre)</span>
													</a>
												</li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</ul>

				<?php $faq_link = get_field('faq_link', 'option'); ?>
				<?php if ($faq_link) : ?>
					<div class="contact-cta">
						<h2 class="contact-cta__title">Une question fréquente ?</h2>
						<p class="contact-cta__text">La réponse est peut-être déjà dans notre FAQ.</p>
						<a class="btn btn--light btn--outlined" href="<?php echo esc_url($faq_link['url']); ?>" target="<?php echo esc_attr($faq_link['target']); ?>">
							<?php echo esc_html($faq_link['title'] ?: 'Consulter la FAQ'); ?>
							<span class="btn__icon"><img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right-white.svg" width="16" height="16" alt="" aria-hidden="true"></span>
							<?php if ($faq_link['target'] === '_blank') : ?>
								<span class="screen-reader-text">(nouvelle fenêtre)</span>
							<?php endif; ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-8 order-lg-0">
				<div class="contact__form">
					<?php if (get_field("formulaire")) : ?>
						<?php echo do_shortcode(get_field("formulaire")); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>

<?php
$title = get_field('title') ?: 'Default title';
$subtitle = get_field('subtitle') ?: 'Default subtitle';
$image = get_field('image');
$description = get_field('description');
?>
<div class="hero__area">
	<div class="container">
		<div class="row hero__area__row">
			<div class="col-lg-7 h-100">
				<div class="hero__text">
					<?php echo $title; ?>
					<div class="hero__box">
						<h2><?php echo $subtitle; ?></h2>
						<p>ID Protect prévient l’usurpation d’identité grâce à des outils innovants. </p>
						<ul>
							<li>Particuliers, protégez vos documents et facilitez vos démarches en ligne . </li>
							<li>Professionnels, prévenez facilement les cas d’usurpation.</li>
						</ul>
						<?php if (have_rows('cta_group')) : ?>
							<div class="hero__box__button">
								<?php while (have_rows('cta_group')) : the_row();
									$cta_primary = get_sub_field('primary_cta');
									$cta_secondary = get_sub_field('secondary_cta');
								?>
									<a href="<?php echo esc_url($cta_primary['url']); ?>" target="<?php echo esc_attr($cta_primary['target']); ?>"><span><?php echo esc_html($cta_primary['title']); ?></span><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-1.svg" alt="Particulier"></a>
									<a href="<?php echo esc_url($cta_secondary['url']); ?>" target="<?php echo esc_attr($cta_secondary['target']); ?>"><span><?php echo esc_html($cta_secondary['title']); ?></span><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-2.svg" alt="Professionnel"></a>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-5 d-flex h-100">
				<?php if ($image) : ?>
					<div class="hero__image mt-auto mb-auto">
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php
$title = get_field('title');
$subtitle = get_field('subtitle');
$image = get_field('image');
$description = get_field('description');
?>
<div class="hero__area toto ooo">
	<div class="container">
		<div class="row hero__area__row">
			<div class="col-lg-7 h-100">
				<div class="hero__text">
					<?php echo $title; ?>
					<div class="hero__box">
						<?php if ($subtitle) : ?><h2><?php echo $subtitle; ?></h2> <?php endif; ?>
						<div class="hero__box__desc"><?php echo $description; ?></div>
						<?php if (have_rows('cta_group')) : ?>
							<div class="hero__box__button">
								<?php while (have_rows('cta_group')) : the_row();
									$cta_primary = get_sub_field('primary_cta');
									$cta_secondary = get_sub_field('secondary_cta');
								?>
									<?php if ($cta_primary) : ?> <a class="btn btn__primary" href="<?php echo esc_url($cta_primary['url']); ?>"><span><?php echo esc_html($cta_primary['title']); ?></span></a> <?php endif; ?>
									<?php if ($cta_secondary) : ?> <a class="btn btn__orange blue text-uppercase" href="<?php echo esc_url($cta_secondary['url']); ?>"><span><?php echo esc_html($cta_secondary['title']); ?></span></a> <?php endif; ?>
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

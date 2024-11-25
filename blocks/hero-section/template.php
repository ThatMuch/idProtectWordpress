<?php
$title = get_field('title');
$accent = get_field('title_accent');
$subtitle = get_field('subtitle');
$image = get_field('image');
$description = get_field('description');
$isReverse = get_field('reverse');
$isFirst = get_field('is_first');
?>

<section class="hero__area mb-50">
	<div class="container">
		<div class="row align-items-center <?php echo $isReverse ? "flex-row-reverse" : "" ?>">
			<div class="col-lg-7 h-100">
				<div class="hero__text">
					<?php if ($isFirst) : ?>
						<h1 class="section__title h1"><?= $title; ?> <span class="title text-orange"><?= $accent ?></span></h1>
					<?php else : ?>
						<h2 class="section__title h1"><?= $title; ?> <span class="title text-orange"><?= $accent ?></span></h2>
					<?php endif; ?>
				</div>
				<div class="hero__box">
					<?php if ($subtitle) : ?>
						<?php if ($isFirst) : ?>
							<h2 class="h2"><?php echo $subtitle; ?></h2>
						<?php else : ?>
							<h3 class="h2"><?php echo $subtitle; ?></h3>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ($description) : ?><p><?php echo $description; ?></p><?php endif; ?>
					<?php if (have_rows('cta_group')) : ?>
						<div class="hero__box__button">
							<?php while (have_rows('cta_group')) : the_row();
								$cta_primary = get_sub_field('primary_cta');
								$cta_secondary = get_sub_field('secondary_cta');
							?>
								<?php if ($cta_primary) : ?>
									<a class="btn btn__primary" href="<?php echo esc_url($cta_primary['url']); ?>"><span><?php echo esc_html($cta_primary['title']); ?></span></a>
								<?php endif; ?>
								<?php if ($cta_secondary) : ?>
									<a class="btn btn__secondary" href="<?php echo esc_url($cta_secondary['url']); ?>"><span><?php echo esc_html($cta_secondary['title']); ?></span></a>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
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
</section>

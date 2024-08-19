<?php
$title = get_field('title');
$accent = get_field('accent');
$subtitle = get_field('subtitle');
$video = get_field('video');
$description = get_field('description');
$buttons = get_field('cta_group');
$isReverse = get_field('reverse');
?>
<section class="hero__area mb-50">
	<div class="container">
		<h1 class="section__title"><?= $title; ?> <span class="title text-orange"><?= $accent ?></span></h1>
		<div class="row <?php echo $isReverse ? "flex-row-reverse" : "" ?>">
			<div class="col-lg-5 h-100">
				<div class="hero__text">
					<div>
						<?php if ($subtitle) : ?><h2><?php echo $subtitle; ?></h2><?php endif; ?>
						<?php if ($description) : ?><p><?php echo $description; ?></p><?php endif; ?>
						<?php if (have_rows('cta_group')) : ?>
							<div class="hero__box__button">
								<?php while (have_rows('cta_group')) : the_row();
									$cta_primary = get_sub_field('cta_primary');
									$cta_secondary = get_sub_field('cta_secondary');
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
			</div>
			<div class="col-lg-7 d-flex h-100">
				<?php if ($video) : ?>
					<div class="hero__video mt-auto mb-auto w-100">
						<?= $video; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<script>
	if (!document.querySelector(".rll-youtube-player")) {
		// add the class "responsive" to the hero__video element
		document.querySelector(".hero__video").classList.add("responsive");
	}
	console.log("video")
</script>

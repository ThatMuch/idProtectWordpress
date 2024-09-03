<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<h1 class="section__title"><span class="text__orange title"><?= $data["accent"] ?></span> <br> <?= $data['title'] ?></h1>
		<div class="row mb-4">
			<?php foreach ($data['cards'] as $card) : ?>
				<?php //var_dump($card)
				?>
				<div class="col-md-4">
					<h2 class="card__item__title h4"><?php echo $card['title']; ?></h2>
					<div class="card__item">
						<?php foreach ($card['items'] as $item) :  ?>
							<div class="card__content">
								<img src="<?php echo $item['icon']['url']; ?>" class="card__content__icon" alt="<?php echo $item['icon']['alt']; ?>">
								<h3 class="card__content__title h5"><?php echo $item['title']; ?></h3>
								<p class="card__content__text"><?php echo $item['text']; ?></p>
							</div>
						<?php endforeach; ?>
					</div>

				</div>
			<?php endforeach; ?>
		</div>
		<?php if ($data['cta']) : ?>
			<div class="cta d-flex justify-content-center">
				<a href="<?php echo $data['cta']['url']; ?>" class="btn btn__primary"><?php echo $data['cta']['title']; ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>

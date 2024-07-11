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
<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
	<div class="container">
		<div class="<?php echo $class_name; ?>__title"><?php echo $data['title'] ?></div>
		<div class="row">
			<?php foreach ($data['cards'] as $card) : ?>
				<?php //var_dump($card)
				?>
				<div class="col-md-4">
					<h4 class="card__item__title"><?php echo $card['title']; ?></h4>
					<div class="card__item">
						<?php foreach ($card['items'] as $item) :  ?>
							<div class="card__content">
								<img src="<?php echo $item['icon']['url']; ?>" class="card__content__icon" alt="<?php echo $item['icon']['alt']; ?>">
								<h5 class="card__content__title"><?php echo $item['title']; ?></h5>
								<p class="card__content__text"><?php echo $item['text']; ?></p>
							</div>
						<?php endforeach; ?>
					</div>

				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

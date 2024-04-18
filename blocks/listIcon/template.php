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

<div id="<?php echo $block_id; ?>" class="<?php echo $class_name;
											echo $data['orientation'] === "horizontal" ? " horizontal" : " vertical" ?>">
	<div class="container">
		<div class="row">
			<div class="<?php echo $data['orientation'] === "horizontal" ? "col-md-6" : "col-md-12" ?>">
				<div><?php echo $data['title']; ?></div>
				<div class="block-list-icon__desc"><?php echo $data['description'] ?></div>
			</div>
			<div class="<?php echo $data['orientation'] === "horizontal" ? "col-md-6" : "col-md-12" ?>">
				<div class="block-list-icon__content">
					<?php foreach ($data['items'] as $item) : ?>
						<div class="d-flex">
							<?php $icon = $item['icon']; ?>
							<?php if (!empty($icon)) : ?>
								<div class="block-list-icon__content__icon">
									<img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
								</div>
							<?php endif; ?>
							<div>
								<h3 class="ps-3"><?php echo $item['title']; ?></h3>
								<div><?php echo $item['text']; ?></div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

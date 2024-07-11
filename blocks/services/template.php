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
		<div class="row mb-3">
			<div class="col-md-6">
				<div class="text-uppercase"><?php echo $data['title']; ?></div>
			</div>
			<div class="col-md-6">
				<?php $image = $data['image'];  ?>
				<?php if ($image) : ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php $image["alt"]; ?>">
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if ($data['services']) : ?>
					<div class="list">
						<?php foreach ($data['services'] as $service) : ?>
							<div class="service">
								<?php $icon = $service['icon'] ?>
								<?php if ($icon) : ?>
									<img src="<?php echo $icon['url']; ?>" alt="<?php $icon["alt"]; ?>">
								<?php endif; ?>
								<h3 class="service__title"><?php echo $service['title']; ?></h3>
								<div><?php echo $service['text']; ?></div>
								<?php $link = $service['link'] ?>
								<?php if ($link) : ?>
									<a href="<?php echo $link['url']; ?>" class="btn btn-link" target="_blank"><?php echo $link['title']; ?></a>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

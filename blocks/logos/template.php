<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];

$size = 'medium'; // (thumbnail, medium, large, full or custom size)
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
			<h4 class="title"><span class="g-text"> <?php echo $data['title']; ?></span></h4>
				<?php if( $data['gallery'] ): ?>
				<ul>
					<?php foreach( $data['gallery'] as $image ): ?>
						<li>
							<img
							src="<?php echo esc_url($image['sizes']['medium']); ?>"
							alt="<?php echo esc_attr($image['alt']); ?>" />
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>



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
<div class="row">
	<div class="col-md-12">
		<div class="card__title">
			<h2 class="title"><span class="g-text">Intervention</span></h2>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<?php if ( have_rows( 'intervention_card' ) ) : ?>
		<?php while ( have_rows( 'intervention_card' ) ) : the_row(); ?>
			<div class="col-auto">
				<div class="container-intervention">
					<div class="card-group">
						<div class="card custom-card">
								<?php $image = get_sub_field('image');  ?>
								<?php if ( !empty( $image ) ) : ?>
									<img
									src="<?php echo esc_url($image['url']); ?>"
									alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
								<p><?php echo get_sub_field('author'); ?><p>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

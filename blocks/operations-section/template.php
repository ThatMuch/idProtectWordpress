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
		<?php 
        // Get the total number of rows in the 'intervention_card' repeater field
        $total_rows = count(get_field('intervention_card'));
        var_dump($total_rows); // Output the number of rows
        ?>
		<?php while ( have_rows( 'intervention_card' ) ) : the_row(); ?>
			<div class="col-auto">
				<div class="container-intervention">
					<div class="card-group">
						<div class="card custom-card">
							<h2><span class="g-text"><?php echo get_sub_field('author'); ?></span></h2>
							<div class="price__head__right">
								<?php $image = get_sub_field('image');  ?>
								<?php if ( !empty( $image ) ) : ?>
									<img
									src="<?php echo esc_url($image['url']); ?>"
									alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<!-- Display the group field operation_card -->
	<?php if ( have_rows( 'operation_card' ) ) : ?>
		<?php 
        // Get the total number of rows in the 'operation_card' repeater field
        $total_rows = count(get_field('operation_card'));
        var_dump($total_rows); // Output the number of rows
        ?>
		<?php while ( have_rows( 'operation_card' ) ) : the_row(); ?>
			<div class="col-lg-5">
				    <div class="price__table">
                        <div class="price__head">
                            <div class="price__head__left">
                                <h4><?php echo get_sub_field('offer'); ?></h4>
                                <h2><span class="g-text"><?php echo get_sub_field('price'); ?>€</span></h2>
                            </div>
                            <div class="price__head__right">
                                <?php $image = get_sub_field('image');  ?>
								<?php if ( !empty( $image ) ) : ?>
									<img
									src="<?php echo esc_url($image['url']); ?>"
									alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
                            </div>
                        </div>
                        <div class="price__body">
                            <h2><?php echo get_sub_field('title') ;?></h2>
                            <p><?php echo get_sub_field('text'); ?></p>

							<?php if (have_rows('list')): ?>
								<ul>
									<?php while (have_rows('list')) : the_row() ;?>
									<?php
									// Get the 'disabled' field value
									$disabled = get_sub_field( 'desactive' );

									// Check if the 'disabled' checkbox is checked
									$disabled_class = $disabled ? 'disable' : '';

									?>
                                		<li class="<?php echo esc_attr( $disabled_class ); ?>"><?php echo get_sub_field('text') ?></li>
									<?php endwhile; ?>
								</ul>
								<?php endif; ?>
                        </div>
                    </div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

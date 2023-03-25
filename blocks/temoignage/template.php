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
		<div class="row align-items-center">
			<div class="col-lg-7">
				<div class="testimonial">
					<div class="testimonial__right order-md-1">
						<h4 class="title text__orange"><?php echo $data['title']; ?></h4>
							<?php if ( have_rows( 'video_preview' ) ) : ?>
								<?php while ( have_rows( 'video_preview' ) ) : the_row(); ?>
									<?php $image_1 = get_sub_field( 'image_2' ); ?>
									<?php if ( $image_1 ) : ?>
										<img src="<?php echo esc_url( $image_1['url'] ); ?>" alt="<?php echo esc_attr( $image_1['alt'] ); ?>" />
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
					</div>
					<div class="testimonial__left order-md-0">
						<?php if ( have_rows( 'video_preview' ) ) : ?>
							<?php while ( have_rows( 'video_preview' ) ) : the_row(); ?>
								<?php $image_2 = get_sub_field( 'image_1' ); ?>
								<?php if ( $image_2 ) : ?>
									<img src="<?php echo esc_url( $image_2['url'] ); ?>" alt="<?php echo esc_attr( $image_2['alt'] ); ?>" />

								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>
						<button type="button" data-bs-toggle="modal" data-bs-target="#videoModal"><img src="<?php echo get_template_directory_uri()?>/assets/images/arrow-right-white.svg" alt="Flèche vers la droite"></button>

					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="testimonial__details">
					<?php echo $data['subtitle'];?>
					<p><?php echo $data['description'];?></p>
					<a href="#" class="btn btn__orange">voir l'article</a>

				</div>
			</div>
		</div>
	</div>
</div>





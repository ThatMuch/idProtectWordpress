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
<div class="container">
	<div class="row">
<div class="col-lg-8 mx-auto">
	<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
			<?php if ( $data['image'] ) : ?>
			<div class="card__icon">
			<img src="<?php echo esc_url( $data['image']['url'] ); ?>" alt="<?php echo esc_attr( $data['image']['alt'] ); ?>" />
			</div>
			<?php endif; ?>
			<div class="card__text">
				<h3 class="title"><span class="g-text"><?php echo $data['title']; ?></span></h3>
				<div class="card__text__box mh-auto bg_<?php echo $args['bg_color'];?>">
					<h3><?php echo $data['subtitle']; ?></h3>
					<p><?php echo $data['description'];?></p>
					<?php if ( $data['link'] ) : ?>
						<a href="<?php echo esc_url( $data['link']['url'] ); ?>" target="<?php echo esc_attr( $data['link']['target'] ); ?>" class="btn btn__white"><?php echo esc_html( $data['link']['title'] ); ?><img src="<?php echo get_template_directory_uri()?>/assets/images/arrow-right.svg" alt="Flèche vers la droite"></a>
					<?php endif; ?>
				</div>
			</div>
	</div>
</div>
	</div>
</div>



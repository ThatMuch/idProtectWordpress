<?php
$title = get_field( 'title' )?: 'Default title';
$subtitle = get_field( 'subtitle' )?: 'Default subtitle' ;
$image = get_field( 'image' );
$description = get_field( 'description' );
?>
<div class="hero-section">
	<p><?php echo $title; ?></p>
	<p><?php echo $subtitle; ?></p>
	<?php if (have_rows('cta_group')): ?>
		<?php while(have_rows('cta_group')): the_row();
		$cta_primary = get_sub_field('primary_cta');
		$cta_secondary = get_sub_field('secondary_cta');
		?>
			<a href="<?php echo esc_url( $cta_primary['url'] ); ?>" target="<?php echo esc_attr( $cta_primary['target'] ); ?>"><?php echo esc_html( $cta_primary['title'] ); ?></a>
			<a href="<?php echo esc_url( $cta_secondary['url'] ); ?>" target="<?php echo esc_attr( $cta_secondary['target'] ); ?>"><?php echo esc_html( $cta_secondary['title'] ); ?></a>
		<?php endwhile; ?>
	<?php endif; ?>
</div>



<?php
$title = get_field( 'title' )?: 'Default title';
$text = get_field( 'text' )?: 'Default text' ;
$background = get_field( 'background' );
$link = get_field( 'link' );
?>
<div class="block__link" style="background-image: url(<?php echo esc_url( $background['url'] ); ?>) ">
	<p><?php echo $title; ?></p>
	<p><?php echo $text; ?></p>
	<?php if ( $link ) : ?>
	<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
<?php endif; ?>
</div>



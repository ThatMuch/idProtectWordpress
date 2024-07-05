<?php
$author = get_field( 'author' )?: 'Default author';
$image = get_field( 'image' )?: 'Default image';
?>

    <?php
    $args = array(
        'post_type' => 'operation',
        'posts_per_page' => 1,
       
    );
    $operation_query = new WP_Query($args);
    if ($operation_query->have_posts()) :
        $count = 1; // Counter for iteration numbers
        while ($operation_query->have_posts()) : $operation_query->the_post(); ?>
        <div><?= $author ?></div>
        <?php if ($image != 'Default image') : ?>
                <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>">
            <?php else : ?>
                <p><?= $image ?></p>
            <?php endif; ?>
        </div>
            <?php $count++; ?>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p><?php _e('Sorry, no operations found.'); ?></p>
    <?php endif; ?>
</div>

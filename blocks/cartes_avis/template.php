<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
// Arguments pour la requête des témoignages
$args = array(
    'post_type' => 'avis',
);
$testimony_query = new WP_Query($args);
?>


<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
    <div class="container">
        <h1 class="testimony_title mb-4">
            <?php the_field('titre'); ?>
            <span class="title text__orange"><?php the_field('titre_accent'); ?></span>
        </h1>
        <div id="testimony_box" class="d-flex testimony_box grab">
            <?php if ($testimony_query->have_posts()) : ?>
                <?php while ($testimony_query->have_posts()) : $testimony_query->the_post();
                    $note = get_field('note', $post->ID);
                    $content = get_field('commentaire', $post->ID);
                    $username = get_field('username', $post->ID);
                    $sub = get_field('subtitle', $post->ID)
                ?>
                    <div class="card unselectable">
                        <div class="guillemets">
                            <img src="<?= esc_url(get_template_directory_uri() . '/blocks/cartes_avis/assets/guillemets.svg') ?>" alt="guillemets">
                        </div>
                        <div class="d-flex justify-content-between mb-2 text__orange">
                            <div class="stars">
                                <?php
                                for ($i = 0; $i < $note; $i++) { ?>
                                    <img src="<?= esc_url(get_template_directory_uri() . '/blocks/cartes_avis/assets/star.svg') ?>" alt="star">
                                <?php } ?>
                            </div>
                            <div class="digit-14">
                                <span><?= esc_html($note); ?>/5</span>
                            </div>
                        </div>
                        <div class="card_text b3-14_negative mb-4">
                            <p><?= $content ?></p>
                        </div>

                        <p class="mb-2"><?= $username ?></p>
                        <small class="subtitle"><?= $sub ?></small>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e('Aucun témoignage trouvé'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

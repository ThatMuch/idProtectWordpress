<?php
// Arguments pour la requête des témoignages
$args = array(
    'post_type' => 'avis',
);
$testimony_query = new WP_Query($args);
?>

<section name="Témoignage"> 
    <div class="container">
        <h1 class="h1-45 testimony_title margin-h1">
            <?php the_field('titre'); ?>
            <span class="orange_title"><?php the_field('titre_accent'); ?></span>
        </h1>
        <div id="testimony_box" class="d-flex testimony_box grab">
            <?php if ($testimony_query->have_posts()) : ?>
                <?php while ($testimony_query->have_posts()) : $testimony_query->the_post(); ?>
                    <div class="card unselectable">
                        <div class="guillemets">
                            <img src="<?= esc_url(get_template_directory_uri() . '/blocks/cartes_avis/assets/guillemets.svg') ?>" alt="guillemets">
                        </div>
                        <div class="notation">
                            <div class="stars">
                                <?php 
                                $note = get_field('note'); // Récupérer le champ 'note' pour ce post
                                for ($i = 0; $i < $note; $i++) { ?>
                                    <img src="<?= esc_url(get_template_directory_uri() . '/blocks/cartes_avis/assets/star.svg') ?>" alt="star">
                                <?php } ?>
                            </div>
                            <div class="digit-14">
                                <span><?= esc_html($note); ?>/5</span>
                            </div>
                        </div>
                        <div class="card_text b3-14_negative">
                            <p><?= esc_html(get_field('commentaire')); ?></p>
                        </div>
                        <div class="person">
                            <div class="username">
                                <p><?php echo esc_html(get_field('username')); ?></p>
                            </div>
                            <div class="subtitle">
                                <small><?php echo esc_html(get_field('subtitle')); ?></small>
                            </div>
                        </div> 
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e('Aucun témoignage trouvé'); ?></p>
            <?php endif; ?>
        </div>  
    </div>
</section>
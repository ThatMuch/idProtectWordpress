<?php
$titre = get_field('titre');
$accent = get_field('titre_accent');
$note = get_field('note');
$comment = get_field('commentaire');
$user = get_field('username');
$sub = get_field('subtitle');

// Arguments pour la requête des témoignages
$args = array(
    'post_type' => 'testimony',
    'posts_per_page' => -1
);
$testimony_query = new WP_Query($args);
?>



<section name="Témoignage"> 
    <div class="container">
        <h1 class="h1-45 testimony_title margin-h1">
            <?= $titre?>
            <span class="orange_title"><?= $accent?></span>
        </h1>
        <div id="testimony_box" class="d-flex testimony_box grab">
            <?php if ($testimony_query->have_posts()) : ?>
                <?php while ($testimony_query->have_posts()) : $testimony_query->the_post(); ?>
                    <div class="card unselectable">
                        <div class="guillemets">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/guillemets.svg" alt="guillemets">
                        </div>
                        <div class="notation">
                            <div class="stars">
                                <?php 
                                for ($i = 0; $i < $note; $i++) { ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/star.svg" alt="star">
                                <?php } ?>
                            </div>
                            <div class="digit-14">
                                <span><?php echo esc_html($note); ?>/5</span>
                            </div>
                        </div>
                        <div class="card_text b3-14_negative">
                            <p><?= $comment  ?></p>
                        </div>
                        <div class="person">
                            <div class="username">
                                <p><?php echo esc_html($user); ?></p>
                            </div>
                            <div class="subtitle">
                                <small><?php echo esc_html($sub); ?></small>
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
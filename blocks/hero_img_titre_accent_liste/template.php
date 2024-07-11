<?php
$titre = get_field('titre');
$accent = get_field('titre_accent');
$cta = get_field('cta');
$image = get_field('image');
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
    'post_type' => 'liste'
);
$hero_list_query = new WP_Query($args);
?>

<section name="bloc">
    <div class="container">
        <div>
            <div>
                <div class="bloc">
                    <div class="d-flex justify-center img_bloc align-start" style="margin-right:25px">
                        <img width="567px" src="<?= esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                    <div class="d-flex flex-column bloc_content">
                        <div class="bloc_title margin-h1">
                            <h1 class="h1-45"><?= $titre ?> <span class="orange_title" style="margin: 0"><?= $accent ?></span></h1>
                        </div>
                        <div class="bloc_text_btn b2-medium bloc_text">
                            <ul class="unstyled">
                            <?php if ($hero_list_query->have_posts()) : ?>
                                <?php while ($hero_list_query->have_posts()) : $hero_list_query->the_post(); 
                                    $liste = get_field('item', $post->ID);
                                ?>
                                    <div>
                                        <li class="list_item d-flex">
                                            <img height="25px" src="<?= esc_url(get_template_directory_uri() .'/blocks/hero_img_titre_accent_liste/shield.png'); ?>" alt="shield">
                                            <?= $liste ?>
                                        </li>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            </ul>
                            
                            <div>
                                <button class="btn-primary"><?= $cta ?></button>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        
    </div>
</section>
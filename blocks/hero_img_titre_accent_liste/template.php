<?php
$titre = get_field('titre') ?: 'Default title';
$accent = get_field('titre_accent') ?: 'Default accent';
$image = get_field('image');
$description = get_field('description');
$cta = get_field('cta');
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
                                <div>
                                    <li class="list_item">
                                        <img src="<?= esc_url(get_template_directory_uri() .'/blocks/hero_img_titre_accent_liste/shield.png'); ?>" alt="shield">
                                        coucoucou
                                    </li>
                                </div>
                                <div>
                                    <li class="list_item">
                                        <img src="<?= esc_url(get_template_directory_uri() .'/blocks/hero_img_titre_accent_liste/shield.png'); ?>" alt="shield">
                                        coucoucou
                                    </li>
                                </div>
                                <div>
                                    <li class="list_item">
                                        <img src="<?= esc_url(get_template_directory_uri() .'/blocks/hero_img_titre_accent_liste/shield.png'); ?>" alt="shield">
                                        coucoucou
                                    </li>
                                </div>
                                <div>
                                    <li class="list_item">
                                        <img src="<?= esc_url(get_template_directory_uri() .'/blocks/hero_img_titre_accent_liste/shield.png'); ?>" alt="shield">
                                        coucoucou
                                    </li>
                                </div>
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
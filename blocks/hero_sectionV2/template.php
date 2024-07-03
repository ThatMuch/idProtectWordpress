<?php
$title = get_field('titre') ?: 'Default title';
$accent = get_field('titre_accent') ?: 'Default accent';
$image = get_field('image');
$description = get_field('description');
$cta = get_field('cta');
?>


<section name="bloc">
    <div class="container">
        <div>
            <div>
                <div class="bloc-reverse">
                    <div class="d-flex flex-column bloc_content">
                        <div class="bloc_title margin-h1">
                            <h1 class="h1-45"><?= $title?><span class="orange_title"><?= $accent?></span></h1>
                        </div>
                        <div class="bloc_text_btn">
                            <p class="b2-medium bloc_text">
                            <?= $description?>
                            </p>
                            <div>
                                <button class="btn-primary"><?= $cta ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-center img_bloc align-center">
                        <img width="567px" src="<?= esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                </div> 
            </div>
        </div>
        
    </div>
</section>
<?php
    $titre = get_field('titre');
    $accent = get_field('titre_accent');
    $titre_panel1 = get_field('titre_panel_1');
    $titre_panel2 = get_field('titre_panel_2');
    $titre_panel3 = get_field('titre_panel_3');
    $t1p1 = get_field('titre_1_panel_1');
    $b1p1 = get_field('body_1_panel_1');
    $t2p1 = get_field('titre_2_panel_1');
    $b2p1 = get_field('body_2_panel_1');
    $t1p2 = get_field('titre_1_panel_2');
    $b1p2 = get_field('body_1_panel_2');
    $t2p2 = get_field('titre_2_panel_2');
    $b2p2 = get_field('body_2_panel_2');
    $t1p3 = get_field('titre_1_panel_3');
    $b1p3 = get_field('body_1_panel_3');
    $t2p3 = get_field('titre_2_panel_3');
    $b2p3 = get_field('body_2_panel_3');
    $cta = get_field('cta')
?>


<section name="Avantages">
    <div class="container">
        <div>
            <div class="titre_avantages">
                <h1 class="h1-45 title_justify_right margin-h1"><span class="orange_title_reversed"><?= $accent?></span><?= $titre ?></h1>
            </div>
            <div class="avantages">
                <div class="avantages_item">
                    <div>
                        <h2 class="h2-24 avantage_title"><?= $titre_panel1 ?> </h2>
                    </div>
                    <div class="avantage_card">
                        <div class="avantage_content">
                            <div class="policeman item">
                                <div>
                                    <img height="30px" src="<?php echo get_template_directory_uri(); ?>/assets/policeman.png" alt="">
                                </div>
                                <div>
                                    <h3 class="h3-16 avantage_subtitle"><?= $t1p1 ?></h3>
                                </div>
                                <div>
                                    <p class="b3-14 avantage_text"><?= $b1p1 ?></p>
                                </div>
                            </div>
                            <div class="shield item">
                                <div>
                                    <img height="30px" src="<?php echo get_template_directory_uri(); ?>/assets/shield.png" alt="">
                                </div>
                                <div>
                                    <h3 class="h3-16 avantage_subtitle"><?= $t2p1 ?></h3>
                                </div>
                                <div>
                                    <p class="b3-14 avantage_text"><?= $b2p1 ?></p>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="avantages_item">
                    <div>
                        <h2 class="h2-24 avantage_title"><?= $titre_panel2 ?></h2>
                    </div>
                    <div class="avantage_card">
                        <div class="avantage_content">
                            <div class="policeman item">
                                <div>
                                    <img height="30px" src="<?php echo get_template_directory_uri(); ?>/assets/policeman.png" alt="">
                                </div>
                                <div>
                                    <h3 class="h3-16 avantage_subtitle"><?= $t1p2 ?></h3>
                                </div>
                                <div>
                                    <p class="b3-14 avantage_text"><?= $b1p2 ?></p>
                                </div>
                            </div>
                            <div class="shield item">
                                <div>
                                    <img height="30px" src="<?php echo get_template_directory_uri(); ?>/assets/shield.png" alt="">
                                </div>
                                <div>
                                    <h3 class="h3-16 avantage_subtitle"><?= $t2p2 ?></h3>
                                </div>
                                <div>
                                    <p class="b3-14 avantage_text"><?= $b2p2 ?></p>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>  
                <div class="avantages_item">
                    <div>
                        <h2 class="h2-24 avantage_title"><?= $titre_panel3 ?></h2>
                    </div>
                    <div class="avantage_card">
                        <div class="avantage_content">
                            <div class="policeman item">
                                <div>
                                    <img height="30px" src="<?php echo get_template_directory_uri(); ?>/assets/policeman.png" alt="">
                                </div>
                                <div>
                                    <h3 class="h3-16 avantage_subtitle"><?= $t1p3 ?></h3>
                                </div>
                                <div>
                                    <p class="b3-14 avantage_text"><?= $b1p3 ?></p>
                                </div>
                            </div>
                            <div class="shield item">
                                <div>
                                    <img height="30px" src="<?php echo get_template_directory_uri(); ?>/assets/shield.png" alt="">
                                </div>
                                <div>
                                    <h3 class="h3-16 avantage_subtitle"><?= $t2p3 ?></h3>
                                </div>
                                <div>
                                    <p class="b3-14 avantage_text"><?= $b1p3 ?></p>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>            
            </div>
            <div class="d-flex justify-center btn_margin">
                <button class="btn-primary"><?= $cta?></button>
            </div>
        </div>
    </div>

</section>
<?php $title  = get_field("title") ?>
<div class="faq-section">
  <h2 class="title-faq h1-45-faq text-primary">Nos réponses fréquentes</h2>
  <div class="container-faq">
      <div class="title-faq h1-45-faq text-primary">Aux fréquentes</div>
      <span class="card__title-faq-orange title-faq h1-45-faq mb-5">questions</span>
    
  </div>
  <p class="b2-medium-faq text-primary">Questions fréquentes : Tout ce que vous devez savoir sur la protection de votre identité avec ID Protect!</p>
    <?php
    $args = array(
        'post_type' => 'faq',
        'posts_per_page' => 4,
       
    );
    $faq_query = new WP_Query($args);
    if ($faq_query->have_posts()) :
        $count = 1; // Counter for iteration number
        var_dump($count);
        while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
            <div class="faq-item">
              <button class="accordion-faq">
                  <div class="faq-question b2-medium-faq text-primary"><?php the_title() ?></div>
              </button>
              <div class="panel-faq">
                <div class="faq-answer b2-medium-faq text-primary"><?php the_content() ?></div>
              </div>
            </div>
            <h1><?= $title ?></h1>
            <?php $count++; ?>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p><?php _e('Sorry, no FAQs found.'); ?></p>
    <?php endif; ?>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var acc = document.getElementsByClassName("accordion-faq");
    var i;
  
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
  
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  });
</script>


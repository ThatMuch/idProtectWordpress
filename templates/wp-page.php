<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       idProtect_1.0.0
 */
?>

<?php get_header(); ?>
  <?php if (has_post_thumbnail()) : ?>
    <section>
      <div class="element teaser">
        <?php the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
      </div>
    </section>
  <?php endif?>

    <?php while (have_posts()) : the_post(); ?>
      <?php if (!is_front_page()):?> <h1><?php the_title(); ?></h1> <?php endif;?>
        <?php the_content(); ?>
    <?php endwhile; ?>
<?php get_footer(); ?>

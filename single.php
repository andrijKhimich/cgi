<?php get_header();
$banner = get_field('case-poster_image') ?>


<section class="section single-banner" style="background-image: url('<?php echo esc_html($banner['url'])  ?>');">
  <div class="container">
    <?php
    $post_id = get_the_ID();
    $terms = get_the_terms($post_id, 'case_category');
    if ($terms && !is_wp_error($terms)) :
      foreach ($terms as $term) :
        if ($term->taxonomy == 'case_category') : ?>
          <p class="single__category"> <span>*</span> <?php echo esc_html($term->name); ?></p>
    <?php endif;
      endforeach;
    endif; ?>
    <h1><?php the_title() ?></h1>
  </div>
</section>

<section class="section ">

</section>


<?php get_footer(); ?>
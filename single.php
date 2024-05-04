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

<section class="section single-video">
  <div class="video">
    <div class="video-btn js-follower"></div>
    <!-- <div class="video-item video-toggle follow-wrap">
      <iframe data-src="https://vimeo.com/641867798" frameborder="0" webkitallowfullscreen mozallowfullscreen data-ready="true" allow="autoplay; encrypted-media" id="vimeo-player"></iframe>
    </div> -->
  </div>
</section>


<?php get_footer(); ?>
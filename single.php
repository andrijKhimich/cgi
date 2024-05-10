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
    <a href="<?php echo the_field('case-vimeo_video_link') ?>" class="video-item video-toggle follow-wrap">
      <!-- <iframe src="<?php echo the_field('case-vimeo_video_link') ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen data-ready="true" allow="autoplay; encrypted-media" id="vimeo-player"></iframe> -->
      <!-- <iframe src="https://www.youtube.com/embed/3ugXM3ZDUuE?si=kcG7nIP5mY7nqBRr" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
    </a>
    <!-- <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/814690173?h=7a33e39a1f&autoplay=1&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div> -->
    <script src="https://player.vimeo.com/api/player.js"></script>
    <!-- <script src="https://player.vimeo.com/api/player.js"></script> -->
  </div>
</section>


<?php get_footer(); ?>
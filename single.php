<?php get_header();
$banner = get_field('case-poster_image') ?>

<section class="section single-banner" style="background-image: url('<?php the_post_thumbnail_url()  ?>');">
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
    <a href="<?php echo the_field('case-vimeo_video_link') ?>" class="video-item video-toggle follow-wrap">
      <?php if ($banner) : ?>
        <img src="<?php echo esc_html($banner['url'])  ?>" alt="<?php echo esc_html($banner['alt'])  ?>">
      <?php endif; ?>
    </a>
    <div class="video-btn js-follower"></div>
  </div>
</section>
<?php
$images = get_field('case-gallery');
if ($images) : ?>
  <section class="section single-gallery">
    <div class="splide gallery">
      <div class="splide__track">
        <div class="splide__list gallery__list">
          <?php foreach ($images as $image) : ?>
            <a href="<?php echo esc_url($image['url']); ?>" class="splide__slide gallery__item">
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>
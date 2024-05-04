<?php
/*
 * Template name: Who we are page
*/
get_header(); ?>
<section class="section wwa-hero js-scroll slide-top in-view-detect">
  <div class="wwa-hero__row">
    <div class="wwa-hero__col">
      <div class="wwa-hero__title">
        <?php the_field('hero_title'); ?>
      </div>
    </div>
    <div class="wwa-hero__col">
      <div class="wwa-hero__content">
        <?php the_field('hero_content'); ?>
      </div>
      <div class="wwa-hero__text">
        <?php the_field('hero_text'); ?>
      </div>
    </div>
  </div>
</section>
<section class="section about js-scroll slide-top in-view-detect">
  <div class="about__row">
    <div class="about__col">
      <div class="about-text">
        <h3>
          <?php the_field('about_title') ?>
        </h3>
        <p>
          <?php the_field('about_text') ?>
        </p>
      </div>
    </div>
    <?php
    $about_gallery = get_field('about_images');
    if ($about_gallery) : ?>
      <?php foreach ($about_gallery as $image) : ?>
        <div class="about__col">
          <div class="about-image">
            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-parallax />
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>
<section class="section awards">
  <div class="container">
    <div class="awards__title"><?php the_field('awards_title', 'options') ?></div>
    <?php
    $awards_gallery = get_field('awards_gallery', 'option');
    if ($awards_gallery) : ?>
      <ul class="awards-list">
        <?php foreach ($awards_gallery as $image) : ?>
          <li class="awards-list__item js-scroll slide-top in-view-detect">
            <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>

<?php
get_footer(); ?>
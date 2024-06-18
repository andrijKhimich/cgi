<?php

/**
 *
 * Single page for the Rech theme
 *
 * @category   Components
 * @package    WordPress
 * @since      1.0.0
 */

get_header();
$banner = get_field('case-poster_image') ?>

<section class="section single-banner" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
	<div class="container">
		<?php
		$case_id = get_the_ID();
		$terms   = get_the_terms($case_id, 'case_category');
		if ($terms && !is_wp_error($terms)) {
			foreach ($terms as $term_name) {
				if ('case_category' === $term_name->taxonomy) {
		?>
					<p class="single__category"> <span>*</span> <?php echo esc_html($term_name->name); ?></p>
		<?php
				}
			}
		}
		?>
		<h1><?php the_title(); ?></h1>
	</div>
</section>

<section class="section single-video">
	<div class="video">
		<div class="video-item video-toggle follow-wrap">
			<?php
			if ($banner) {
			?>
				<img src="<?php echo esc_attr($banner['url']); ?>" alt="<?php echo esc_attr($banner['alt']); ?>">
			<?php
			}
			?>
			<div class="video-overlay">
				<button class="close">
					<svg height="512px" fill="white" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<path d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z" />
					</svg>
				</button>
				<iframe data-src="<?php echo esc_url(the_field('case-vimeo_video_link')); ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allow="autoplay; encrypted-media" id="vimeo-player"></iframe>
			</div>
		</div>
		<div class="video-btn js-follower js-play-video"></div>
		<div class="video-btn_mob js-play-video"></div>
	</div>
</section>
<?php
$images = get_field('case-gallery');
if ($images) {
?>
	<section class="section single-gallery">
		<div class="splide gallery">
			<div class="splide__track">
				<div class="splide__list gallery__list">
					<?php
					foreach ($images as $image) {
					?>
						<a href="<?php echo esc_url($image['url']); ?>" class="splide__slide gallery__item">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</a>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php get_footer(); ?>
<?php
/**
 * 404page file for the theme.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Rech
 * @since      1.0.0
 */

get_header(); ?>
<section class="section hero">
	<div class="container">
	<div class="error-wrapper">
		<h1 class="title-2">Page not found</h1>
		<?php
		$image = get_field( 'error_image', 'options' );
		if ( ! empty( $image ) ) :
			?>
		<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
		<?php endif; ?>
		<a class="work-card__title title-2" href="<?php echo esc_html( get_home_url() ); ?>">
		<svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M0.999999 15.4407L37.8706 15.4407L24.5759 2.14604L25.514 1.20798L40.41 16.104L25.514 31L24.5759 30.0619L37.8706 16.7673L0.999999 16.7673L0.999999 15.4407Z"></path>
		</svg>
		Go home
		</a>
	</div>

	</div>
</section>
<?php
get_footer(); ?>
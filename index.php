<?php
/**
 * Index file for the Rech theme.
 *
 * @category Page
 * @package  WordPress
 * @author   tag in file commentphpcs
 * @since    1.0.0
 * @license  tag in file commentphpcs
 * @link tag in file commentphp
 */

get_header(); ?>
<section class="section hero text-section">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</section>
<?php
get_footer(); ?>
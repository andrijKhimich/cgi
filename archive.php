<?php
/**
 * Archive page file for the theme.
 *
 * @category   Components
 * @package    WordPress
 * @since      1.0.0
 */

get_header(); ?>

<section class="section works-hero">
	<div class="works-hero__row">
		<div class="works-hero__col">
			<div class="works-hero__title">
				<h1>Work</h1>
			</div>
		</div>
		<div class="works-hero__col">
			<?php
			$tax_name            = 'case_category';
			$terms               = get_terms( $tax_name );
			$current_category_id = get_queried_object_id();
			if ( $terms ) :
				?>
				<ul class="works-hero__list">
					<?php
					foreach ( $terms as $term_name ) :
						$active_class = ( $current_category_id === $term_name->term_id ) ? 'active' : '';
						?>
						<li class="works-hero__item <?php echo esc_attr( $active_class ); ?>">
							<a href="<?php echo esc_url( get_term_link( $term_name ) ); ?>" class="works-hero__link">
								<?php echo esc_html( $term_name->name ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="section case">
	<?php
	if ( $terms ) {
		foreach ( $terms as $term_name ) {
			if ( $term_name->term_id === $current_category_id ) {
				?>
				<div class="case-category">
					<div class="case-category__title title-4 <?php echo esc_attr( ( $current_category_id === $term_name->term_id ) ? 'active' : '' ); ?>">
						<svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M0.999999 15.4407L37.8706 15.4407L24.5759 2.14604L25.514 1.20798L40.41 16.104L25.514 31L24.5759 30.0619L37.8706 16.7673L0.999999 16.7673L0.999999 15.4407Z" />
						</svg>
						<?php echo esc_html( $term_name->name ); ?>
					</div>
					<div class="case-category__row">
						<?php
						$args  = array(
							'post_type'      => 'cases',
							'posts_per_page' => -1,
							'tax_query'      => array(
								array(
									'taxonomy' => $taxonomy,
									'field'    => 'id',
									'terms'    => $current_category_id,
								),
							),
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								$poster = get_field( 'case-poster_image' );
								if ( $poster ) {
									?>
									<a class="case-card" href="<?php the_permalink(); ?>">
										<p class="case-card__title"><?php the_title(); ?></p>
										<img src="<?php echo esc_url( $poster['url'] ); ?>" alt="<?php echo esc_attr( $poster['alt'] ); ?>" data-parallax />
									</a>
									<?php
								}
							}
						} else {
							echo '<li>No posts found.</li>';
						}
						wp_reset_postdata();
						?>
					</div>
				</div>
				<?php
			}
		}
	}
	?>
</section>

<?php
get_footer();
?>
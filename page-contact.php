<?php
/**
 * Main contact page for the Rech theme.
 * Template name: Contact page
 *
 * @category   Components
 * @package    WordPress
 * @since      1.0.0
 */

get_header(); ?>
<section class="section contact-hero js-scroll slide-bottom in-view-detect">
	<div class="contact-hero__row">
		<div class="contact-hero__col">
			<div class="contact-hero__title">
				<?php the_field( 'hero_title' ); ?>
			</div>
		</div>
	</div>
</section>
<?php
if ( have_rows( 'contacts' ) ) {
	?>
	<section class="section contact js-scroll slide-top in-view-detect">
		<div class="contact__row">
			<?php
			while ( have_rows( 'contacts' ) ) {
				the_row();
				?>
				<div class="contact-card">
					<div class="contact-card__title">
						<?php the_sub_field( 'contacts_title' ); ?>
					</div>
					<div class="contact-card__content">
						<?php the_sub_field( 'contacts_content' ); ?>
					</div>
					<div class="contact-card__footer">
						<a href="mailto:<?php the_sub_field( 'contacts_email' ); ?>">Email:
							<?php the_sub_field( 'contacts_email' ); ?>
						</a>
						<div class="contact-card__time">
							<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6.56093 13.3095C9.93857 13.3095 12.7317 10.5163 12.7317 7.1387C12.7317 3.7549 9.93857 0.967896 6.55479 0.967896C3.17715 0.967896 0.390137 3.7549 0.390137 7.1387C0.390137 10.5163 3.18331 13.3095 6.56093 13.3095ZM6.56093 12.5097C3.5832 12.5097 1.18994 10.1103 1.18994 7.1387C1.18994 4.16096 3.5832 1.76155 6.55479 1.76155C9.53252 1.76155 11.9319 4.16096 11.9381 7.1387C11.9381 10.1103 9.53868 12.5097 6.56093 12.5097ZM3.21406 7.74162H6.55479C6.75165 7.74162 6.89931 7.59397 6.89931 7.40324V3.09046C6.89931 2.89972 6.75165 2.75823 6.55479 2.75823C6.37021 2.75823 6.22255 2.89972 6.22255 3.09046V7.07102H3.21406C3.02334 7.07102 2.88183 7.21868 2.88183 7.40324C2.88183 7.59397 3.02334 7.74162 3.21406 7.74162Z" />
							</svg>
							<p id="<?php the_sub_field( 'time' ); ?>"></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
	<?php
}
$image = get_field( 'contact_image' );
if ( ! empty( $image ) ) {
	?>
	<section class="section contact-banner js-scroll slide-top in-view-detect">
		<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</section>
<?php }
get_footer(); ?>
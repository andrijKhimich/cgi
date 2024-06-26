<?php
/**
 * Main Footer file for the Rech theme.
 *
 * @category   Components
 * @package    WordPress
 * @since      1.0.0
 */

?>
<footer class="footer">
	<div class="container">
		<div class="footer-top">
			<div class="footer-top__row">
				<div class="footer-top__col">
					<p class="footer-form__title"><?php the_field( 'footer_form_title', 'options' ); ?></p>
					<div class="footer-form">
						<a href="mailto:<?php the_field( 'form_email', 'options' ); ?>"><?php the_field( 'form_email', 'options' ); ?></a>
					</div>
				</div>
				<div class="footer-top__col">
					<div class="footer-top__nav">
						<div class="footer-box">
							<p class="footer__subtitle"><?php the_field( 'footer_sitemap_title', 'options' ); ?></p>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'Sitemap menu',
									'container'      => null,
									'menu_class'     => 'footer-menu',
								)
							);
							?>
						</div>
						<div class="footer-box">
							<p class="footer__subtitle"><?php the_field( 'footer_what_we_do_title', 'options' ); ?></p>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'What we do menu',
									'container'      => null,
									'menu_class'     => 'footer-menu',
								)
							);
							?>
						</div>
						<div class="footer-box">
							<p class="footer__subtitle"><?php the_field( 'footer_legal_info_title', 'options' ); ?></p>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'Legal menu',
									'container'      => null,
									'menu_class'     => 'footer-menu',
								)
							);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom__row">
				<div class="footer__copyright">
					<?php
					$logo = get_field( 'footer_logo', 'options' );
					if ( ! empty( $logo ) ) :
						?>
						<a href=" <?php echo esc_url( get_site_url( null, '/' ) ); ?>" class="footer__logo">
							<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
						</a> <?php endif; ?> <p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
						<?php the_field( 'footer_copyright', 'options' ); ?></p>
				</div>
				<div class="footer__certificate">
					<?php
					$logo = get_field( 'footer_certificate_logo', 'options' );
					if ( ! empty( $logo ) ) :
						?>
						<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
					<?php endif; ?> <p><?php the_field( 'footer_certificate_text', 'options' ); ?></p>
				</div>
				<?php
				$social = get_field( 'social_list', 'options' );
				if ( $social ) {
					?>
					<ul class="footer-social">
						<?php
						$social_items = $social['social'];
						foreach ( $social_items as $item ) {
							?>
							<li class="footer-social__item">
								<a href="<?php echo esc_html( $item['social_link'] ); ?>" class="footer-social__link" aria-label="social" target="_blank">
									<?php
									$logo = $item['social_icon'];
									if ( ! empty( $logo ) ) {
										?>
										<?php echo file_get_contents( $logo['url'] ); ?>
										<?php
									}
									?>
								</a>
							</li> <?php } ?>
					</ul>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</footer>
</main>
</div>
</div> <?php wp_footer(); ?> </body>

</html>
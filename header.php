<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0 !important;">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="description" content="Rech website.">
	<meta name="theme-color" content="#0B0B0B">
	<meta name="msapplication-TileColor" content="#0B0B0B">
	<meta name="msapplication-navbutton-color" content="#0B0B0B">
	<meta name="apple-mobile-web-app-status-bar-style" content="#0B0B0B">
	<?php wp_head(); ?>
</head>

<body>
	<div <?php body_class(); ?>>
		<div class="preloader js-preloader js-scroll in-view-detect">
			<?php
			$image = get_field('main_logo', 'options');
			if (!empty($image)) : ?>
				<a href=" <?php echo get_site_url(null, '/') ?>" class="logo" aria-label="Rech">
					<?php echo file_get_contents($image['url']); ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="wrapper">
			<header class="header js-header">
				<?php
				$image = get_field('main_logo', 'options');
				if (!empty($image)) : ?>
					<a href=" <?php echo get_site_url(null, '/') ?>" class="logo" aria-label="Rech">
						<?php echo file_get_contents($image['url']); ?>
					</a>
				<?php endif; ?>
				<div class="header__col js-header_col">
					<button class="header__arrow js-arrow" aria-label="header arrow">
						<svg width="20" height="40" viewBox="0 0 20 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0.615234 38.9891L18.377 19.7834L0.615234 1.0108" stroke="#DA7B33" stroke-width="1.44404" />
						</svg>
						<span class="header__arrow-item"></span>
						<span class="header__arrow-item"></span>
						<span class="header__arrow-item"></span>
					</button>
				</div>
				<nav class="nav js-header-nav">
					<?php wp_nav_menu(array(
						'theme_location' => 'Header menu',
						'container' => null,
						'menu_class' => 'nav-list',
					)) ?>
				</nav>
				<?php
				$social = get_field('follow_list', 'options');
				if ($social) : ?>
					<div class="follow js-follow">
						<p class="follow__title"><?php echo $social['socials_follow_title']; ?></p>
						<?php
						if ($social['socials_follow']) : ?>
							<ul class="follow-list">
								<?php
								$social_items = $social['socials_follow'];
								foreach ($social_items as $item) { ?>
									<li class="follow-list__item">
										<a href="<?php echo esc_html($item['socials_follow_link']) ?>" class="follow-list__link" target="_blank">
											<?php echo $item['socials_follow_name'] ?>
										</a>
									</li>
								<?php } ?>
							</ul>
						<?php endif; ?>
					</div>
				<?php
				endif; ?>
			</header>

			<div class="header-social js-header-socials">
				<?php wp_nav_menu(array(
					'theme_location' => 'Header menu',
					'container' => null,
					'menu_class' => 'header-social__subnav',
				));
				$social = get_field('social_list', 'options');
				if ($social) :
					if ($social['social']) : ?>
						<ul class="header-social__list">
							<?php
							$social_items = $social['social'];
							foreach ($social_items as $item) { ?>
								<li class="header-social__item">
									<a href="<?php echo esc_html($item['social_link']) ?>" class="header-social__link" aria-label="social" viewport target="_blank">
										<?php
										$image = $item['social_icon'];
										if (!empty($image)) : ?>
											<?php echo file_get_contents($image['url']); ?>
										<?php endif; ?>
									</a>
								</li>
							<?php } ?>
						</ul>
					<?php endif; ?>
				<?php
				endif; ?>
			</div>

			<main class='main-wrapper js-wrapper'>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/favicon.svg">
	<meta property="og:title" content="Zona | Premium Sparkling Soda" />
	<meta property="og:description" content="🍃Refreshingly crisp. Naturally bold. Discover Zona — a new generation of sparkling soda crafted with real fruit and zero compromise on taste.🍹">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/website/preview-readme-image.webp" />
	<meta property="og:url" content="<?php echo get_permalink(); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image:width" content="1920" />
	<meta property="og:image:height" content="1080" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="header">
		<div class="container">
			<a class="logo" href="<?php echo esc_url( home_url() ); ?>">
					<img class="logo__image" src="<?php the_field('logo_image' , get_settings_page_id()) ; ?>" width="141" height="32" alt="zona's logotupe">
			</a>

			<nav class="nav hidden-mobile">
				<ul class="nav__list">
					<li>
						<a href="<?php echo esc_url( get_field('url_link_text_1' , get_settings_page_id())  ); ?>">
							<?php the_field('link_text_1' , get_settings_page_id()) ; ?>
						</a>
					</li>

					<li>
						<a href="<?php echo esc_url( get_field('url_desc_nav_link_text_2' , get_settings_page_id())  ); ?>">
							<?php the_field('desc_nav_link_text_2' , get_settings_page_id()) ; ?>
						</a>
					</li>

					<li>
						<a href="<?php echo esc_url( get_field('url_desc_nav_link_text_3' , get_settings_page_id())  ); ?>">
							<?php the_field('desc_nav_link_text_3' , get_settings_page_id()) ; ?>
						</a>
					</li>
				</ul>
			</nav>

			<div class="cart-widget">
				<input id="cart-switch" class="cart-widget__switch" type="checkbox">

				<label class="cart-widget__button" for="cart-switch">
					<svg width="40" height="40" aria-hidden="true" focusable="false">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#cart">
						</use>
					</svg>

					<span class="visually-hidden">Open cart, items:</span>

					<span class="cart-widget__count">
						<?php echo WC()->cart->get_cart_contents_count(); ?>
					</span>
				</label>

				<div class="cart-widget__overlay"
					onclick="if (!event.target.closest('.cart-widget__box')) document.getElementById('cart-switch').checked = false;">
					<div class="cart-widget__box" role="dialog" aria-modal="true" aria-labelledby="cart-title">
						<header class="cart-widget__header">
							<span id="cart-title">Your choice</span>

							<button class="cart-widget__close-button" type="button" title="CLose cart"
								onclick="document.getElementById('cart-switch').checked = false;">
								<span class="visually-hidden">Close cart button</span>

								<svg width="40" height="40" aria-hidden="true">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#round-close-icon">
									</use>
								</svg>
							</button>

						</header>

						<div class="cart-widget__body widget_shopping_cart_content">
							<?php woocommerce_mini_cart(); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="mobile-menu visible-mobile">
				<input id="menu-switch" type="checkbox">

				<label class="mobile-menu__burger" for="menu-switch">
					<span></span>
				</label>

				<div class="mobile-menu__wrapper" onclick="document.getElementById('menu-switch').checked = false;">
					<nav class="mobile-menu__box">
						<ul class="nav__list">
							<li>
								<a href="<?php echo esc_url( get_field('url_mobile_menu_link_1' , get_settings_page_id())  ); ?>">
									<?php the_field('mobile_menu_link_1' , get_settings_page_id()) ; ?>
								</a>
							</li>

							<li>
								<a href="<?php echo esc_url( get_field('url_mobile_menu_link_2' , get_settings_page_id())  ); ?>">
									<?php the_field('mobile_menu_link_2' , get_settings_page_id()) ; ?>
								</a>
							</li>

							<li>
								<a href="<?php echo esc_url( get_field('url_mobile_menu_link_3' , get_settings_page_id())  ); ?>">
									<?php the_field('mobile_menu_link_3' , get_settings_page_id()) ; ?>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
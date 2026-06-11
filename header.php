<?php
/**
 * Theme header template.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#0a1f18">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="btd-skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'banglatrack-theme' ); ?></a>

<header class="btd-header" id="btd-header" role="banner">
	<div class="btd-container btd-header__inner">
		<div class="btd-header__brand">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btd-header__logo-text" rel="home">
					<svg class="btd-header__logo-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
						<rect width="32" height="32" rx="8" fill="url(#btd-logo-grad)"/>
						<path d="M8 16L13 21L24 10" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
						<defs><linearGradient id="btd-logo-grad" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#14956b"/><stop offset="1" stop-color="#0f7e57"/></linearGradient></defs>
					</svg>
					<span><?php bloginfo( 'name' ); ?></span>
				</a>
			<?php endif; ?>
		</div>

		<input type="checkbox" id="btd-nav-toggle" class="btd-nav-toggle" aria-hidden="true">
		<label for="btd-nav-toggle" class="btd-nav-toggle-label" aria-label="<?php esc_attr_e( 'Toggle navigation', 'banglatrack-theme' ); ?>">
			<span class="btd-hamburger"></span>
		</label>

		<nav class="btd-header__nav" id="btd-primary-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary', 'banglatrack-theme' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'btd-nav-list',
				'depth'          => 2,
				'fallback_cb'    => function() {
					echo '<ul class="btd-nav-list">';
					echo '<li><a href="' . esc_url( home_url( '/#features' ) ) . '">' . esc_html__( 'Features', 'banglatrack-theme' ) . '</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/#pricing' ) ) . '">' . esc_html__( 'Pricing', 'banglatrack-theme' ) . '</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/#faq' ) ) . '">' . esc_html__( 'FAQ', 'banglatrack-theme' ) . '</a></li>';
					if ( class_exists( 'WooCommerce' ) ) {
						echo '<li><a href="' . esc_url( wc_get_account_endpoint_url( 'dashboard' ) ) . '">' . esc_html__( 'My Account', 'banglatrack-theme' ) . '</a></li>';
					}
					echo '</ul>';
				},
			) );
			?>
			<div class="btd-header__cta">
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btd-btn btd-btn--primary btd-btn--sm"><?php esc_html_e( 'Get Started', 'banglatrack-theme' ); ?></a>
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>" class="btd-btn btd-btn--primary btd-btn--sm"><?php esc_html_e( 'Get Started', 'banglatrack-theme' ); ?></a>
				<?php endif; ?>
			</div>
		</nav>
	</div>
</header>

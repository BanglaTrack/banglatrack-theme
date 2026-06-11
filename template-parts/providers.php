<?php
/**
 * Template part: Courier providers social proof.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="btd-providers" aria-label="<?php esc_attr_e( 'Supported Courier Services', 'banglatrack-theme' ); ?>">
	<div class="btd-container">
		<p class="btd-providers__label"><?php esc_html_e( 'Trusted integration with Bangladesh\'s leading courier services', 'banglatrack-theme' ); ?></p>
		<div class="btd-providers__grid">
			<div class="btd-providers__item">
				<div class="btd-providers__icon btd-providers__icon--steadfast">
					<svg width="40" height="40" viewBox="0 0 40 40" fill="none" aria-hidden="true">
						<rect width="40" height="40" rx="10" fill="#1B8423" fill-opacity="0.1"/>
						<path d="M12 20l4 4 12-12" stroke="#1B8423" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</div>
				<span class="btd-providers__name"><?php esc_html_e( 'Steadfast', 'banglatrack-theme' ); ?></span>
			</div>
			<div class="btd-providers__item">
				<div class="btd-providers__icon btd-providers__icon--pathao">
					<svg width="40" height="40" viewBox="0 0 40 40" fill="none" aria-hidden="true">
						<rect width="40" height="40" rx="10" fill="#148FF0" fill-opacity="0.1"/>
						<path d="M20 10v12l8 4" stroke="#148FF0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
						<circle cx="20" cy="20" r="10" stroke="#148FF0" stroke-width="2" fill="none"/>
					</svg>
				</div>
				<span class="btd-providers__name"><?php esc_html_e( 'Pathao', 'banglatrack-theme' ); ?></span>
			</div>
			<div class="btd-providers__item">
				<div class="btd-providers__icon btd-providers__icon--redx">
					<svg width="40" height="40" viewBox="0 0 40 40" fill="none" aria-hidden="true">
						<rect width="40" height="40" rx="10" fill="#F83423" fill-opacity="0.1"/>
						<path d="M14 14l12 12M26 14L14 26" stroke="#F83423" stroke-width="3" stroke-linecap="round"/>
					</svg>
				</div>
				<span class="btd-providers__name"><?php esc_html_e( 'RedX', 'banglatrack-theme' ); ?></span>
			</div>
		</div>
	</div>
</section>

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
				<div class="btd-providers__icon btd-providers__icon--steadfast" style="background: none; padding: 0;">
					<img src="<?php echo esc_url( BTD_URI . '/assets/logo/steadfast.svg' ); ?>" alt="<?php esc_attr_e( 'Steadfast Logo', 'banglatrack-theme' ); ?>" style="height: 36px; width: auto; display: block;">
				</div>
			</div>
			<div class="btd-providers__item">
				<div class="btd-providers__icon btd-providers__icon--pathao" style="background: none; padding: 0;">
					<img src="<?php echo esc_url( BTD_URI . '/assets/logo/pathao.svg' ); ?>" alt="<?php esc_attr_e( 'Pathao Logo', 'banglatrack-theme' ); ?>" style="height: 36px; width: auto; display: block;">
				</div>
			</div>
			<div class="btd-providers__item">
				<div class="btd-providers__icon btd-providers__icon--redx" style="background: none; padding: 0;">
					<img src="<?php echo esc_url( BTD_URI . '/assets/logo/redx.svg' ); ?>" alt="<?php esc_attr_e( 'RedX Logo', 'banglatrack-theme' ); ?>" style="height: 36px; width: auto; display: block;">
				</div>
			</div>
		</div>
	</div>
</section>

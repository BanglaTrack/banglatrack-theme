<?php
/**
 * Template part: Pricing section.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$plans = array(
	'free' => array(
		'name'        => __( 'Free', 'banglatrack-theme' ),
		'price'       => __( '0', 'banglatrack-theme' ),
		'period'      => __( 'forever', 'banglatrack-theme' ),
		'description' => __( 'Perfect for getting started with a single courier.', 'banglatrack-theme' ),
		'badge'       => '',
		'features'    => array(
			__( '100 bookings/month', 'banglatrack-theme' ),
			__( '1 courier provider', 'banglatrack-theme' ),
			__( '1 website', 'banglatrack-theme' ),
			__( 'Order tracking timeline', 'banglatrack-theme' ),
			__( 'Invoice printing', 'banglatrack-theme' ),
			__( 'COD management', 'banglatrack-theme' ),
		),
		'cta_text'    => __( 'Start Free', 'banglatrack-theme' ),
		'highlight'   => false,
	),
	'starter' => array(
		'name'        => __( 'Starter', 'banglatrack-theme' ),
		'price'       => __( '499', 'banglatrack-theme' ),
		'period'      => __( '/month', 'banglatrack-theme' ),
		'description' => __( 'For growing stores that need more bookings and flexibility.', 'banglatrack-theme' ),
		'badge'       => __( 'Popular', 'banglatrack-theme' ),
		'features'    => array(
			__( '500 bookings/month', 'banglatrack-theme' ),
			__( 'All courier providers', 'banglatrack-theme' ),
			__( '1 website', 'banglatrack-theme' ),
			__( 'Multi-provider switching', 'banglatrack-theme' ),
			__( 'Priority support', 'banglatrack-theme' ),
			__( 'Everything in Free', 'banglatrack-theme' ),
		),
		'cta_text'    => __( 'Get Starter', 'banglatrack-theme' ),
		'highlight'   => true,
	),
	'pro' => array(
		'name'        => __( 'Pro', 'banglatrack-theme' ),
		'price'       => __( '999', 'banglatrack-theme' ),
		'period'      => __( '/month', 'banglatrack-theme' ),
		'description' => __( 'Unlimited power for high-volume merchants.', 'banglatrack-theme' ),
		'badge'       => '',
		'features'    => array(
			__( 'Unlimited bookings', 'banglatrack-theme' ),
			__( 'All courier providers', 'banglatrack-theme' ),
			__( '3 websites', 'banglatrack-theme' ),
			__( 'Multi-provider switching', 'banglatrack-theme' ),
			__( 'Priority support', 'banglatrack-theme' ),
			__( 'Everything in Starter', 'banglatrack-theme' ),
		),
		'cta_text'    => __( 'Get Pro', 'banglatrack-theme' ),
		'highlight'   => false,
	),
);

$shop_url = class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
?>

<section class="btd-pricing" id="pricing">
	<div class="btd-container">
		<div class="btd-section-header">
			<span class="btd-section-badge"><?php esc_html_e( 'Pricing', 'banglatrack-theme' ); ?></span>
			<h2 class="btd-section-title"><?php esc_html_e( 'Simple, transparent pricing', 'banglatrack-theme' ); ?></h2>
			<p class="btd-section-subtitle"><?php esc_html_e( 'Start free and scale as your business grows. No hidden fees, no surprises.', 'banglatrack-theme' ); ?></p>
		</div>
		<div class="btd-pricing__grid">
			<?php foreach ( $plans as $key => $plan ) : ?>
				<article class="btd-pricing-card<?php echo $plan['highlight'] ? ' btd-pricing-card--featured' : ''; ?>">
					<?php if ( $plan['badge'] ) : ?>
						<span class="btd-pricing-card__badge"><?php echo esc_html( $plan['badge'] ); ?></span>
					<?php endif; ?>
					<div class="btd-pricing-card__header">
						<h3 class="btd-pricing-card__name"><?php echo esc_html( $plan['name'] ); ?></h3>
						<div class="btd-pricing-card__price">
							<span class="btd-pricing-card__currency">৳</span>
							<span class="btd-pricing-card__amount"><?php echo esc_html( $plan['price'] ); ?></span>
							<span class="btd-pricing-card__period"><?php echo esc_html( $plan['period'] ); ?></span>
						</div>
						<p class="btd-pricing-card__desc"><?php echo esc_html( $plan['description'] ); ?></p>
					</div>
					<ul class="btd-pricing-card__features" role="list">
						<?php foreach ( $plan['features'] as $feature ) : ?>
							<li>
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
								<?php echo esc_html( $feature ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<a href="<?php echo esc_url( $shop_url ); ?>" class="btd-btn <?php echo $plan['highlight'] ? 'btd-btn--primary' : 'btd-btn--outline'; ?> btd-btn--block btd-btn--lg" role="button">
						<?php echo esc_html( $plan['cta_text'] ); ?>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

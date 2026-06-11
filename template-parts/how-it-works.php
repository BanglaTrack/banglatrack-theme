<?php
/**
 * Template part: How It Works section.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = array(
	array(
		'number' => '01',
		'title'  => __( 'Install & Connect', 'banglatrack-theme' ),
		'desc'   => __( 'Install the plugin, run the setup wizard, and connect your preferred courier API in under 5 minutes.', 'banglatrack-theme' ),
	),
	array(
		'number' => '02',
		'title'  => __( 'Book Parcels', 'banglatrack-theme' ),
		'desc'   => __( 'Book single or bulk shipments directly from your WooCommerce order dashboard. COD amounts are auto-populated.', 'banglatrack-theme' ),
	),
	array(
		'number' => '03',
		'title'  => __( 'Track & Deliver', 'banglatrack-theme' ),
		'desc'   => __( 'Customers track their orders with beautiful animated timelines. Statuses auto-sync via webhooks.', 'banglatrack-theme' ),
	),
);
?>

<section class="btd-how-it-works" id="how-it-works">
	<div class="btd-container">
		<div class="btd-section-header">
			<span class="btd-section-badge"><?php esc_html_e( 'How It Works', 'banglatrack-theme' ); ?></span>
			<h2 class="btd-section-title"><?php esc_html_e( 'Up and running in minutes', 'banglatrack-theme' ); ?></h2>
			<p class="btd-section-subtitle"><?php esc_html_e( 'Three simple steps to streamline your shipping workflow.', 'banglatrack-theme' ); ?></p>
		</div>
		<div class="btd-steps__grid">
			<?php foreach ( $steps as $index => $step ) : ?>
				<article class="btd-step-card">
					<div class="btd-step-card__number"><?php echo esc_html( $step['number'] ); ?></div>
					<h3 class="btd-step-card__title"><?php echo esc_html( $step['title'] ); ?></h3>
					<p class="btd-step-card__desc"><?php echo esc_html( $step['desc'] ); ?></p>
					<?php if ( $index < count( $steps ) - 1 ) : ?>
						<div class="btd-step-card__connector" aria-hidden="true"></div>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

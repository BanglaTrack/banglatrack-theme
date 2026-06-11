<?php
/**
 * 404 page template.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main-content" class="btd-main" role="main">
	<div class="btd-container btd-content-area">
		<div class="btd-404">
			<div class="btd-404__code">404</div>
			<h1 class="btd-404__title"><?php esc_html_e( 'Page not found', 'banglatrack-theme' ); ?></h1>
			<p class="btd-404__desc"><?php esc_html_e( 'The page you\'re looking for doesn\'t exist or has been moved.', 'banglatrack-theme' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btd-btn btd-btn--primary">
				<?php esc_html_e( 'Back to Home', 'banglatrack-theme' ); ?>
			</a>
		</div>
	</div>
</main>

<?php
get_footer();

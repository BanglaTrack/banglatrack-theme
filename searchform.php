<?php
/**
 * Search form template.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form role="search" method="get" class="btd-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="btd-search-form__label" for="btd-search-input">
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'banglatrack-theme' ); ?></span>
	</label>
	<input type="search" id="btd-search-input" class="btd-search-form__input" placeholder="<?php esc_attr_e( 'Search...', 'banglatrack-theme' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
	<button type="submit" class="btd-search-form__submit btd-btn btd-btn--primary btd-btn--sm">
		<?php esc_html_e( 'Search', 'banglatrack-theme' ); ?>
	</button>
</form>

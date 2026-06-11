<?php
/**
 * Performance optimizations: wp_head cleanup, defer scripts, lazy loading.
 *
 * @package BanglaTrackDeveloper
 */

namespace BTD;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Performance {

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public static function init() {
		// Remove wp_head bloat.
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		remove_action( 'wp_head', 'rest_output_link_wp_head' );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );

		// Remove feed links.
		remove_action( 'wp_head', 'feed_links', 2 );
		remove_action( 'wp_head', 'feed_links_extra', 3 );

		// Disable self-pingbacks.
		add_action( 'pre_ping', array( __CLASS__, 'disable_self_pingbacks' ) );

		// Remove query strings from static resources.
		add_filter( 'style_loader_src', array( __CLASS__, 'remove_query_strings' ), 15 );
		add_filter( 'script_loader_src', array( __CLASS__, 'remove_query_strings' ), 15 );

		// Disable XML-RPC.
		add_filter( 'xmlrpc_enabled', '__return_false' );

		// Optimize DNS prefetch.
		add_filter( 'wp_resource_hints', array( __CLASS__, 'resource_hints' ), 10, 2 );
	}

	/**
	 * Disable self-pingbacks.
	 *
	 * @param array $links Ping URLs.
	 * @return void
	 */
	public static function disable_self_pingbacks( &$links ) {
		$home_url = home_url();
		foreach ( $links as $key => $link ) {
			if ( 0 === strpos( $link, $home_url ) ) {
				unset( $links[ $key ] );
			}
		}
	}

	/**
	 * Remove query strings from static resources for better caching.
	 *
	 * @param string $src Source URL.
	 * @return string
	 */
	public static function remove_query_strings( $src ) {
		if ( strpos( $src, '?ver=' ) !== false ) {
			$src = remove_query_arg( 'ver', $src );
		}
		return $src;
	}

	/**
	 * Add DNS prefetch hints.
	 *
	 * @param array  $hints Existing hints.
	 * @param string $relation_type Relation type.
	 * @return array
	 */
	public static function resource_hints( $hints, $relation_type ) {
		if ( 'dns-prefetch' === $relation_type ) {
			$hints[] = '//fonts.googleapis.com';
			$hints[] = '//fonts.gstatic.com';
		}
		return $hints;
	}
}

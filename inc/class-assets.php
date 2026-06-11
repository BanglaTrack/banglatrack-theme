<?php
/**
 * Asset loading: CSS/JS enqueue, Google Fonts, preconnect.
 *
 * @package BanglaTrackDeveloper
 */

namespace BTD;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Assets {

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'dequeue_unnecessary' ), 100 );
		add_action( 'wp_head', array( __CLASS__, 'preconnect_hints' ), 1 );
	}

	/**
	 * Enqueue stylesheets.
	 *
	 * @return void
	 */
	public static function enqueue_styles() {
		// Google Fonts — Inter.
		wp_enqueue_style(
			'btd-google-fonts',
			'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
			array(),
			null
		);

		// Main stylesheet.
		wp_enqueue_style(
			'btd-main',
			BTD_URI . '/assets/css/main.css',
			array( 'btd-google-fonts' ),
			BTD_VERSION
		);
	}

	/**
	 * Enqueue scripts.
	 *
	 * @return void
	 */
	public static function enqueue_scripts() {
		wp_enqueue_script(
			'btd-main',
			BTD_URI . '/assets/js/main.js',
			array(),
			BTD_VERSION,
			array( 'strategy' => 'defer', 'in_footer' => true )
		);
	}

	/**
	 * Remove unnecessary default assets from frontend.
	 *
	 * @return void
	 */
	public static function dequeue_unnecessary() {
		// Remove jQuery from frontend if not needed by other plugins on this page.
		if ( ! is_admin() && ! is_customize_preview() ) {
			// Remove block library CSS if not using Gutenberg on frontend.
			wp_dequeue_style( 'wp-block-library' );
			wp_dequeue_style( 'wp-block-library-theme' );
			wp_dequeue_style( 'wc-blocks-style' );
			wp_dequeue_style( 'global-styles' );
			wp_dequeue_style( 'classic-theme-styles' );
		}
	}

	/**
	 * Output preconnect resource hints for Google Fonts.
	 *
	 * @return void
	 */
	public static function preconnect_hints() {
		echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
		echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	}
}

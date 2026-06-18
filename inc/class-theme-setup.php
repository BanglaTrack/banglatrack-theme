<?php
/**
 * Theme setup: menus, supports, content width, cleanup.
 *
 * @package BanglaTrackDeveloper
 */

namespace BTD;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Theme_Setup {

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'after_setup_theme', array( __CLASS__, 'setup' ) );
		add_action( 'widgets_init', array( __CLASS__, 'register_sidebars' ) );
		add_action( 'init', array( __CLASS__, 'create_user_guide_page' ) );
	}

	/**
	 * Theme setup.
	 *
	 * @return void
	 */
	public static function setup() {
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Post thumbnails.
		add_theme_support( 'post-thumbnails' );

		// HTML5 markup.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );

		// Custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 60,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		// Responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Content width.
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200;
		}

		// Register navigation menus.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'banglatrack-theme' ),
			'footer'  => esc_html__( 'Footer Menu', 'banglatrack-theme' ),
		) );
	}

	/**
	 * Register sidebars.
	 *
	 * @return void
	 */
	public static function register_sidebars() {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widgets', 'banglatrack-theme' ),
			'id'            => 'footer-widgets',
			'before_widget' => '<div id="%1$s" class="btd-footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="btd-footer-widget__title">',
			'after_title'   => '</h4>',
		) );
	}

	/**
	 * Programmatically create the User Guide page if it doesn't exist.
	 *
	 * @return void
	 */
	public static function create_user_guide_page() {
		if ( ! is_admin() ) {
			return;
		}

		$page_slug  = 'user-guide';
		$page_check = get_page_by_path( $page_slug );

		if ( ! isset( $page_check->ID ) ) {
			wp_insert_post( array(
				'post_title'   => 'User Guide',
				'post_content' => '<!-- user guide page template -->',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_name'    => $page_slug,
			) );
		}
	}
}

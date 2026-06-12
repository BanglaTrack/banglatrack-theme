<?php
/**
 * Theme Customizer: color settings and live preview.
 *
 * @package BanglaTrackDeveloper
 */

namespace BTD;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Customizer {

	/**
	 * Default color palette — must match main.css :root tokens.
	 *
	 * @var array<string,array{default:string,label:string,section:string}>
	 */
	private static $color_settings = array();

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public static function init() {
		self::register_color_map();
		add_action( 'customize_register', array( __CLASS__, 'register' ) );
		add_action( 'wp_head', array( __CLASS__, 'output_custom_css' ), 25 );
	}

	/**
	 * Build the colour map.  Kept in a method so it runs after i18n is loaded.
	 *
	 * @return void
	 */
	private static function register_color_map() {
		self::$color_settings = array(
			/* ── Brand Colors ─────────────────────────────── */
			'btd_color_green'       => array(
				'default' => '#0f7e57',
				'label'   => __( 'Primary Green', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-green',
			),
			'btd_color_green_dark'  => array(
				'default' => '#0b6848',
				'label'   => __( 'Primary Green (Dark)', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-green-dark',
			),
			'btd_color_green_light' => array(
				'default' => '#e3f6ec',
				'label'   => __( 'Primary Green (Light)', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-green-light',
			),
			'btd_color_green_50'    => array(
				'default' => '#f0faf5',
				'label'   => __( 'Primary Green (50)', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-green-50',
			),
			'btd_color_blue'        => array(
				'default' => '#148FF0',
				'label'   => __( 'Accent Blue', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-blue',
			),
			'btd_color_blue_light'  => array(
				'default' => '#e6f3ff',
				'label'   => __( 'Accent Blue (Light)', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-blue-light',
			),
			'btd_color_red'         => array(
				'default' => '#F83423',
				'label'   => __( 'Alert Red', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-red',
			),
			'btd_color_red_light'   => array(
				'default' => '#fef2f1',
				'label'   => __( 'Alert Red (Light)', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-red-light',
			),
			'btd_color_gold'        => array(
				'default' => '#FFD41D',
				'label'   => __( 'Gold / Warning', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-gold',
			),
			'btd_color_gold_light'  => array(
				'default' => '#fff9e0',
				'label'   => __( 'Gold (Light)', 'banglatrack-theme' ),
				'section' => 'btd_brand_colors',
				'prop'    => '--btd-gold-light',
			),

			/* ── Surface / Dark Colors ────────────────────── */
			'btd_color_dark_bg'      => array(
				'default' => '#0a1f18',
				'label'   => __( 'Dark Background', 'banglatrack-theme' ),
				'section' => 'btd_surface_colors',
				'prop'    => '--btd-dark-bg',
			),
			'btd_color_dark_surface' => array(
				'default' => '#0f2b21',
				'label'   => __( 'Dark Surface', 'banglatrack-theme' ),
				'section' => 'btd_surface_colors',
				'prop'    => '--btd-dark-surface',
			),
			'btd_color_dark_text'    => array(
				'default' => '#d1e8dd',
				'label'   => __( 'Dark Text', 'banglatrack-theme' ),
				'section' => 'btd_surface_colors',
				'prop'    => '--btd-dark-text',
			),
			'btd_color_body_bg'      => array(
				'default' => '#ffffff',
				'label'   => __( 'Body Background', 'banglatrack-theme' ),
				'section' => 'btd_surface_colors',
				'prop'    => '--btd-body-bg',
			),
			'btd_color_surface'      => array(
				'default' => '#ffffff',
				'label'   => __( 'Card / Surface', 'banglatrack-theme' ),
				'section' => 'btd_surface_colors',
				'prop'    => '--btd-surface',
			),
		);
	}

	/**
	 * Register Customizer panel, sections, settings, and controls.
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer manager instance.
	 * @return void
	 */
	public static function register( $wp_customize ) {
		/* ── Panel ───────────────────────────────────────── */
		$wp_customize->add_panel( 'btd_theme_colors', array(
			'title'       => __( 'Theme Colors', 'banglatrack-theme' ),
			'description' => __( 'Customize the BanglaTrack theme color palette.', 'banglatrack-theme' ),
			'priority'    => 30,
		) );

		/* ── Sections ────────────────────────────────────── */
		$wp_customize->add_section( 'btd_brand_colors', array(
			'title' => __( 'Brand Colors', 'banglatrack-theme' ),
			'panel' => 'btd_theme_colors',
		) );

		$wp_customize->add_section( 'btd_surface_colors', array(
			'title' => __( 'Surface & Dark Colors', 'banglatrack-theme' ),
			'panel' => 'btd_theme_colors',
		) );

		/* ── Settings & Controls ─────────────────────────── */
		foreach ( self::$color_settings as $id => $args ) {
			$wp_customize->add_setting( $id, array(
				'default'           => $args['default'],
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control(
				new \WP_Customize_Color_Control( $wp_customize, $id, array(
					'label'   => $args['label'],
					'section' => $args['section'],
				) )
			);
		}
	}

	/**
	 * Output inline CSS that overrides :root custom properties
	 * when any color has been changed from its default.
	 *
	 * @return void
	 */
	public static function output_custom_css() {
		$overrides = array();

		foreach ( self::$color_settings as $id => $args ) {
			$value = get_theme_mod( $id, $args['default'] );
			if ( strtolower( $value ) !== strtolower( $args['default'] ) ) {
				$overrides[] = sprintf( '%s: %s;', $args['prop'], sanitize_hex_color( $value ) );
			}
		}

		if ( empty( $overrides ) ) {
			return;
		}

		printf(
			"\n<style id=\"btd-customizer-colors\">\n:root {\n\t%s\n}\n</style>\n",
			implode( "\n\t", $overrides )
		);
	}
}

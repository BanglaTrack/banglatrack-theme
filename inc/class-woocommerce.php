<?php
/**
 * WooCommerce integration: theme support, template overrides, style cleanup.
 *
 * @package BanglaTrackDeveloper
 */

namespace BTD;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WooCommerce_Integration {

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public static function init() {
		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}

		add_action( 'after_setup_theme', array( __CLASS__, 'declare_support' ) );
		add_filter( 'woocommerce_enqueue_styles', array( __CLASS__, 'dequeue_wc_styles' ) );
		add_action( 'woocommerce_before_main_content', array( __CLASS__, 'wrapper_start' ), 10 );
		add_action( 'woocommerce_after_main_content', array( __CLASS__, 'wrapper_end' ), 10 );
		add_filter( 'woocommerce_show_page_title', '__return_false' );

		// Remove sidebar from WooCommerce pages.
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

		// Simplify checkout for digital products.
		add_filter( 'woocommerce_checkout_fields', array( __CLASS__, 'simplify_checkout_fields' ) );

		// Open Graph meta.
		add_action( 'wp_head', array( __CLASS__, 'open_graph_meta' ), 5 );

		// Meta description.
		add_action( 'wp_head', array( __CLASS__, 'meta_description' ), 5 );
	}

	/**
	 * Declare WooCommerce theme support.
	 *
	 * @return void
	 */
	public static function declare_support() {
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 400,
			'single_image_width'    => 600,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 3,
				'min_columns'     => 1,
				'max_columns'     => 4,
			),
		) );
	}

	/**
	 * Remove default WooCommerce styles so theme provides its own.
	 *
	 * @param array $styles Default WC styles.
	 * @return array
	 */
	public static function dequeue_wc_styles( $styles ) {
		unset( $styles['woocommerce-general'] );
		unset( $styles['woocommerce-layout'] );
		unset( $styles['woocommerce-smallscreen'] );
		return $styles;
	}

	/**
	 * WooCommerce content wrapper start.
	 *
	 * @return void
	 */
	public static function wrapper_start() {
		echo '<main id="main-content" class="btd-main btd-woocommerce-main"><div class="btd-container">';
	}

	/**
	 * WooCommerce content wrapper end.
	 *
	 * @return void
	 */
	public static function wrapper_end() {
		echo '</div></main>';
	}

	/**
	 * Simplify checkout fields for digital-only products.
	 *
	 * @param array $fields Checkout fields.
	 * @return array
	 */
	public static function simplify_checkout_fields( $fields ) {
		// Check if cart contains only digital/virtual products.
		if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
			return $fields;
		}

		$all_virtual = true;
		foreach ( WC()->cart->get_cart() as $cart_item ) {
			$product = $cart_item['data'];
			if ( $product && ! $product->is_virtual() ) {
				$all_virtual = false;
				break;
			}
		}

		if ( $all_virtual ) {
			// Remove shipping fields.
			unset( $fields['shipping'] );

			// Simplify billing — keep only essential fields.
			$keep = array( 'billing_first_name', 'billing_last_name', 'billing_email', 'billing_phone' );
			foreach ( array_keys( $fields['billing'] ) as $key ) {
				if ( ! in_array( $key, $keep, true ) ) {
					unset( $fields['billing'][ $key ] );
				}
			}
		}

		return $fields;
	}

	/**
	 * Output Open Graph meta tags.
	 *
	 * @return void
	 */
	public static function open_graph_meta() {
		$title       = wp_get_document_title();
		$description = self::get_page_description();
		$url         = is_front_page() ? home_url( '/' ) : get_permalink();
		$site_name   = get_bloginfo( 'name' );
		$image       = '';

		// Get featured image or custom logo.
		if ( is_singular() && has_post_thumbnail() ) {
			$image = get_the_post_thumbnail_url( null, 'large' );
		} else {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			if ( $custom_logo_id ) {
				$image = wp_get_attachment_image_url( $custom_logo_id, 'full' );
			}
		}

		echo '<meta property="og:type" content="website">' . "\n";
		echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
		echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
		echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
		echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '">' . "\n";
		if ( $image ) {
			echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
		}
		echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
		echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
		echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '">' . "\n";
	}

	/**
	 * Output meta description tag.
	 *
	 * @return void
	 */
	public static function meta_description() {
		$description = self::get_page_description();
		if ( $description ) {
			echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
		}
	}

	/**
	 * Get page description for meta tags.
	 *
	 * @return string
	 */
	private static function get_page_description() {
		if ( is_front_page() ) {
			return 'Bangla Track — The #1 WooCommerce shipping plugin for Bangladesh. Seamless courier integration with Steadfast, Pathao, and RedX. Book parcels, track shipments, print invoices.';
		}

		if ( is_singular() ) {
			global $post;
			$excerpt = wp_strip_all_tags( get_the_excerpt( $post ) );
			if ( $excerpt ) {
				return wp_trim_words( $excerpt, 25, '...' );
			}
		}

		return get_bloginfo( 'description' );
	}
}

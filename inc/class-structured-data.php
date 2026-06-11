<?php
/**
 * Structured data: JSON-LD rich snippets for SEO.
 *
 * @package BanglaTrackDeveloper
 */

namespace BTD;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Structured_Data {

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'wp_head', array( __CLASS__, 'output_schema' ), 99 );
	}

	/**
	 * Output JSON-LD structured data based on current page context.
	 *
	 * @return void
	 */
	public static function output_schema() {
		$schemas = array();

		// Organization — always present.
		$schemas[] = self::get_organization_schema();

		// WebSite — always present.
		$schemas[] = self::get_website_schema();

		if ( is_front_page() ) {
			$schemas[] = self::get_software_application_schema();
			$schemas[] = self::get_faq_schema();
		}

		if ( function_exists( 'is_product' ) && is_product() ) {
			$product_schema = self::get_product_schema();
			if ( $product_schema ) {
				$schemas[] = $product_schema;
			}
		}

		// BreadcrumbList — on non-front pages.
		if ( ! is_front_page() ) {
			$schemas[] = self::get_breadcrumb_schema();
		}

		foreach ( $schemas as $schema ) {
			if ( ! empty( $schema ) ) {
				echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ) . '</script>' . "\n";
			}
		}
	}

	/**
	 * Organization schema.
	 *
	 * @return array<string, mixed>
	 */
	private static function get_organization_schema() {
		$schema = array(
			'@context' => 'https://schema.org',
			'@type'    => 'Organization',
			'name'     => 'Bangla Track',
			'url'      => home_url( '/' ),
			'logo'     => array(
				'@type' => 'ImageObject',
				'url'   => BTD_URI . '/assets/images/logo.svg',
			),
			'description' => 'The #1 WooCommerce Shipping Plugin for Bangladesh — seamless courier integration with Steadfast, Pathao, and RedX.',
			'contactPoint' => array(
				'@type'       => 'ContactPoint',
				'contactType' => 'customer support',
				'url'         => home_url( '/support/' ),
			),
		);

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id ) {
			$logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
			if ( $logo_url ) {
				$schema['logo']['url'] = $logo_url;
			}
		}

		return $schema;
	}

	/**
	 * WebSite schema with SearchAction.
	 *
	 * @return array<string, mixed>
	 */
	private static function get_website_schema() {
		return array(
			'@context'      => 'https://schema.org',
			'@type'         => 'WebSite',
			'name'          => get_bloginfo( 'name' ),
			'url'           => home_url( '/' ),
			'potentialAction' => array(
				'@type'  => 'SearchAction',
				'target' => array(
					'@type'        => 'EntryPoint',
					'urlTemplate'  => home_url( '/?s={search_term_string}' ),
				),
				'query-input' => 'required name=search_term_string',
			),
		);
	}

	/**
	 * SoftwareApplication schema for homepage.
	 *
	 * @return array<string, mixed>
	 */
	private static function get_software_application_schema() {
		return array(
			'@context'            => 'https://schema.org',
			'@type'               => 'SoftwareApplication',
			'name'                => 'Bangla Track',
			'description'         => 'WooCommerce shipping integration plugin for Bangladesh. Book parcels, track shipments, and sync order statuses with Steadfast, Pathao, and RedX courier services.',
			'applicationCategory' => 'BusinessApplication',
			'operatingSystem'     => 'WordPress',
			'softwareVersion'     => '1.0',
			'offers'              => array(
				'@type'         => 'AggregateOffer',
				'lowPrice'      => '0',
				'highPrice'     => '1999',
				'priceCurrency' => 'BDT',
				'offerCount'    => '3',
				'offers'        => array(
					array(
						'@type'         => 'Offer',
						'name'          => 'Free Forever',
						'price'         => '0',
						'priceCurrency' => 'BDT',
						'description'   => '100 bookings/month, single courier provider',
					),
					array(
						'@type'         => 'Offer',
						'name'          => 'Starter',
						'price'         => '499',
						'priceCurrency' => 'BDT',
						'description'   => '500 bookings/month, all courier providers',
					),
					array(
						'@type'         => 'Offer',
						'name'          => 'Pro',
						'price'         => '999',
						'priceCurrency' => 'BDT',
						'description'   => 'Unlimited bookings, all providers, 3 sites',
					),
				),
			),
		);
	}

	/**
	 * FAQ schema for homepage.
	 *
	 * @return array<string, mixed>
	 */
	private static function get_faq_schema() {
		$faqs = array(
			array(
				'question' => 'What courier services does Bangla Track support?',
				'answer'   => 'Bangla Track integrates with Steadfast Courier, Pathao, and RedX — the three most popular courier services in Bangladesh.',
			),
			array(
				'question' => 'Is there a free version of Bangla Track?',
				'answer'   => 'Yes! The free version includes 100 bookings per month with one courier provider. No credit card required.',
			),
			array(
				'question' => 'How do I install Bangla Track?',
				'answer'   => 'Download the plugin from your account dashboard, upload it to your WordPress site via Plugins → Add New → Upload, and activate it. The setup wizard will guide you through connecting your courier API.',
			),
			array(
				'question' => 'Can I switch courier providers after setup?',
				'answer'   => 'In the free version, the provider is locked after initial setup. Upgrade to Starter or Pro to use multiple providers simultaneously.',
			),
			array(
				'question' => 'Does Bangla Track support bulk booking?',
				'answer'   => 'Yes. Bangla Track supports bulk parcel booking using WordPress Action Scheduler for reliable background processing.',
			),
		);

		$main_entity = array();
		foreach ( $faqs as $faq ) {
			$main_entity[] = array(
				'@type'          => 'Question',
				'name'           => $faq['question'],
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $faq['answer'],
				),
			);
		}

		return array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => $main_entity,
		);
	}

	/**
	 * Product schema for WooCommerce product pages.
	 *
	 * @return array<string, mixed>|null
	 */
	private static function get_product_schema() {
		if ( ! function_exists( 'wc_get_product' ) ) {
			return null;
		}

		global $post;
		$product = wc_get_product( $post->ID );
		if ( ! $product ) {
			return null;
		}

		$schema = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Product',
			'name'        => $product->get_name(),
			'description' => wp_strip_all_tags( $product->get_short_description() ?: $product->get_description() ),
			'url'         => get_permalink( $post->ID ),
			'brand'       => array(
				'@type' => 'Brand',
				'name'  => 'Bangla Track',
			),
			'offers'      => array(
				'@type'           => 'Offer',
				'price'           => $product->get_price(),
				'priceCurrency'   => get_woocommerce_currency(),
				'availability'    => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
				'url'             => get_permalink( $post->ID ),
				'seller'          => array(
					'@type' => 'Organization',
					'name'  => 'Bangla Track',
				),
			),
		);

		$image_id = $product->get_image_id();
		if ( $image_id ) {
			$schema['image'] = wp_get_attachment_image_url( $image_id, 'large' );
		}

		return $schema;
	}

	/**
	 * Breadcrumb schema for interior pages.
	 *
	 * @return array<string, mixed>
	 */
	private static function get_breadcrumb_schema() {
		$items = array();
		$position = 1;

		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'name'     => esc_html__( 'Home', 'banglatrack-theme' ),
			'item'     => home_url( '/' ),
		);

		if ( is_singular() ) {
			global $post;
			$items[] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => get_the_title( $post ),
				'item'     => get_permalink( $post ),
			);
		} elseif ( is_archive() ) {
			$items[] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => get_the_archive_title(),
			);
		} elseif ( is_search() ) {
			$items[] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => esc_html__( 'Search Results', 'banglatrack-theme' ),
			);
		}

		return array(
			'@context'        => 'https://schema.org',
			'@type'           => 'BreadcrumbList',
			'itemListElement' => $items,
		);
	}
}

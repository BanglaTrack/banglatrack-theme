<?php
/**
 * Template Name: User Guide
 * Template Post Type: page
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Inject JSON-LD Schema for SEO
add_action( 'wp_head', function() {
	?>
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "TechArticle",
		"headline": "Bangla Track WooCommerce Shipping Plugin User Guide",
		"description": "Learn how to integrate Steadfast, Pathao, and RedX couriers with WooCommerce in Bangladesh, book parcels, print invoices, and track shipments in real time.",
		"image": "<?php echo esc_url( BTD_URI . '/assets/logo/banglaTrack.png' ); ?>",
		"author": {
			"@type": "Organization",
			"name": "Bangla Track"
		},
		"publisher": {
			"@type": "Organization",
			"name": "Bangla Track",
			"logo": {
				"@type": "ImageObject",
				"url": "<?php echo esc_url( BTD_URI . '/assets/logo/banglaTrack.png' ); ?>"
			}
		},
		"mainEntityOfPage": {
			"@type": "WebPage",
			"@id": "<?php echo esc_url( home_url( '/user-guide/' ) ); ?>"
		}
	}
	</script>
	<?php
} );

get_header();
?>

<main id="main-content" class="btd-main btd-user-guide-page" role="main">
	<!-- Hero Section -->
	<header class="btd-user-guide-hero">
		<div class="btd-container">
			<span class="btd-section-badge"><?php esc_html_e( 'Documentation', 'banglatrack-theme' ); ?></span>
			<h1 class="btd-user-guide-hero__title"><?php esc_html_e( 'Bangla Track User Guide', 'banglatrack-theme' ); ?></h1>
			<p class="btd-user-guide-hero__subtitle">
				<?php esc_html_e( 'Everything you need to set up, configure, and optimize your WooCommerce courier shipping pipeline in Bangladesh.', 'banglatrack-theme' ); ?>
			</p>
		</div>
	</header>

	<div class="btd-container">
		<div class="btd-user-guide-layout">
			<!-- Side Table of Contents (Sticky) -->
			<aside class="btd-user-guide-sidebar">
				<nav class="btd-ug-nav" aria-label="<?php esc_attr_e( 'User Guide Navigation', 'banglatrack-theme' ); ?>">
					<ul class="btd-ug-nav__list">
						<li><a href="#how-it-works" class="btd-ug-nav__link active"><?php esc_html_e( 'How It Works', 'banglatrack-theme' ); ?></a></li>
						<li><a href="#benefits" class="btd-ug-nav__link"><?php esc_html_e( 'Why WooCommerce Users Need It', 'banglatrack-theme' ); ?></a></li>
						<li><a href="#quick-start" class="btd-ug-nav__link"><?php esc_html_e( 'Quick Start Guide', 'banglatrack-theme' ); ?></a></li>
						<li><a href="#provider-configs" class="btd-ug-nav__link"><?php esc_html_e( 'Configuring Couriers', 'banglatrack-theme' ); ?></a></li>
						<li><a href="#managing-shipments" class="btd-ug-nav__link"><?php esc_html_e( 'Booking & Invoices', 'banglatrack-theme' ); ?></a></li>
						<li><a href="#tracking-features" class="btd-ug-nav__link"><?php esc_html_e( 'Timeline Tracking', 'banglatrack-theme' ); ?></a></li>
						<li><a href="#faq" class="btd-ug-nav__link"><?php esc_html_e( 'Troubleshooting & FAQ', 'banglatrack-theme' ); ?></a></li>
					</ul>
				</nav>
			</aside>

			<!-- Content Sections -->
			<div class="btd-user-guide-content btd-prose">
				<!-- How it works -->
				<section id="how-it-works" class="btd-ug-section">
					<h2><?php esc_html_e( 'How Bangla Track Works', 'banglatrack-theme' ); ?></h2>
					<p>
						<?php esc_html_e( 'Bangla Track seamlessly bridges the gap between your WooCommerce store and major courier companies in Bangladesh. It replaces slow, error-prone manual dashboard entries with a secure, direct API sync.', 'banglatrack-theme' ); ?>
					</p>

					<div class="btd-ug-grid-2">
						<div class="btd-ug-card">
							<div class="btd-ug-card__icon">🔌</div>
							<h3><?php esc_html_e( '1. Connect APIs', 'banglatrack-theme' ); ?></h3>
							<p><?php esc_html_e( 'Enter your courier credentials (API keys, Client Secrets) inside the settings panel or first-run setup wizard.', 'banglatrack-theme' ); ?></p>
						</div>
						<div class="btd-ug-card">
							<div class="btd-ug-card__icon">📦</div>
							<h3><?php esc_html_e( '2. One-Click Booking', 'banglatrack-theme' ); ?></h3>
							<p><?php esc_html_e( 'Select courier, review COD amounts (automatically fetched from order total), and book parcels directly inside the WooCommerce order screen.', 'banglatrack-theme' ); ?></p>
						</div>
						<div class="btd-ug-card">
							<div class="btd-ug-card__icon">📋</div>
							<h3><?php esc_html_e( '3. Invoice Printing', 'banglatrack-theme' ); ?></h3>
							<p><?php esc_html_e( 'Instantly print beautifully aligned invoices or shipping labels (HTML and PDF download formats) complete with official tracking IDs.', 'banglatrack-theme' ); ?></p>
						</div>
						<div class="btd-ug-card">
							<div class="btd-ug-card__icon">🔄</div>
							<h3><?php esc_html_e( '4. Auto-Sync Timeline', 'banglatrack-theme' ); ?></h3>
							<p><?php esc_html_e( 'The plugin listens to courier callbacks, automatically updating WooCommerce order statuses and showing interactive progress timelines to your buyers.', 'banglatrack-theme' ); ?></p>
						</div>
					</div>
				</section>

				<hr>

				<!-- How it helps WooCommerce users -->
				<section id="benefits" class="btd-ug-section">
					<h2><?php esc_html_e( 'How It Helps WooCommerce Users', 'banglatrack-theme' ); ?></h2>
					<p>
						<?php esc_html_e( 'Running an e-commerce shop in Bangladesh presents unique challenges, particularly high Return to Origin (RTO) rates and manual cash-on-delivery tracking. Bangla Track is engineered to solve these exact friction points.', 'banglatrack-theme' ); ?>
					</p>

					<div class="btd-ug-alert btd-ug-alert--success">
						<strong>🏆 <?php esc_html_e( 'Reduce RTO Rates by Up to 35%:', 'banglatrack-theme' ); ?></strong>
						<?php esc_html_e( ' Keeping customers updated is key. Providing an interactive tracking timeline directly on their WooCommerce "My Account" page reduces anxiety, builds trust, and ensures they are available to receive and pay for the parcel upon delivery.', 'banglatrack-theme' ); ?>
					</div>

					<ul>
						<li><strong><?php esc_html_e( 'Zero Copy-Pasting Errors:', 'banglatrack-theme' ); ?></strong> <?php esc_html_e( 'Customer addresses, phone numbers, and COD values transfer to couriers via APIs. No more typing mistakes leading to failed deliveries.', 'banglatrack-theme' ); ?></li>
						<li><strong><?php esc_html_e( 'Unified Print Invoice System:', 'banglatrack-theme' ); ?></strong> <?php esc_html_e( 'Download and print invoices right from your order list. The PDF layouts are fully optimized for standard thermal labels or A4 papers, displaying uniform copyright tags.', 'banglatrack-theme' ); ?></li>
						<li><strong><?php esc_html_e( 'Automated Order Flow:', 'banglatrack-theme' ); ?></strong> <?php esc_html_e( 'When a courier driver marks a parcel as "Delivered" or "Returned", your WooCommerce order updates instantly without admin intervention.', 'banglatrack-theme' ); ?></li>
					</ul>
				</section>

				<hr>

				<!-- Quick Start Guide -->
				<section id="quick-start" class="btd-ug-section">
					<h2><?php esc_html_e( 'Quick Start Guide', 'banglatrack-theme' ); ?></h2>
					<ol>
						<li>
							<strong><?php esc_html_e( 'Install the Plugin:', 'banglatrack-theme' ); ?></strong>
							<?php esc_html_e( 'Upload and activate the Bangla Track plugin in your WordPress dashboard.', 'banglatrack-theme' ); ?>
						</li>
						<li>
							<strong><?php esc_html_e( 'First-Activation Wizard:', 'banglatrack-theme' ); ?></strong>
							<?php esc_html_e( 'You will be automatically redirected to the Setup Wizard. Follow the step-by-step assistant to enter business details and configure your default courier.', 'banglatrack-theme' ); ?>
						</li>
						<li>
							<strong><?php esc_html_e( 'Configure Default Store ID:', 'banglatrack-theme' ); ?></strong>
							<?php esc_html_e( 'If using Pathao, fill in client credentials and use the dynamic refresh button to automatically pull and set your default merchant store.', 'banglatrack-theme' ); ?>
						</li>
					</ol>
				</section>

				<hr>

				<!-- Configuring Couriers -->
				<section id="provider-configs" class="btd-ug-section">
					<h2><?php esc_html_e( 'Configuring Courier Providers', 'banglatrack-theme' ); ?></h2>
					<p>
						<?php esc_html_e( 'Bangla Track supports Bangladesh\'s premium courier networks. Configure them under ', 'banglatrack-theme' ); ?><code><?php esc_html_e( 'WooCommerce > Bangla Track Settings', 'banglatrack-theme' ); ?></code>.
					</p>

					<h3>💼 <?php esc_html_e( 'Steadfast integration', 'banglatrack-theme' ); ?></h3>
					<p><?php esc_html_e( 'Requires only your Steadfast API Key and Secret Key. Once input, connection testing takes place in milliseconds.', 'banglatrack-theme' ); ?></p>

					<h3>🛵 <?php esc_html_e( 'Pathao Integration', 'banglatrack-theme' ); ?></h3>
					<p><?php esc_html_e( 'Requires Client ID, Client Secret, Username, and Password.', 'banglatrack-theme' ); ?></p>
					<div class="btd-ug-alert btd-ug-alert--info">
						<strong>💡 <?php esc_html_e( 'Dynamic Store Fetching:', 'banglatrack-theme' ); ?></strong>
						<?php esc_html_e( ' When you type your credentials, click the update icon reload button next to "Default Store ID". The plugin calls Pathao APIs to dynamically populate your stores list, converting the text field into a secure drop-down list.', 'banglatrack-theme' ); ?>
					</div>

					<h3>🚩 <?php esc_html_e( 'RedX Integration', 'banglatrack-theme' ); ?></h3>
					<p><?php esc_html_e( 'Requires your RedX API token. Enable sandbox mode for testing before moving to live fulfillment.', 'banglatrack-theme' ); ?></p>
				</section>

				<hr>

				<!-- Booking & Invoices -->
				<section id="managing-shipments" class="btd-ug-section">
					<h2><?php esc_html_e( 'Booking Parcels & Printing Invoices', 'banglatrack-theme' ); ?></h2>
					<p>
						<?php esc_html_e( 'Once an order is received on your shop:', 'banglatrack-theme' ); ?>
					</p>
					<ol>
						<li><?php esc_html_e( 'Open the Order Edit page. A custom "Bangla Track Courier Booking" metabox is located on the right sidebar.', 'banglatrack-theme' ); ?></li>
						<li><?php esc_html_e( 'Select the provider. The metabox UI changes its branding accents dynamically (Green for Steadfast, Blue for Pathao, Red for RedX).', 'banglatrack-theme' ); ?></li>
						<li><?php esc_html_e( 'Verify COD amount, weight, and customer details, then click "Book Shipment".', 'banglatrack-theme' ); ?></li>
						<li><?php esc_html_e( 'Once booked, a custom consignment card displays the tracking code. You can download and print the order\'s invoice directly.', 'banglatrack-theme' ); ?></li>
					</ol>

					<div class="btd-ug-alert btd-ug-alert--warning">
						<strong>⚠️ <?php esc_html_e( 'Invoice Printing Protection:', 'banglatrack-theme' ); ?></strong>
						<?php esc_html_e( ' You cannot print or download invoices for shipments that have not been registered/tracked yet. Always book the parcel first.', 'banglatrack-theme' ); ?>
					</div>
				</section>

				<hr>

				<!-- Timeline Tracking -->
				<section id="tracking-features" class="btd-ug-section">
					<h2><?php esc_html_e( 'Interactive Real-Time Timelines', 'banglatrack-theme' ); ?></h2>
					<p>
						<?php esc_html_e( 'Provide transparency to your users. When an order is booked, customer dashboards show animated vertical progress bars.', 'banglatrack-theme' ); ?>
					</p>
					<ul>
						<li><strong><?php esc_html_e( 'In Transit Status:', 'banglatrack-theme' ); ?></strong> <?php esc_html_e( 'Shows shipment packaging and dispatch notes.', 'banglatrack-theme' ); ?></li>
						<li><strong><?php esc_html_e( 'Out for Delivery:', 'banglatrack-theme' ); ?></strong> <?php esc_html_e( 'Displays delivery agent updates if provided by API.', 'banglatrack-theme' ); ?></li>
						<li><strong><?php esc_html_e( 'Delivered/Returned:', 'banglatrack-theme' ); ?></strong> <?php esc_html_e( 'Final step highlights successful COD completion or package returns.', 'banglatrack-theme' ); ?></li>
					</ul>
				</section>

				<hr>

				<!-- Troubleshooting & FAQ -->
				<section id="faq" class="btd-ug-section">
					<h2><?php esc_html_e( 'Frequently Asked Questions', 'banglatrack-theme' ); ?></h2>
					
					<details class="btd-ug-faq-item">
						<summary class="btd-ug-faq-question"><?php esc_html_e( 'Why does the invoice say "The following orders have not been tracked yet"?', 'banglatrack-theme' ); ?></summary>
						<div class="btd-ug-faq-answer">
							<p><?php esc_html_e( 'Invoices can only be printed for orders successfully booked on a courier network. Open the order page, verify the details in the Bangla Track side-bar, and click "Book Shipment" first.', 'banglatrack-theme' ); ?></p>
						</div>
					</details>

					<details class="btd-ug-faq-item">
						<summary class="btd-ug-faq-question"><?php esc_html_e( 'How do I fetch my Pathao Store ID list dynamically?', 'banglatrack-theme' ); ?></summary>
						<div class="btd-ug-faq-answer">
							<p><?php esc_html_e( 'In the settings page or Setup Wizard, select Pathao as the provider, fill out your Client ID, Secret, Username, and Password, and click the refresh reload button beside "Default Store ID". The system will dynamically load the dropdown options for you.', 'banglatrack-theme' ); ?></p>
						</div>
					</details>

					<details class="btd-ug-faq-item">
						<summary class="btd-ug-faq-question"><?php esc_html_e( 'Are invoice footers editable?', 'banglatrack-theme' ); ?></summary>
						<div class="btd-ug-faq-answer">
							<p><?php esc_html_e( 'Invoice templates include standard logo branding and copyright. If you wish to customize the company name, update your business settings under Bangla Track General Settings.', 'banglatrack-theme' ); ?></p>
						</div>
					</details>
				</section>
			</div>
		</div>
	</div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const links = document.querySelectorAll('.btd-ug-nav__link');
	const sections = document.querySelectorAll('.btd-ug-section');

	function makeActive() {
		let scrollPos = window.scrollY + 120;
		sections.forEach(section => {
			let id = section.getAttribute('id');
			let top = section.offsetTop;
			let height = section.offsetHeight;
			if (scrollPos >= top && scrollPos < top + height) {
				links.forEach(link => {
					link.classList.remove('active');
					if (link.getAttribute('href') === '#' + id) {
						link.classList.add('active');
					}
				});
			}
		});
	}

	window.addEventListener('scroll', makeActive);
});
</script>

<?php
get_footer();

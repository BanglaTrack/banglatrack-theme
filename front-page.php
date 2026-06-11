<?php
/**
 * Front page template — Homepage.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main-content" class="btd-main" role="main">
	<?php get_template_part( 'template-parts/hero' ); ?>
	<?php get_template_part( 'template-parts/providers' ); ?>
	<?php get_template_part( 'template-parts/features' ); ?>
	<?php get_template_part( 'template-parts/pricing' ); ?>
	<?php get_template_part( 'template-parts/how-it-works' ); ?>
	<?php get_template_part( 'template-parts/faq' ); ?>
	<?php get_template_part( 'template-parts/cta' ); ?>
</main>

<?php
get_footer();

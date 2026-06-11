<?php
/**
 * Generic page template.
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
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'btd-page-article' ); ?>>
				<header class="btd-page-header">
					<h1 class="btd-page-title"><?php the_title(); ?></h1>
				</header>
				<div class="btd-page-content btd-prose">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</main>

<?php
get_footer();

<?php
/**
 * Single post template.
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
			<article <?php post_class( 'btd-single-article' ); ?>>
				<header class="btd-single-header">
					<div class="btd-single-meta">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						<?php if ( get_the_category_list() ) : ?>
							<span class="btd-single-meta__sep">&middot;</span>
							<?php the_category( ', ' ); ?>
						<?php endif; ?>
					</div>
					<h1 class="btd-single-title"><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
						<p class="btd-single-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="btd-single-featured">
						<?php the_post_thumbnail( 'large', array( 'fetchpriority' => 'high' ) ); ?>
					</figure>
				<?php endif; ?>

				<div class="btd-single-content btd-prose">
					<?php the_content(); ?>
				</div>

				<footer class="btd-single-footer">
					<?php
					the_post_navigation( array(
						'prev_text' => '<span class="btd-post-nav__label">' . esc_html__( 'Previous', 'banglatrack-theme' ) . '</span><span class="btd-post-nav__title">%title</span>',
						'next_text' => '<span class="btd-post-nav__label">' . esc_html__( 'Next', 'banglatrack-theme' ) . '</span><span class="btd-post-nav__title">%title</span>',
					) );
					?>
				</footer>
			</article>
		<?php endwhile; ?>
	</div>
</main>

<?php
get_footer();

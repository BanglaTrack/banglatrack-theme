<?php
/**
 * Archive template.
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
		<header class="btd-archive-header">
			<?php the_archive_title( '<h1 class="btd-archive-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="btd-archive-desc btd-prose">', '</div>' ); ?>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="btd-posts-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'btd-post-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="btd-post-card__thumb">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="btd-post-card__body">
							<h2 class="btd-post-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="btd-post-card__meta">
								<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
							</div>
							<div class="btd-post-card__excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination( array(
				'prev_text' => '&larr; ' . esc_html__( 'Previous', 'banglatrack-theme' ),
				'next_text' => esc_html__( 'Next', 'banglatrack-theme' ) . ' &rarr;',
				'class'     => 'btd-pagination',
			) ); ?>
		<?php else : ?>
			<div class="btd-empty-state">
				<h2><?php esc_html_e( 'No posts found', 'banglatrack-theme' ); ?></h2>
				<p><?php esc_html_e( 'There are no posts to display at this time.', 'banglatrack-theme' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();

<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsreach
 */

global $post;
$newsreach_page_layout = esc_html( get_post_meta( $post->ID, 'newsreach_page_layout', true ) ); 
if (empty($newsreach_page_layout)) {
    $newsreach_page_layout = 'layout-1';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ($newsreach_page_layout == "layout-1") { ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title entry-title-large">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php newsreach_post_thumbnail(); ?>
	<?php $display_read_time_in = newsreach_get_option('display_read_time_in');
	if (in_array('single-page', $display_read_time_in)) {
	    newsreach_read_time();
	} ?>
	<?php } ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsreach' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'newsreach' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

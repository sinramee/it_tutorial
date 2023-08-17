<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Author Writer
 * @subpackage author_writer
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function author_writer_categorized_blog() {
	$author_writer_category_count = get_transient( 'author_writer_categories' );

	if ( false === $author_writer_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$author_writer_category_count = count( $categories );

		set_transient( 'author_writer_categories', $author_writer_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $author_writer_category_count > 1;
}

if ( ! function_exists( 'author_writer_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Author Writer
 */
function author_writer_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in author_writer_categorized_blog.
 */
function author_writer_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'author_writer_categories' );
}
add_action( 'edit_category', 'author_writer_category_transient_flusher' );
add_action( 'save_post',     'author_writer_category_transient_flusher' );
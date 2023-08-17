<?php
/**
 * Show the appropriate content for the Quote post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsreach
 * @since Newsreach 1.0.0
 */


$content = get_the_content();

// If there is no quote or pullquote print the content.
if ( has_block( 'core/quote', $content ) ) {
	newsreach_print_first_instance_of_block( 'core/quote', $content );
} elseif ( has_block( 'core/pullquote', $content ) ) {
	newsreach_print_first_instance_of_block( 'core/pullquote', $content );
} else {
    if ( absint(newsreach_get_option( 'excerpt_length' )) != '0'){
	   the_excerpt();
    }
}
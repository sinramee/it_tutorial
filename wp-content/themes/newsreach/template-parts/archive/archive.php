<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsreach
 * @since Newsreach 1.0.0
 */
if ( absint(newsreach_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}
<?php
/**
 * Displays progressbar
 *
 * @package Newsreach
 */

$show_progressbar = newsreach_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = newsreach_get_option( 'progressbar_position' );
	echo '<div id="newsreach-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;

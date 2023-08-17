<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Author Writer
 * @subpackage author_writer
 */

function author_writer_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'author_writer_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'  			 => true,
		'flex-height'  			 => true,
		'wp-head-callback'       => 'author_writer_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'author_writer_custom_header_setup' );

if ( ! function_exists( 'author_writer_header_style' ) ) :
add_action( 'wp_enqueue_scripts', 'author_writer_header_style' );
function author_writer_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .headerbox,.page-template-front-page .headerbox{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'author-writer-style', $custom_css );
	endif;
}
endif;

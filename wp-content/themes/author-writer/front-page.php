<?php
/**
 * The front page template file
 *
 * @package Author Writer
 * @subpackage author_writer
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'author_writer_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'author_writer_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'author_writer_after_home_content' ); ?>
</main>

<?php get_footer();
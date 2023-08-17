<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Author Writer
 * @subpackage author_writer
 */
?>

<aside id="theme-sidebar" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'author-writer' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
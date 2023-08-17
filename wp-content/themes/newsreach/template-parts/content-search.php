<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsreach
 */
$enabled_post_meta = array();
$archive_style = newsreach_get_option('archive_style');
switch ($archive_style) {
    case 'archive_style_1':
        $enabled_post_meta = newsreach_get_option('archive_post_meta_1');
    break;
    case 'archive_style_2':
        $enabled_post_meta = newsreach_get_option('archive_post_meta_2');
    break;
    case 'archive_style_3':
        $enabled_post_meta = newsreach_get_option('archive_post_meta_3');
    break;
    case 'archive_style_4':
        $enabled_post_meta = newsreach_get_option('archive_post_meta_4');
    break;
    
    default:
        // code...
        break;
}
$class = '';
if('archive_style_4' == $archive_style){
    $class = 'data-bg newsreach-bg-image';
}
$post_format = get_post_format();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>

    <div class="article-block-wrapper">
        
        <?php get_template_part('template-parts/archive/entry-header-archive');?>

        <div class="entry-summary">
            <?php get_template_part( 'template-parts/archive/archive', $post_format ); ?>
        </div><!-- .entry-content -->

        <?php 
        if ( 'aside' != $post_format && 'status' != $post_format ) { ?>
            <footer class="entry-meta entry-meta-footer">
                <?php newsreach_entry_footer($enabled_post_meta); ?>
            </footer>
        <?php } ?>
        
    </div><!-- .article-block-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->

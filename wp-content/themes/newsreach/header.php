<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newsreach
 */

?>
<!doctype html>
<html <?php language_attributes(); newsreach_force_dark_mode();?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'newsreach_before_site' ); ?>

<div id="page" class="site">
    <div class="site-content-area">
    <?php get_template_part( 'template-parts/header/loader' ); ?>

    <?php $ed_header_ad = newsreach_get_option( 'ed_header_ad' );
    if ($ed_header_ad) {
        get_template_part( 'template-parts/header/welcome-screen-banner' );
    } ?>

    <?php get_template_part( 'template-parts/header/progressbar' ); ?>

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'newsreach'); ?></a>

    <?php do_action( 'newsreach_before_header' ); ?>

    <?php get_template_part('template-parts/header/theme-header'); ?>

    <?php do_action( 'newsreach_before_content' ); ?>
    <?php
    if ((is_home() || is_front_page()) && !is_paged()) {
    $enable_background_fix = newsreach_get_option('enable_background_fix');
    $upload_banner_bg_image = newsreach_get_option('upload_banner_bg_image');
    $image_fix_class = '';
    if ($enable_background_fix) {
        $image_fix_class = "data-bg-fixed ";
    }
    if (!empty($upload_banner_bg_image)) {
        $image_fix_class .= " data-bg";
    }
     ?>
        <div class="site-section-parent <?php echo esc_attr($image_fix_class); ?>" data-background="<?php echo esc_url($upload_banner_bg_image); ?>">   
            <?php
            get_template_part('template-parts/header/components/header-trending-tags');

            get_template_part('template-parts/header/components/header-ticker');

            get_template_part('template-parts/front-page/banner-section');
            ?>
        </div>
        <?php $is_slider_section = newsreach_get_option('enable_slider_section');
        if ($is_slider_section) {
            get_template_part('template-parts/front-page/slider-section');
        }
        $enable_category_section = newsreach_get_option('enable_category_section');
        if ($enable_category_section) {
            get_template_part('template-parts/front-page/categories-section');
        }
        $enable_read_more_post_section = newsreach_get_option('enable_read_more_post_section');
        if ($enable_read_more_post_section) {
            get_template_part('template-parts/front-page/more-to-read');
        }
        $enable_article_with_separator_post_section = newsreach_get_option('enable_article_with_separator_post_section');
        if ($enable_article_with_separator_post_section) {
            get_template_part('template-parts/front-page/article_with_separator');
        }
    }


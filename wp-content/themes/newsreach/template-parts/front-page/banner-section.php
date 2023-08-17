<?php

/**
 * Displays Banner Section
 *
 * @package Newsreach
 */
$enable_banner_section = newsreach_get_option('enable_banner_section');
if (empty($enable_banner_section)) {
    return;
}
$banner_section_style = newsreach_get_option('banner_section_style');
$banner_section_cat_style_1 = newsreach_get_option('banner_section_cat_style_1');
$banner_section_cat_style_1_grid = newsreach_get_option('banner_section_cat_style_1_grid');
$banner_section_cat_style_3 = newsreach_get_option('banner_section_cat_style_3');
$banner_section_cat_style_4 = newsreach_get_option('banner_section_cat_style_4');
$banner_section_title_1 = newsreach_get_option('banner_section_title_1');
$banner_section_cat_1 = newsreach_get_option('banner_section_cat_1');
$banner_section_title_2 = newsreach_get_option('banner_section_title_2');
$banner_section_cat_2 = newsreach_get_option('banner_section_cat_2');
$banner_section_title_3 = newsreach_get_option('banner_section_title_3');
$banner_section_cat_3 = newsreach_get_option('banner_section_cat_3');
$enable_banner_cat_meta = newsreach_get_option('enable_banner_cat_meta');
$enable_banner_author_meta = newsreach_get_option('enable_banner_author_meta');
$enable_banner_date_meta = newsreach_get_option('enable_banner_date_meta');
$banner_style_1_single_qury = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_style_1)));
$banner_style_3_single_qury = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 5, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_style_3)));

$grid_post_query_style_1 = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_style_1_grid)));
$grid_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 2, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_1)));
$banner_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_2)));
$list_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_3)));
$banner_query_style_4 = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_style_4)));
?>

<?php switch ($banner_section_style) {
    case 'style-1': ?>
        <section class="site-section site-banner-section site-banner-layout-1">
            <div class="wrapper">
                <div class="column-row column-row-small">

                    <div class="column column-6 column-sm-12">
                        <div class="main-banner-slider swiper">
                            <div class="swiper-wrapper">
                                <?php
                                if ($banner_style_1_single_qury->have_posts()) :
                                    while ($banner_style_1_single_qury->have_posts()) : $banner_style_1_single_qury->the_post();
                                        ?>
                                        <div class="swiper-slide">
                                            <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-shine theme-tiles-post'); ?>>
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="entry-image">
                                                        <figure class="featured-media featured-media-big">
                                                            <a href="<?php the_permalink() ?>">
                                                                <?php
                                                                the_post_thumbnail('large', array(
                                                                    'alt' => the_title_attribute(array(
                                                                        'echo' => false,
                                                                    )),
                                                                ));
                                                                ?>
                                                            </a>
                                                            <?php if (newsreach_get_option('show_lightbox_image')) { ?>
                                                                <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                                    <?php newsreach_theme_svg('fullscreen'); ?>
                                                                </a>
                                                            <?php } ?>
                                                        </figure>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="entry-details">
                                                    <?php if ($enable_banner_cat_meta) { ?>
                                                        <div class="entry-categories">
                                                            <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                            <div class="newsreach-entry-categories">
                                                                <?php the_category(' '); ?>
                                                            </div>
                                                        </div><!-- .entry-categories -->
                                                    <?php } ?>

                                                    <header class="entry-header">
                                                        <?php the_title('<h2 class="entry-title entry-title-big"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                                    </header>

                                                    <footer class="entry-meta entry-meta-footer">
                                                        <?php if ($enable_banner_date_meta) {
                                                            newsreach_posted_on();
                                                        } ?>
                                                        <?php if ($enable_banner_author_meta) {
                                                            newsreach_posted_by();
                                                        } ?>
                                                    </footer>
                                                </div>
                                            </article>
                                        </div>
                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                            </div>
                            <div class="theme-swiper-control swiper-control">
                                <div class="swiper-button-prev banner-button-prev"></div>
                                <div class="swiper-button-next banner-button-next"></div>
                                <div class="swiper-pagination theme-swiper-pagination theme-main-pagination"></div>
                            </div>
                        </div>
                    </div>
                    <div class="column column-6 column-sm-12">
                        <div class="column-row column-row-small">
                            <?php
                            if ($grid_post_query_style_1->have_posts()) :
                                while ($grid_post_query_style_1->have_posts()) : $grid_post_query_style_1->the_post();
                                    ?>
                                    <div class="column column-6 column-xs-12">
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-slide theme-tiles-post'); ?>>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="entry-image">
                                                    <figure class="featured-media featured-media-smedium">
                                                        <a href="<?php the_permalink() ?>">
                                                            <?php
                                                            the_post_thumbnail('medium_large', array(
                                                                'alt' => the_title_attribute(array(
                                                                    'echo' => false,
                                                                )),
                                                            ));
                                                            ?>
                                                        </a>
                                                        <?php if (newsreach_get_option('show_lightbox_image')) { ?>
                                                            <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                                <?php newsreach_theme_svg('fullscreen'); ?>
                                                            </a>
                                                        <?php } ?>
                                                    </figure>
                                                </div>
                                            <?php endif; ?>
                                            <div class="entry-details">
                                                <?php if ($enable_banner_cat_meta) { ?>
                                                    <div class="entry-categories">
                                                        <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                        <div class="newsreach-entry-categories">
                                                            <?php the_category(' '); ?>
                                                        </div>
                                                    </div><!-- .entry-categories -->
                                                <?php } ?>
                                                <header class="entry-header">
                                                    <?php the_title('<h2 class="entry-title entry-title-small"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                                </header>
                                                <footer class="entry-meta entry-meta-footer">
                                                    <?php if ($enable_banner_date_meta) {
                                                        newsreach_posted_on();
                                                    } ?>
                                                    <?php if ($enable_banner_author_meta) {
                                                        newsreach_posted_by();
                                                    } ?>
                                                </footer>
                                            </div>
                                        </article>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php break;

    case 'style-2': ?>
        <section class="site-section site-banner-section site-banner-layout-2 ">
            <div class="wrapper">
                <div class="column-row column-row-small">
                    <div class="column column-4 column-sm-12">
                        <?php if ($banner_section_title_1) { ?>
                            <header class="section-header site-section-header">
                                <h2 class="site-section-title">
                                    <?php echo esc_html($banner_section_title_1); ?>
                                </h2>
                            </header>
                        <?php } ?>

                        <div class="column-row column-row-small">
                            <?php
                            if ($grid_post_query->have_posts()) :
                                while ($grid_post_query->have_posts()) : $grid_post_query->the_post();
                            ?>
                                    <div class="column column-12 column-sm-6 column-xs-12">
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-slide theme-tiles-post'); ?>>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="entry-image">
                                                    <figure class="featured-media featured-media-smedium">
                                                        <a href="<?php the_permalink() ?>">
                                                            <?php
                                                            the_post_thumbnail('medium_large', array(
                                                                'alt' => the_title_attribute(array(
                                                                    'echo' => false,
                                                                )),
                                                            ));
                                                            ?>
                                                        </a>
                                                        <?php if (newsreach_get_option('show_lightbox_image')) { ?>
                                                            <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                                <?php newsreach_theme_svg('fullscreen'); ?>
                                                            </a>
                                                        <?php } ?>
                                                    </figure>
                                                </div>
                                            <?php endif; ?>
                                            <div class="entry-details">
                                                <?php if ($enable_banner_cat_meta) { ?>
                                                    <div class="entry-categories">
                                                        <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                        <div class="newsreach-entry-categories">
                                                            <?php the_category(' '); ?>
                                                        </div>
                                                    </div><!-- .entry-categories -->
                                                <?php } ?>
                                                <header class="entry-header">
                                                    <?php the_title('<h2 class="entry-title entry-title-medium"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                                </header>
                                                <footer class="entry-meta entry-meta-footer">
                                                    <?php if ($enable_banner_date_meta) {
                                                        newsreach_posted_on();
                                                    } ?>
                                                    <?php if ($enable_banner_author_meta) {
                                                        newsreach_posted_by();
                                                    } ?>
                                                </footer>
                                            </div>
                                        </article>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                    <div class="column column-8 column-sm-12">
                        <div class="column-row">
                            <div class="column column-7 column-sm-12">
                            <?php if ($banner_section_title_2) { ?>
                                <header class="section-header site-section-header">
                                    <h2 class="site-section-title">
                                        <?php echo esc_html($banner_section_title_2); ?>
                                    </h2>
                                </header>
                            <?php } ?>
                                <div class="main-banner-slider swiper">
                                    <div class="swiper-wrapper">
                                        <?php
                                        if ($banner_post_query->have_posts()) :
                                            while ($banner_post_query->have_posts()) : $banner_post_query->the_post();
                                        ?>
                                                <div class="swiper-slide">
                                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-shine theme-tiles-post'); ?>>
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <div class="entry-image">
                                                                <figure class="featured-media featured-media-big">
                                                                    <a href="<?php the_permalink() ?>">
                                                                        <?php
                                                                        the_post_thumbnail('large', array(
                                                                            'alt' => the_title_attribute(array(
                                                                                'echo' => false,
                                                                            )),
                                                                        ));
                                                                        ?>
                                                                    </a>
                                                                    <?php if (newsreach_get_option('show_lightbox_image')) { ?>
                                                                        <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                                            <?php newsreach_theme_svg('fullscreen'); ?>
                                                                        </a>
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="entry-details">
                                                            <?php if ($enable_banner_cat_meta) { ?>
                                                                <div class="entry-categories">
                                                                    <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                                    <div class="newsreach-entry-categories">
                                                                        <?php the_category(' '); ?>
                                                                    </div>
                                                                </div><!-- .entry-categories -->
                                                            <?php } ?>

                                                            <header class="entry-header">
                                                                <?php the_title('<h2 class="entry-title entry-title-big"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                                            </header>

                                                            <footer class="entry-meta entry-meta-footer">
                                                                <?php if ($enable_banner_date_meta) {
                                                                    newsreach_posted_on();
                                                                } ?>
                                                                <?php if ($enable_banner_author_meta) {
                                                                    newsreach_posted_by();
                                                                } ?>
                                                            </footer>
                                                        </div>
                                                    </article>
                                                </div>
                                        <?php
                                            endwhile;
                                            wp_reset_postdata();
                                        endif; ?>
                                    </div>
                                    <div class="theme-swiper-control swiper-control">
                                        <div class="swiper-button-prev banner-button-prev"></div>
                                        <div class="swiper-button-next banner-button-next"></div>
                                        <div class="swiper-pagination theme-swiper-pagination theme-main-pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="column column-5 column-sm-12">
                            <?php if ($banner_section_title_3) { ?>
                                <header class="section-header site-section-header">
                                    <h2 class="site-section-title">
                                        <?php echo esc_html($banner_section_title_3); ?>
                                    </h2>
                                </header>
                            <?php } ?>
                                <?php
                                if ($list_post_query->have_posts()) :
                                    while ($list_post_query->have_posts()) : $list_post_query->the_post();
                                ?>
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-zoom theme-list-post'); ?>>
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="entry-image">
                                                    <figure class="featured-media featured-media-thumbnail">
                                                        <a href="<?php the_permalink() ?>" class="featured-media-link">
                                                            <?php
                                                            the_post_thumbnail('thumbnail', array(
                                                                'alt' => the_title_attribute(array(
                                                                    'echo' => false,
                                                                )),
                                                            ));
                                                            ?>
                                                        </a>
                                                    </figure>
                                                </div>
                                            <?php } ?>
                                            <div class="entry-details">
                                                <header class="entry-header">
                                                    <?php the_title('<h3 class="entry-title entry-title-xsmall"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                                </header>
                                            </div>
                                        </article>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php break;

    case 'style-3': ?>
        <section class="site-section site-banner-section site-banner-layout-3">
            <div class="wrapper">
                <div class="column-grid column-grid-template">
                    <?php
                    $i = '1';
                    if ($banner_style_3_single_qury->have_posts()) :
                        while ($banner_style_3_single_qury->have_posts()) : $banner_style_3_single_qury->the_post();
                            $banner_article_class = "featured-media-medium";
                            $banner_title_class = "entry-title-medium";
                            if ($i == 1) {
                                $banner_article_class = "featured-media-large";
                                $banner_title_class = "entry-title-big";
                            }
                    ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-shine theme-tiles-post theme-article-post-' . $i); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="entry-image">
                                        <figure class="featured-media <?php echo esc_attr($banner_article_class); ?>">
                                            <a href="<?php the_permalink() ?>">
                                                <?php
                                                the_post_thumbnail('medium_large', array(
                                                    'alt' => the_title_attribute(array(
                                                        'echo' => false,
                                                    )),
                                                ));
                                                ?>
                                            </a>
                                            <?php if (newsreach_get_option('show_lightbox_image')) { ?>
                                                <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                    <?php newsreach_theme_svg('fullscreen'); ?>
                                                </a>
                                            <?php } ?>
                                        </figure>
                                    </div>
                                <?php endif; ?>
                                <div class="entry-details">
                                    <?php if ($enable_banner_cat_meta) { ?>
                                        <div class="entry-categories">
                                            <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                            <div class="newsreach-entry-categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                        </div><!-- .entry-categories -->
                                    <?php } ?>
                                    <header class="entry-header">
                                        <?php the_title('<h2 class="entry-title ' . $banner_title_class . ' "><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                    </header>
                                    <footer class="entry-meta entry-meta-footer">
                                        <?php if ($enable_banner_date_meta) {
                                            newsreach_posted_on();
                                        } ?>
                                        <?php if ($enable_banner_author_meta) {
                                            newsreach_posted_by();
                                        } ?>
                                    </footer>
                                </div>
                            </article>
                    <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </section>
<?php break;

    case 'style-4': ?>
        <section class="site-section site-banner-section site-banner-layout-4 ">
            <div class="wrapper">
                <div class="column-grid column-grid-template">
                    <?php
                    $i = '1';
                    if ($banner_query_style_4->have_posts()) :
                        while ($banner_query_style_4->have_posts()) : $banner_query_style_4->the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-shine theme-tiles-post theme-article-post-' . $i); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="entry-image">
                                        <figure class="featured-media featured-media-large">
                                            <a href="<?php the_permalink() ?>">
                                                <?php
                                                the_post_thumbnail('large', array(
                                                    'alt' => the_title_attribute(array(
                                                        'echo' => false,
                                                    )),
                                                ));
                                                ?>
                                            </a>
                                            <?php if (newsreach_get_option('show_lightbox_image')) { ?>
                                                <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                    <?php newsreach_theme_svg('fullscreen'); ?>
                                                </a>
                                            <?php } ?>
                                        </figure>
                                    </div>
                                <?php endif; ?>
                                <div class="entry-details">
                                    <?php if ($enable_banner_cat_meta) { ?>
                                        <div class="entry-categories">
                                            <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                            <div class="newsreach-entry-categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                        </div><!-- .entry-categories -->
                                    <?php } ?>
                                    <header class="entry-header">
                                        <?php the_title('<h2 class="entry-title entry-title-large"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                    </header>
                                    <footer class="entry-meta entry-meta-footer">
                                        <?php if ($enable_banner_date_meta) {
                                            newsreach_posted_on();
                                        } ?>
                                        <?php if ($enable_banner_author_meta) {
                                            newsreach_posted_by();
                                        } ?>
                                    </footer>
                                </div>
                            </article>
                            <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </section>
        <?php break;

    default:
        // code...
        break;
} ?>
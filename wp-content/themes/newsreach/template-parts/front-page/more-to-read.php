<?php

/**
 * Displays recommended post on footer.
 *
 * @package Newsreach
 */
$enable_date_meta = newsreach_get_option('enable_date_meta');
$enable_post_excerpt = newsreach_get_option('enable_post_excerpt');
$read_more_post_title = newsreach_get_option('read_more_post_title');
$read_more_style = newsreach_get_option('read_more_style');
$select_cat_for_read_more_post = newsreach_get_option('select_cat_for_read_more_post');
$article_class = 'article-has-effect mb-20';
$article_title_class = 'entry-title-small mt-10';
$post_thumbnail = 'featured-media-smedium';
$post_thumbnail_size = 'medium_large';
if ($read_more_style == 'style-2') {
    $article_class = 'theme-tiles-post';
    $article_title_class = 'entry-title-small';
    $post_thumbnail = 'featured-media-medium';
}
?>
<section class="site-section site-read-more-section">
    <div class="wrapper">

        <header class="section-header site-section-header">
            <h2 class="site-section-title">
                <?php echo esc_html($read_more_post_title); ?>
            </h2>
        </header>

        <div class="read-more-wrapper">
            <div class="read-more-slider swiper">
                <div class="swiper-wrapper">
                    <?php $more_to_read_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 9, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_read_more_post)));
                    if ($more_to_read_post_query->have_posts()) :
                        while ($more_to_read_post_query->have_posts()) : $more_to_read_post_query->the_post();
                            ?>
                            <div class="swiper-slide">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-zoom ' . $article_class); ?>>
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="entry-image">
                                            <figure class="featured-media <?php echo $post_thumbnail; ?>">
                                                <a href="<?php the_permalink() ?>" class="featured-media-link">
                                                    <?php
                                                    the_post_thumbnail($post_thumbnail_size, array(
                                                        'alt' => the_title_attribute(array(
                                                            'echo' => false,
                                                        )),
                                                    ));
                                                    ?>
                                                </a>
                                            </figure>

                                            <?php if ($read_more_style != 'style-2') { ?>
                                                <div class="entry-categories">
                                                    <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                    <div class="newsreach-entry-categories">
                                                        <?php the_category(' '); ?>
                                                    </div>
                                                </div><!-- .entry-categories -->
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <div class="entry-details">

                                        <?php if ($read_more_style == 'style-2') { ?>
                                            <div class="entry-categories">
                                                <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                <div class="newsreach-entry-categories">
                                                    <?php the_category(' '); ?>
                                                </div>
                                            </div><!-- .entry-categories -->
                                        <?php } ?>

                                        <header class="entry-header">
                                            <?php the_title('<h3 class="entry-title ' . $article_title_class . '"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                        </header>

                                        <div class="entry-meta">
                                            <?php if ($enable_date_meta) { ?>
                                                <div class="newsreach-meta post-date">
                                            <span class="meta-icon">
                                                <span class="screen-reader-text"><?php _e('Post Date', 'newsreach'); ?></span>
                                                <?php newsreach_theme_svg('calendar'); ?>
                                            </span>
                                                    <span class="meta-text">
                                                <?php echo esc_html(get_the_date()); ?>
                                            </span>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </article>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>

                    <?php endif; ?>
                </div>

            </div>
            <div class="theme-swiper-control swiper-control">
                <div class="swiper-button-prev more-button-prev swiper-button-transparent"></div>
                <div class="swiper-button-next more-button-next swiper-button-transparent"></div>
                <div class="swiper-pagination theme-swiper-pagination read-more-pagination"></div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="site-section-separator"></div>
    </div>
</section>

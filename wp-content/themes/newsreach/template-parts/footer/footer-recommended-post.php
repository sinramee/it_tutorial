<?php

/**
 * Displays recommended post on footer.
 *
 * @package Newsreach
 */
$enable_category_meta = newsreach_get_option('enable_category_meta');
$enable_date_meta = newsreach_get_option('enable_date_meta');
$enable_post_excerpt = newsreach_get_option('enable_post_excerpt');
$enable_author_meta = newsreach_get_option('enable_author_meta');
$footer_recommended_post_title = newsreach_get_option('footer_recommended_post_title');
$select_cat_for_footer_recommended_post = newsreach_get_option('select_cat_for_footer_recommended_post');
?>
<section class="site-section site-recommendation-section">
    <div class="wrapper">
        <div class="column-row">
            <div class="column column-12">
                <header class="section-header site-section-header">
                    <h2 class="site-section-title">
                        <?php echo esc_html($footer_recommended_post_title); ?>
                    </h2>
                </header>
            </div>
        </div>
        <div class="recommendation-wrapper">
            <div class="recommendation-slider swiper">
                <div class="swiper-wrapper">
                    <?php $footer_recommended_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 8, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_footer_recommended_post)));
                    if ($footer_recommended_post_query->have_posts()) :
                        while ($footer_recommended_post_query->have_posts()) : $footer_recommended_post_query->the_post();
                    ?>
                            <div class="swiper-slide">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-recommended-post article-has-effect article-effect-slide'); ?>>

                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="entry-image">
                                            <figure class="featured-media featured-media-medium">
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
                                            <?php if ($enable_category_meta) { ?>
                                                <div class="entry-categories">
                                                    <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                    <div class="newsreach-entry-categories">
                                                        <?php the_category(' '); ?>
                                                    </div>
                                                </div><!-- .entry-categories -->
                                            <?php } ?>
                                        </div>
                                    <?php endif; ?>

                                    <header class="entry-header">
                                        <?php the_title('<h3 class="entry-title entry-title-small"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                    </header>
                                    <?php if ($enable_post_excerpt) { ?>
                                        <div class="entry-content">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($enable_date_meta) {
                                        newsreach_posted_on();
                                    } ?>
                                    <?php if ($enable_author_meta) {
                                        newsreach_posted_by();
                                    } ?>
                                </article>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                </div>
            </div>
            <div class="theme-swiper-control swiper-control">
                <div class="swiper-button-prev recommendation-button-prev swiper-button-transparent"></div>
                <div class="swiper-button-next recommendation-button-next swiper-button-transparent"></div>
                <div class="swiper-pagination theme-swiper-pagination recommendation-pagination"></div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
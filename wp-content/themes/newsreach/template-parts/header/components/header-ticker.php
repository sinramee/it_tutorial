<?php
/**
 * Displays Header Ticker
 *
 * @package Newsreach
 */
$enable_ticker_post = newsreach_get_option('enable_ticker_post');
if (empty($enable_ticker_post)) {
    return;
}
$enable_ticker_post_image = newsreach_get_option('enable_ticker_post_image');
$ticker_post_category = newsreach_get_option('ticker_post_category');
$ticker_text = newsreach_get_option('ticker_text');
$ticker_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 9, 'post__not_in' => get_option("sticky_posts"), 'category__in' => $ticker_post_category));
if ($ticker_post_query->have_posts()): ?>
    <section class="site-section site-ticker-section">
        <div class="wrapper">
            <div class="column-row">
                <div class="column column-12">
                    <div class="marquee-content-container">
                        <?php if (!empty($ticker_text)) { ?>
                            <div class="marquee-content-left">
                                <h2 class="site-ticker-title">
                                    <span class="ticker-loader"></span>
                                    <?php echo esc_html($ticker_text); ?>
                                </h2>
                            </div>
                        <?php } ?>
                        <div class="marquee-content-right">
                            <div id="marquee">
                                <?php while ($ticker_post_query->have_posts()):
                                    $ticker_post_query->the_post();
                                    ?>
                                    <div class="theme-marquee-item">
                                        <article
                                                id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-list-post'); ?>>
                                            <?php if (has_post_thumbnail() && ($enable_ticker_post_image = true)) { ?>
                                                <div class="entry-image">
                                                    <figure class="featured-media">
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
                                                <?php the_title('<h3 class="entry-title entry-title-xsmall"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                            </div>
                                        </article>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
endif;

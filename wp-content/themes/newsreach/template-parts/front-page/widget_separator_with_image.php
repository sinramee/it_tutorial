<?php
/**
 * Displays recommended post on footer.
 *
 * @package Newsreach
 */
$enable_date_meta = newsreach_get_option('enable_date_meta');
$select_cat_for_widget_separator_section = newsreach_get_option('select_cat_for_widget_separator_section');
$upload_widget_separator_image = newsreach_get_option('upload_widget_separator_image');
?>
    <section class="site-section site-bg-separator <?php if (!empty($upload_widget_separator_image)) { echo 'data-bg'; } ?>" data-background="<?php echo esc_url($upload_widget_separator_image); ?>">
    <div class="wrapper">
        <div class="column-row">
        <?php $article_with_separator_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_widget_separator_section)));
        if ($article_with_separator_post_query->have_posts()) :
            while ($article_with_separator_post_query->have_posts()) : $article_with_separator_post_query->the_post();
                ?>
                <div class="column column-3 column-sm-6 column-xs-12">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-bg-light'); ?>>
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="entry-image">
                                <figure class="featured-media featured-media-small">
                                    <a href="<?php the_permalink() ?>" class="featured-media-link">
                                        <?php
                                        the_post_thumbnail('medium', array(
                                            'alt' => the_title_attribute(array(
                                                'echo' => false,
                                            )),
                                        ));
                                        ?> <!--  "thumbnail" or "medium"-->
                                    </a>
                                </figure>
                                <div class="entry-categories">
                                    <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                    <div class="newsreach-entry-categories">
                                        <?php the_category(' '); ?>
                                    </div>
                                </div><!-- .entry-categories -->
                            </div>
                        <?php } ?>
                        <div class="entry-details">

                            <header class="entry-header">
                                <?php the_title('<h3 class="entry-title entry-title-small"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
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
        </div>
    </div>
    </section>
<?php endif; ?>
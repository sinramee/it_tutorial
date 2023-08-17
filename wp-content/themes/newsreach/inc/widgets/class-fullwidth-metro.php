<?php
if (!defined('ABSPATH')) {
    exit;
}
class Newsreach_Fullwidth_Metro extends Newsreach_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'newsreach_fullwidth_metro';
        $this->widget_description = __("Displays Metro Tiles Layout of Posts", 'newsreach');
        $this->widget_id = 'newsreach-fullwidth-metro';
        $this->widget_name = __('Newsreach: Fullwidth Metro Tiles', 'newsreach');
        $this->settings = array(
            'title_1' => array(
                'type' => 'text',
                'label' => __('Title', 'newsreach'),
                'std' => __('Fullwidth Metro Tiles Widget', 'newsreach'),
            ),
            'select_category' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('Select Category', 'newsreach'),
                'desc' => __('If you don\'t wish to specify a category for the posts, please leave this field empty.', 'newsreach'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'newsreach'),
                ),
            ),
            'show_category' => array(
                'type' => 'checkbox',
                'label' => __('Show Category', 'newsreach'),
                'std' => true,
            ),
            'show_date' => array(
                'type' => 'checkbox',
                'label' => __('Show Date', 'newsreach'),
                'std' => true,
            ),
            'date_format' => array(
                'type' => 'select',
                'label' => __('Date Format', 'newsreach'),
                'options' => array(
                    'format_1' => __('Format 1', 'newsreach'),
                    'format_2' => __('Format 2', 'newsreach'),
                ),
                'std' => 'format_1',
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'newsreach'),
                'options' => array(
                    'style_1' => __('Style 1', 'newsreach'),
                    'style_2' => __('Style 2', 'newsreach'),
                    'style_3' => __('Style 3', 'newsreach'),
                ),
                'std' => 'style_1',
            ),
        );
        parent::__construct();
    }
    /**
     * Output widget.
     *
     * @param array $args
     * @param array $instance
     * @see WP_Widget
     *
     */
    public function widget($args, $instance)
    {
        ob_start();
        echo $args['before_widget'];
        do_action('newsreach_before_single_column_categories');
        ?>
        <div class="theme-widget-panel">
            <div class="column-row">
                <?php $single_column_single_arg = array(
                    'posts_per_page' => 5,
                    'post_status' => 'publish',
                    'no_found_rows' => 1,
                    'ignore_sticky_posts' => 1,
                );
                if (!empty($instance['select_category']) && -1 != $instance['select_category'] && 0 != $instance['select_category']) {
                    $single_column_single_arg['tax_query'][] = array(
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $instance['select_category'],
                    );
                }
                $style = $instance['style']; ?>
                <div class="column column-12">
                    <header class="theme-widget-header">
                        <div class="theme-widget-title">
                            <h2 class="widget-title">
                                <?php echo $instance['title_1']; ?>
                            </h2>
                        </div>
                    </header>

                    <div class="theme-widget-content fullwidth-widget-content">
                        <div class="theme-widget-panel">
                            <div class="theme-metro-widget <?php echo esc_attr($style); ?>">
                            <?php
                            $newsreach_single_column_single_query = new WP_Query($single_column_single_arg);
                            if ($newsreach_single_column_single_query->have_posts()):
                                while ($newsreach_single_column_single_query->have_posts()):
                                    $newsreach_single_column_single_query->the_post();
                                    ?>
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-shine theme-tiles-post'); ?>>
                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
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
                                                        <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                                           class="featured-media-fullscreen" data-glightbox="">
                                                            <?php newsreach_theme_svg('fullscreen'); ?>
                                                        </a>
                                                    <?php } ?>
                                                </figure>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="entry-details">
                                            <?php if ($instance['show_category']) { ?>
                                                <div class="entry-categories">
                                                    <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                    <div class="newsreach-entry-categories">
                                                        <?php the_category(' '); ?>
                                                    </div>
                                                </div><!-- .entry-categories -->
                                            <?php } ?>
                                            <header class="entry-header mb-10">
                                                <?php the_title('<h3 class="entry-title entry-title-medium"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                            </header>
                                            <?php
                                            if ($instance['show_date']) {
                                                ?>
                                                <div class="newsreach-meta post-date">
                                                    <span class="meta-icon">
                                                        <span class="screen-reader-text"><?php _e('Post Date', 'newsreach'); ?></span>
                                                        <?php newsreach_theme_svg('calendar'); ?>
                                                    </span>
                                                    <span class="meta-text">
                                                        <?php
                                                        $date_format = $instance['date_format'];
                                                        if ('format_1' == $date_format) {
                                                            echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newsreach'));
                                                        } else {
                                                            echo esc_html(get_the_date());
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </article>
                                <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        do_action('newsreach_after_single_column_categories');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}
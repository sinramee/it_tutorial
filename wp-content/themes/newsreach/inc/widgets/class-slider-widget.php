<?php
if (!defined('ABSPATH')) {
    exit;
}
class Newsreach_Slider_Widget extends Newsreach_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'newsreach_slider_widget';
        $this->widget_description = __("Displays Slider colum with multiple category widget", 'newsreach');
        $this->widget_id = 'newsreach-slider-widget';
        $this->widget_name = __('Newsreach: Slider', 'newsreach');
        $this->settings = array(
            'title_1' => array(
                'type' => 'text',
                'label' => __('First Column: Title', 'newsreach'),
                'std' => __('Slider Posts Widget', 'newsreach'),

            ),
            'select_category' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('First Column: Select Category', 'newsreach'),
                'desc' => __('If you don\'t wish to specify a category for the posts, please leave this field empty.', 'newsreach'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'newsreach'),
                ),
            ),
            'show_excerpt' => array(
                'type' => 'checkbox',
                'label' => __('Show Excerpt', 'newsreach'),
                'std' => true,
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
                'std' => 'format_2',
            ),
            'show_arrow' => array(
                'type' => 'checkbox',
                'label' => __('Show Arrow', 'newsreach'),
                'std' => true,
            ),
            'show_dot' => array(
                'type' => 'checkbox',
                'label' => __('Show Dots', 'newsreach'),
                'std' => true,
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
        do_action('newsreach_before_slider');
        ?>
        <div class="theme-widget-panel">
            <?php $slider_column_slider_arg = array(
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'no_found_rows' => 1,
                'ignore_sticky_posts' => 1,
            );
            if (!empty($instance['select_category']) && -1 != $instance['select_category'] && 0 != $instance['select_category']) {
                $slider_column_slider_arg['tax_query'][] = array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $instance['select_category'],
                );
            }
            ?>

            <?php if ($instance['title_1']) : ?>
                <header class="theme-widget-header">
                    <h2 class="widget-title"><?php echo $instance['title_1']; ?></h2>
                </header>
            <?php endif; ?>

            <div class="theme-widget-content">
                <div class="theme-widget-slider swiper">
                    <div class="swiper-wrapper">
                        <?php
                        $newsreach_slider_column_slider_query = new WP_Query($slider_column_slider_arg);
                        if ($newsreach_slider_column_slider_query->have_posts()):
                            while ($newsreach_slider_column_slider_query->have_posts()):
                                $newsreach_slider_column_slider_query->the_post();
                                ?>
                                <div class="swiper-slide widget-slider-slide">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article theme-tiles-post'); ?>>
                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
                                            <div class="entry-image">
                                                <figure class="featured-media featured-media-large">
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
                                            <div class="entry-details-wrapper">
                                                <?php if ($instance['show_category']) { ?>
                                                    <div class="entry-categories">
                                                        <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                        <div class="newsreach-entry-categories">
                                                            <?php the_category(' '); ?>
                                                        </div>
                                                    </div><!-- .entry-categories -->
                                                <?php } ?>
                                                <header class="entry-header">
                                                    <?php the_title('<h3 class="entry-title entry-title-big"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
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
                                                <?php if ($instance['show_excerpt']) { ?>
                                                            <div class="entry-content">
                                                                <?php the_excerpt(); ?>
                                                            </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                                            
                    <?php if (!empty($instance['show_arrow']) || !empty($instance['show_dot'])) { ?>
                        <div class="theme-swiper-control swiper-control">
                            <?php if (!empty($instance['show_arrow'])){ ?>
                                <div class="swiper-button-prev widget-slider-prev"></div>
                                <div class="swiper-button-next widget-slider-next"></div>
                            <?php } ?>
                            <?php if (!empty($instance['show_dot'])){ ?>
                                <div class="swiper-pagination theme-swiper-pagination widget-slider-pagination"></div>
                            <?php } ?>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        do_action('newsreach_after_slider');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}
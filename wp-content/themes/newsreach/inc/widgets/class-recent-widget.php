<?php
if (!defined('ABSPATH')) {
    exit;
}

class Newsreach_Recent_Posts extends Newsreach_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_newsreach_recent_posts';
        $this->widget_description = __("Displays recent posts with an image", 'newsreach');
        $this->widget_id = 'newsreach_recent_posts';
        $this->widget_name = __('Newsreach: Recent Posts', 'newsreach');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'newsreach'),
                'std' => __('Recent Posts Widget', 'newsreach'),
            ),
            'category' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('Select Category', 'newsreach'),
                'desc' => __('Leave empty if you don\'t want the posts to be category specific', 'newsreach'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'newsreach'),
                ),
            ),
            'number' => array(
                'type' => 'number',
                'step' => 1,
                'min' => 1,
                'max' => '',
                'std' => 5,
                'label' => __('Number of posts to show', 'newsreach'),
            ),
            'orderby' => array(
                'type' => 'select',
                'std' => 'date',
                'label' => __('Order by', 'newsreach'),
                'options' => array(
                    'date' => __('Date', 'newsreach'),
                    'ID' => __('ID', 'newsreach'),
                    'title' => __('Title', 'newsreach'),
                    'rand' => __('Random', 'newsreach'),
                ),
            ),
            'order' => array(
                'type' => 'select',
                'std' => 'desc',
                'label' => __('Order', 'newsreach'),
                'options' => array(
                    'asc' => __('ASC', 'newsreach'),
                    'desc' => __('DESC', 'newsreach'),
                ),
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
                ),
                'std' => 'style_1',
            ),
        );
        parent::__construct();
    }

    /**
     * Query the posts and return them.
     * @param array $args
     * @param array $instance
     * @return WP_Query
     */
    public function get_posts($args, $instance)
    {
        $number = !empty($instance['number']) ? absint($instance['number']) : $this->settings['number']['std'];
        $orderby = !empty($instance['orderby']) ? sanitize_text_field($instance['orderby']) : $this->settings['orderby']['std'];
        $order = !empty($instance['order']) ? sanitize_text_field($instance['order']) : $this->settings['order']['std'];
        $query_args = array(
            'posts_per_page' => $number,
            'post_status' => 'publish',
            'no_found_rows' => 1,
            'orderby' => $orderby,
            'order' => $order,
            'ignore_sticky_posts' => 1
        );
        if (!empty($instance['category']) && -1 != $instance['category'] && 0 != $instance['category']) {
            $query_args['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $instance['category'],
            );
        }
        return new WP_Query(apply_filters('newsreach_recent_posts_query_args', $query_args));
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
        if (($posts = $this->get_posts($args, $instance)) && $posts->have_posts()) {
            echo $args['before_widget'];
            do_action('newsreach_before_recent_posts_with_image');
            $style = $instance['style'];
            ?>
            <?php if ($instance['title']) : ?>
                <header class="theme-widget-header">
                    <h2 class="widget-title"><?php echo esc_html($instance['title']); ?></h2>
                </header>
            <?php endif; ?>
            <div class="theme-recent-widget theme-widget-list <?php echo esc_attr($style); ?>">
                <?php
                while ($posts->have_posts()): $posts->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article theme-list-post'); ?>>
                        <?php
                        if (has_post_thumbnail()) {
                            ?>
                            <div class="entry-image">
                                <figure class="featured-media featured-media-thumbnail">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                        the_post_thumbnail('thumbnail', array(
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
                            <?php
                        }
                        ?>
                        <div class="entry-details">
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

                            <header class="entry-header">
                            <?php the_title( '<h3 class="entry-title entry-title-xsmall"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                            </header>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
            <?php
            do_action('newsreach_after_recent_posts_with_image');
            echo $args['after_widget'];
        }
        echo ob_get_clean();
    }
}
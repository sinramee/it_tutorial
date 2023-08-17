<?php
if (!defined('ABSPATH')) {
    exit;
}

class Newsreach_Double_Column_Categories extends Newsreach_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'newsreach_double_column_widget';
        $this->widget_description = __("Displays Double colum with multiple category widget", 'newsreach');
        $this->widget_id = 'newsreach-double-column-widget';
        $this->widget_name = __('Newsreach: Double Categories', 'newsreach');
        $this->settings = array(
            'title_1' => array(
                'type' => 'text',
                'label' => __('First Column: Title', 'newsreach'),
                'std' => __('Double Categories Post Widget 1', 'newsreach'),

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
            'title_2' => array(
                'type' => 'text',
                'label' => __('Second Column: Title', 'newsreach'),
                'std' => __('Double Categories Post Widget 2', 'newsreach'),
            ),
            'select_category_1' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('Second Column: Select Category', 'newsreach'),
                'desc' => __('If you don\'t wish to specify a category for the posts, please leave this field empty.', 'newsreach'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'newsreach'),
                ),
            ),
            'show_featured_post' => array(
                'type' => 'checkbox',
                'label' => __('Disable Featured Post', 'newsreach'),
                'std' => false,
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
            'show_excerpt' => array(
                'type' => 'checkbox',
                'label' => __('Show Excerpt', 'newsreach'),
                'std' => false,
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
            'show_horizontal' => array(
                'type' => 'checkbox',
                'label' => __('Horizontal Layout', 'newsreach'),
                'std' => false,
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
        do_action('newsreach_before_double_column_categories');
        ?>
        <div class="theme-widget-panel">
        <div class="column-row">

            <?php for ($i=1; $i < 3 ; $i++) {
            $double_column_single_arg = array(
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'no_found_rows' => 1,
                'ignore_sticky_posts' => 1,
            );
            if (!empty($instance['select_category_'.$i]) && -1 != $instance['select_category_'.$i] && 0 != $instance['select_category_'.$i]) {
                $double_column_single_arg['tax_query'][] = array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $instance['select_category'],
                );
            }
            $style = $instance['style'];
            $column_class='column-6';

            if ($instance['show_horizontal'] == true) {
                $column_class='column-12 widget-column-horizontal';
            }


            ?>





            <div class="column <?php echo esc_attr($column_class);?> column-sm-12">
                <header class="theme-widget-header">
                    <h2 class="widget-title"><?php echo $instance['title_'.$i]; ?></h2>
                </header>
                <div class="theme-widget-content">
                    <?php
                    $count = 1;
                    if ($instance['show_featured_post'] == true) {
                    $count = 2; ?>
                    <div class="theme-double-categories-widget theme-widget-list <?php echo esc_attr($style); ?>">
                        <?php }
                        $newsreach_double_column_single_query = new WP_Query($double_column_single_arg);
                        if ($newsreach_double_column_single_query->have_posts()):
                            while ($newsreach_double_column_single_query->have_posts()):
                                $newsreach_double_column_single_query->the_post();
                                ?>
                                <?php if ($count == 1) { ?>
                                <div class="theme-double-categories-widget theme-widget-focus">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect'); ?>>
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
                                                        <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                            <?php newsreach_theme_svg('fullscreen'); ?>
                                                        </a>
                                                    <?php } ?>
                                                </figure>
                                                <?php if ($instance['show_category']) { ?>
                                                    <div class="entry-categories">
                                                        <span class="screen-reader-text"><?php _e('Categories', 'newsreach'); ?></span>
                                                        <div class="newsreach-entry-categories">
                                                            <?php the_category(' '); ?>
                                                        </div>
                                                    </div><!-- .entry-categories -->
                                                <?php } ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="entry-details mt-15">
                                            <?php
                                            if ($instance['show_date']) {
                                                ?>
                                                <div class="newsreach-meta post-date mb-15">
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
                                                <?php the_title( '<h3 class="entry-title entry-title-medium"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                            </header>

                                            <?php if ($instance['show_excerpt']) { ?>
                                                <div class="entry-content">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </article>
                                </div>
                                <div class="theme-double-categories-widget theme-widget-list <?php echo esc_attr($style); ?>">
                                <?php $count++; } else { ?>
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
                                        <header class="entry-header mb-10">
                                            <?php the_title( '<h3 class="entry-title entry-title-small"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
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
                                <?php if ($newsreach_double_column_single_query->current_post +1 == $newsreach_double_column_single_query->post_count) { ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <?php } ?>


            </div>
        </div>
        <?php
        do_action('newsreach_after_double_column_categories');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}
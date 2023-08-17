<?php

$is_sticky = newsreach_get_option('enable_sticky_menu');


$enable_dark_mode = newsreach_get_option('enable_dark_mode');
$enable_dark_mode_switcher = newsreach_get_option('enable_dark_mode_switcher');

$enable_search = newsreach_get_option('enable_search_on_header');

?>
<div class="site-branding-center">
    <div class="wrapper">
        <?php get_template_part('template-parts/header/site-branding'); ?>
    </div>
</div>


<div class="masthead-main-navigation <?php echo ($is_sticky) ? 'has-sticky-header' : ''; ?>">
    <div class="wrapper">
        <div class="site-header-wrapper">

            <?php if (is_active_sidebar('newsreach-offcanvas-widget')): ?>
                <div class="site-header-left">
                    <button id="theme-offcanvas-widget-button" class="theme-button theme-button-transparent theme-button-offcanvas">
                        <span class="screen-reader-text"><?php _e('Offcanvas Widget', 'newsreach'); ?></span>
                        <span class="toggle-icon"><?php newsreach_theme_svg('menu-alt'); ?></span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="site-header-center">

                <div id="site-navigation" class="main-navigation theme-primary-menu">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        ?>
                        <nav class="primary-menu-wrapper"
                             aria-label="<?php echo esc_attr_x('Primary', 'menu', 'newsreach'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary-menu'
                                    )
                                );
                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->
                        <?php
                    } else { ?>
                        <nav class="primary-menu-wrapper"
                             aria-label="<?php echo esc_attr_x('Primary', 'menu', 'newsreach'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                    )
                                );

                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->

                    <?php } ?>
                </div><!-- .main-navigation -->
            </div>

            <div class="site-header-right">
                <?php $blog_mini_cart = newsreach_get_option('enable_mini_cart_header');
                if ($blog_mini_cart && class_exists('WooCommerce')) {
                    newsreach_woocommerce_cart_count();
                } ?>

                <?php
                $enable_random_post = newsreach_get_option('enable_random_post');
                if ($enable_random_post) {
                    $random_post_category = newsreach_get_option('random_post_category');
                    $rand_posts_arg = array(
                        'posts_per_page' => 1,
                        'orderby' => 'rand'
                    );
                    if ($random_post_category) {
                        $rand_posts_arg['cat'] = absint($random_post_category);
                    }
                    $rand_posts = get_posts($rand_posts_arg);

                    if ($rand_posts) {
                        ?>
                        <a href="<?php echo esc_url(get_permalink($rand_posts[0]->ID)); ?>"
                           class="theme-button theme-button-transparent theme-button-shuffle">
                            <span class="screen-reader-text"><?php _e('Shuffle', 'newsreach'); ?></span>
                            <?php newsreach_theme_svg('shuffle'); ?>
                        </a>
                        <?php
                    }
                }
                ?>

                <button id="theme-toggle-offcanvas-button"
                        class="hide-on-desktop theme-button theme-button-transparent theme-button-offcanvas"
                        aria-expanded="false" aria-controls="theme-offcanvas-navigation">
                    <span class="screen-reader-text"><?php _e('Menu', 'newsreach'); ?></span>
                    <span class="toggle-icon"><?php newsreach_theme_svg('menu'); ?></span>
                </button>

                <?php if ($enable_dark_mode && $enable_dark_mode_switcher) : ?>
                    <button id="theme-toggle-mode-button"
                            class="theme-button theme-button-transparent theme-button-colormode"
                            title="<?php _e('Toggle light/dark mode', 'newsreach'); ?>" aria-label="auto"
                            aria-live="polite">
                        <span class="screen-reader-text"><?php _e('Switch color mode', 'newsreach'); ?></span>
                        <span id="colormode-switch-area">
                            <span class="mode-icon-change"></span>
                            <span id="mode-icon-switch"></span>
                        </span>
                    </button>
                <?php endif; ?>

                <?php if ( $enable_search ) : ?>
                    <button id="theme-toggle-search-button"
                            class="theme-button theme-button-transparent theme-button-search" aria-expanded="false"
                            aria-controls="theme-header-search">
                        <span class="screen-reader-text"><?php _e('Search', 'newsreach'); ?></span>
                        <?php newsreach_theme_svg('search'); ?>
                    </button>
                <?php endif; ?>

            </div>
        </div>
    </div>

</div>
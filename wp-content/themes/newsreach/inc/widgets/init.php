<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-base/widgetbase.php';

require get_template_directory() . '/inc/widgets/class-recent-widget.php';
require get_template_directory() . '/inc/widgets/class-social-widget.php';
require get_template_directory() . '/inc/widgets/class-author-widget.php';
require get_template_directory() . '/inc/widgets/class-tab-widget.php';
require get_template_directory() . '/inc/widgets/class-double-column-categories.php';
require get_template_directory() . '/inc/widgets/class-single-column-categories.php';
require get_template_directory() . '/inc/widgets/class-fullwidth-metro.php';
require get_template_directory() . '/inc/widgets/class-slider-widget.php';
require get_template_directory() . '/inc/widgets/class-carousel-widget.php';
require get_template_directory() . '/inc/widgets/class-fullwidth-widget.php';

/* Register site widgets */
if ( ! function_exists( 'newsreach_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function newsreach_widgets() {
        register_widget( 'Newsreach_Recent_Posts' );
        register_widget( 'Newsreach_Social_Menu' );
        register_widget( 'Newsreach_Author_Info' );
        register_widget( 'Newsreach_Tab_Posts' );
        register_widget( 'Newsreach_Double_Column_Categories' );
        register_widget( 'Newsreach_Single_Column_Categories' );
        register_widget( 'Newsreach_Slider_Widget' );
        register_widget( 'Newsreach_Carousel_Widget' );
        register_widget( 'Newsreach_Fullwidth_Widget' );
        register_widget( 'Newsreach_Fullwidth_Metro' );
    }
endif;
add_action( 'widgets_init', 'newsreach_widgets' );
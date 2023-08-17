<?php

$wp_customize->add_section(
    'single_options' ,
    array(
        'title' => __( 'Single Options', 'newsreach' ),
        'panel' => 'newsreach_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'newsreach_options[single_sidebar_layout]',
    array(
        'default'           => $default_options['single_sidebar_layout'],
        'sanitize_callback' => 'newsreach_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Newsreach_Radio_Image_Control(
        $wp_customize,
        'newsreach_options[single_sidebar_layout]',
        array(
            'label' => __( 'Single Sidebar Layout', 'newsreach' ),
            'section' => 'single_options',
            'choices' => newsreach_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'newsreach_options[hide_single_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_single_sidebar_mobile'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[hide_single_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Single Sidebar on Mobile', 'newsreach' ),
        'section'     => 'single_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_single_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_single_1',
        array(
            'settings' => 'newsreach_section_seperator_single_1',
            'section'       => 'single_options',
        )
    )
);

/* Post Meta */
$wp_customize->add_setting(
    'newsreach_options[single_post_meta]',
    array(
        'default'           => $default_options['single_post_meta'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Newsreach_Checkbox_Multiple(
        $wp_customize,
        'newsreach_options[single_post_meta]',
        array(
            'label' => __( 'Single Post Meta', 'newsreach' ),
            'description'   => __( 'Choose the post meta you want to be displayed on post detail page', 'newsreach' ),
            'section' => 'single_options',
            'choices' => array(
                'author' => __( 'Author', 'newsreach' ),
                'date' => __( 'Date', 'newsreach' ),
                'comment' => __( 'Comment', 'newsreach' ),
                'category' => __( 'Category', 'newsreach' ),
                'tags' => __( 'Tags', 'newsreach' ),
            )
        )
    )
);



$wp_customize->add_setting(
    'newsreach_section_seperator_single_5',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_single_5',
        array(
            'settings' => 'newsreach_section_seperator_single_5',
            'section'       => 'single_options',
        )
    )
);


$wp_customize->add_setting(
    'newsreach_options[show_sticky_article_navigation]',
    array(
        'default'           => $default_options['show_sticky_article_navigation'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[show_sticky_article_navigation]',
    array(
        'label'    => __( 'Show Sticky Article Navigation', 'newsreach' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Show Author Info Box start
*-------------------------------*/
$wp_customize->add_setting(
    'newsreach_section_seperator_single_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_single_2',
        array(
            'settings' => 'newsreach_section_seperator_single_2',
            'section'       => 'single_options',
        )
    )
);

$wp_customize->add_setting(
    'newsreach_options[show_author_info]',
    array(
        'default'           => $default_options['show_author_info'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[show_author_info]',
    array(
        'label'    => __( 'Show Author Info Box', 'newsreach' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_single_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_single_3',
        array(
            'settings' => 'newsreach_section_seperator_single_3',
            'section'       => 'single_options',
        )
    )
);

/*Show Related Posts
*-------------------------------*/
$wp_customize->add_setting(
    'newsreach_options[show_related_posts]',
    array(
        'default'           => $default_options['show_related_posts'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[show_related_posts]',
    array(
        'label'    => __( 'Show Related Posts', 'newsreach' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Related Posts Text.*/
$wp_customize->add_setting(
    'newsreach_options[related_posts_text]',
    array(
        'default'           => $default_options['related_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[related_posts_text]',
    array(
        'label'    => __( 'Related Posts Text', 'newsreach' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'newsreach_is_related_posts_enabled',
    )
);

/* Number of Related Posts */
$wp_customize->add_setting(
    'newsreach_options[no_of_related_posts]',
    array(
        'default'           => $default_options['no_of_related_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'newsreach_options[no_of_related_posts]',
    array(
        'label'       => __( 'Number of Related Posts', 'newsreach' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'newsreach_is_related_posts_enabled',
    )
);

/*Related Posts Orderby*/
$wp_customize->add_setting(
    'newsreach_options[related_posts_orderby]',
    array(
        'default'           => $default_options['related_posts_orderby'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[related_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'newsreach' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'newsreach'),
            'id' => __('ID', 'newsreach'),
            'title' => __('Title', 'newsreach'),
            'rand' => __('Random', 'newsreach'),
        ),
        'active_callback' => 'newsreach_is_related_posts_enabled',
    )
);

/*Related Posts Order*/
$wp_customize->add_setting(
    'newsreach_options[related_posts_order]',
    array(
        'default'           => $default_options['related_posts_order'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[related_posts_order]',
    array(
        'label'       => __( 'Order', 'newsreach' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'newsreach'),
            'desc' => __('DESC', 'newsreach'),
        ),
        'active_callback' => 'newsreach_is_related_posts_enabled',
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_single_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_single_4',
        array(
            'settings' => 'newsreach_section_seperator_single_4',
            'section'       => 'single_options',
        )
    )
);
/*Show Author Posts
*-----------------------------------------*/
$wp_customize->add_setting(
    'newsreach_options[show_author_posts]',
    array(
        'default'           => $default_options['show_author_posts'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[show_author_posts]',
    array(
        'label'    => __( 'Show Author Posts', 'newsreach' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Author Posts Text.*/
$wp_customize->add_setting(
    'newsreach_options[author_posts_text]',
    array(
        'default'           => $default_options['author_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[author_posts_text]',
    array(
        'label'    => __( 'Author Posts Text', 'newsreach' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'newsreach_is_author_posts_enabled',
    )
);

/* Number of Author Posts */
$wp_customize->add_setting(
    'newsreach_options[no_of_author_posts]',
    array(
        'default'           => $default_options['no_of_author_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'newsreach_options[no_of_author_posts]',
    array(
        'label'       => __( 'Number of Author Posts', 'newsreach' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'newsreach_is_author_posts_enabled',
    )
);

/*Author Posts Orderby*/
$wp_customize->add_setting(
    'newsreach_options[author_posts_orderby]',
    array(
        'default'           => $default_options['author_posts_orderby'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[author_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'newsreach' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'newsreach'),
            'id' => __('ID', 'newsreach'),
            'title' => __('Title', 'newsreach'),
            'rand' => __('Random', 'newsreach'),
        ),
        'active_callback' => 'newsreach_is_author_posts_enabled',
    )
);

/*Author Posts Order*/
$wp_customize->add_setting(
    'newsreach_options[author_posts_order]',
    array(
        'default'           => $default_options['author_posts_order'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[author_posts_order]',
    array(
        'label'       => __( 'Order', 'newsreach' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'newsreach'),
            'desc' => __('DESC', 'newsreach'),
        ),
        'active_callback' => 'newsreach_is_author_posts_enabled',
    )
);
<?php
$widgets_link = admin_url( 'widgets.php' );

/*Add footer theme option*/
$wp_customize->add_section(
    'footer_options' ,
    array(
        'title' => __( 'Footer Options', 'newsreach' ),
        'panel' => 'newsreach_option_panel',
    )
);

/* Footer Background Color*/
$wp_customize->add_setting(
    'newsreach_options[footer_bg_color]',
    array(
        'default' => $default_options['footer_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'newsreach_options[footer_bg_color]',
        array(
            'label' => __('Footer Background Color', 'newsreach'),
            'section' => 'footer_options',
            'type' => 'color',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'newsreach_options[enable_footer_sticky]',
    array(
        'default'           => $default_options['enable_footer_sticky'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_footer_sticky]',
    array(
        'label'    => __( 'Enable Sticky Footer', 'newsreach' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_footer_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_footer_1',
        array(
            'settings' => 'newsreach_section_seperator_footer_1',
            'section' => 'footer_options',
        )
    )
);

/*Option to choose footer column layout*/
$wp_customize->add_setting(
    'newsreach_options[footer_column_layout]',
    array(
        'default'           => $default_options['footer_column_layout'],
        'sanitize_callback' => 'newsreach_sanitize_radio',
    )
);

$wp_customize->add_control(
    new Newsreach_Radio_Image_Control(
        $wp_customize,
        'newsreach_options[footer_column_layout]',
        array(
            'label'       => __( 'Footer Column Layout', 'newsreach' ),
            'description' => sprintf( __( 'Footer widgetareas used will vary based on the footer column layout chosen. Head over to  <a href="%s" target="_blank">widgets</a> to see which footer widgetareas are used if you change the layout.', 'newsreach' ), $widgets_link ),
            'section'     => 'footer_options',
            'choices' => newsreach_get_footer_layouts()
        )
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_footer_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_footer_2',
        array(
            'settings' => 'newsreach_section_seperator_footer_2',
            'section' => 'footer_options',
        )
    )
);
/**/

/*Copyright Text.*/
$wp_customize->add_setting(
    'newsreach_options[copyright_text]',
    array(
        'default'           => $default_options['copyright_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[copyright_text]',
    array(
        'label'    => __( 'Copyright Text', 'newsreach' ),
        'section'  => 'footer_options',
        'type'     => 'text',
    )
);

/*Todays Date Format*/
$wp_customize->add_setting(
    'newsreach_options[copyright_date_format]',
    array(
        'default'           => $default_options['copyright_date_format'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[copyright_date_format]',
    array(
        'label'    => __( 'Todays Date Format', 'newsreach' ),
        'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'newsreach' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
        'section'  => 'footer_options',
        'type'     => 'text',
    )
);

/*Enable footer credit*/
$wp_customize->add_setting(
    'newsreach_options[enable_footer_credit]',
    array(
        'default'           => $default_options['enable_footer_credit'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_footer_credit]',
    array(
        'label'    => __( 'Enable Footer Credit', 'newsreach' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_footer_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_footer_3',
        array(
            'settings' => 'newsreach_section_seperator_footer_3',
            'section' => 'footer_options',
        )
    )
);
/*Enable Footer Nav*/
$wp_customize->add_setting(
    'newsreach_options[enable_footer_nav]',
    array(
        'default'           => $default_options['enable_footer_nav'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_footer_nav]',
    array(
        'label'    => __( 'Show Footer Nav Menu', 'newsreach' ),
        'description' => sprintf( __( 'You can add/edit footer nav menu from <a href="%s">here</a>.', 'newsreach' ), "javascript:wp.customize.control( 'nav_menu_locations[footer-menu]' ).focus();" ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Enable Footer Social Nav*/
$wp_customize->add_setting(
    'newsreach_options[enable_footer_social_nav]',
    array(
        'default'           => $default_options['enable_footer_social_nav'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_footer_social_nav]',
    array(
        'label'    => __( 'Show Social Nav Menu in Footer', 'newsreach' ),
        'description' => sprintf( __( 'You can add/edit social nav menu from <a href="%s">here</a>.', 'newsreach' ), "javascript:wp.customize.control( 'nav_menu_locations[social-menu]' ).focus();" ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Enable scroll to top*/
$wp_customize->add_setting(
    'newsreach_options[enable_scroll_to_top]',
    array(
        'default'           => $default_options['enable_scroll_to_top'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_scroll_to_top]',
    array(
        'label'    => __( 'Show Scroll to top', 'newsreach' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_section_seperator_footer_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newsreach_Seperator_Control(
        $wp_customize,
        'newsreach_section_seperator_footer_4',
        array(
            'settings' => 'newsreach_section_seperator_footer_4',
            'section' => 'footer_options',
        )
    )
);

$wp_customize->add_setting(
    'newsreach_premium_notice',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Newsreach_Premium_Notice_Control(
        $wp_customize,
        'newsreach_premium_notice',
        array(
            'label'      => esc_html__( 'Footer Option', 'newsreach' ),
            'settings' => 'newsreach_premium_notice',
            'section'       => 'footer_options',
        )
    )
);
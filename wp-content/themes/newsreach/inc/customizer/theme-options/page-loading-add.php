<?php
/*Add header add option*/
$wp_customize->add_section(
    'site_add_options' ,
    array(
        'title' => __( 'Welcome Screen Advertisement', 'newsreach' ),
        'panel' => 'newsreach_option_panel',
    )
);


/*Enable advertisement*/
$wp_customize->add_setting(
    'newsreach_options[ed_header_ad]',
    array(
        'default'           => $default_options['ed_header_ad'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[ed_header_ad]',
    array(
        'label'    => __( 'Enable Advertisement', 'newsreach' ),
        'section'  => 'site_add_options',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newsreach_options[ed_header_type]',
    array(
        'default'           => $default_options['ed_header_type'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[ed_header_type]',
    array(
        'label'       => __( 'Advertisement Design Layout', 'newsreach' ),
        'section'     => 'site_add_options',
        'type'        => 'select',
        'choices'     => array(
            'welcome-banner-full-viewport'  => esc_html__( 'Full Viewport', 'newsreach' ),
            'welcome-banner-default'  => esc_html__( 'Default', 'newsreach' ),
            'welcome-banner-contained'  => esc_html__( 'Contained', 'newsreach' ),
        ),
    )
);

$wp_customize->add_setting(
    'newsreach_options[advertisement_section_title]',
    array(
        'default'           => $default_options['advertisement_section_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[advertisement_section_title]',
    array(
        'label'    => __( 'Welcome Advertisement Message', 'newsreach' ),
        'section'  => 'site_add_options',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'newsreach_options[upload_add_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'newsreach_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'newsreach_options[upload_add_image]',
        array(
            'label'           => __( 'Upload Advertisement Image', 'newsreach' ),
            'section'         => 'site_add_options',
        )
    )
);

$wp_customize->add_setting(
    'newsreach_options[ad_banner_link]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'newsreach_options[ad_banner_link]',
    array(
        'label'           => __( 'Advertisement Link', 'newsreach' ),
        'section'         => 'site_add_options',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'newsreach' ),
    )
);

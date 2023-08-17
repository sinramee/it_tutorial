<?php
/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'newsreach' ),
        'panel' => 'newsreach_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'newsreach_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'newsreach' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'newsreach' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'newsreach' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'newsreach' ),
        ),
        'active_callback' => 'newsreach_is_show_preloader',

    )
);

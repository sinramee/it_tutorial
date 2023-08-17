<?php
/*Header Options*/
$wp_customize->add_section(
    'top_tag_settings' ,
    array(
        'title' => __( 'Top Tagged Settings', 'newsreach' ),
        'panel' => 'newsreach_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'newsreach_options[show_top_tagged_section]',
    array(
        'default'           => $default_options['show_top_tagged_section'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[show_top_tagged_section]',
    array(
        'label'    => __( 'Show Top Tagged', 'newsreach' ),
        'section'  => 'top_tag_settings',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[top_tagged_title]',
    array(
        'default'           => $default_options['top_tagged_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[top_tagged_title]',
    array(
        'label'    => __( 'Top Tagged Title', 'newsreach' ),
        'section'  => 'top_tag_settings',
        'type'     => 'text',
    )
);

$wp_customize->add_setting('newsreach_options[top_tagged_number]',
    array(
        'default'           => $default_options['top_tagged_number'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsreach_sanitize_number_range',
    )
);
$wp_customize->add_control('newsreach_options[top_tagged_number]',
    array(
        'label'       => esc_html__('Number of Tag to show', 'newsreach'),
        'description'       => esc_html__( 'Max number of tag to shwo 5-10. (step-1)', 'newsreach' ),
        'section'     => 'top_tag_settings',
        'type'        => 'range',
        'input_attrs' => array(
                       'min'   => 5,
                       'max'   => 10,
                       'step'   => 1,
                    ),
    )
);
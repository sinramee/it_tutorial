<?php
$wp_customize->add_section(
    'pagination_options' ,
    array(
        'title' => __( 'Pagination Options', 'newsreach' ),
        'panel' => 'newsreach_option_panel',
    )
);

/* Pagination Type*/
$wp_customize->add_setting(
    'newsreach_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'newsreach' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default (Older / Newer Post)', 'newsreach' ),
            'numeric' => __( 'Numeric', 'newsreach' ),
            'ajax_load_on_click' => __( 'Load more post on click', 'newsreach' ),
            'ajax_load_on_scroll' => __( 'Load more posts on scroll', 'newsreach' ),
        ),
    )
);

<?php
$wp_customize->add_section(
    'home_page_shop_option',
    array(
        'title'      => __( 'Shop  Section Options', 'newsreach' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newsreach_options[enable_shop_section]',
    array(
        'default'           => $default_options['enable_shop_section'],
        'sanitize_callback' => 'newsreach_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newsreach_options[enable_shop_section]',
    array(
        'label'   => __( 'Enable Shop Section', 'newsreach' ),
        'section' => 'home_page_shop_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newsreach_options[shop_post_title]',
    array(
        'default'           => $default_options['shop_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[shop_post_title]',
    array(
        'label'    => __( 'Shop Post Title', 'newsreach' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'newsreach_options[shop_post_description]',
    array(
        'default'           => $default_options['shop_post_description'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[shop_post_description]',
    array(
        'label'    => __( 'Shop Post Description', 'newsreach' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'textarea',
    )
);

$wp_customize->add_setting(
    'newsreach_options[shop_select_product_from]',
    array(
        'default'           => $default_options['shop_select_product_from'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[shop_select_product_from]',
    array(
        'label'       => __( 'Select Product From', 'newsreach' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            'custom'            => __('Custom Select', 'newsreach'),
            'recent-products'   => __('Recent Products', 'newsreach'),
            'popular-products'  => __('Popular Products', 'newsreach'),
            'sale-products'     => __('Sale Products', 'newsreach'),
        )
    )
);


$wp_customize->add_setting(
    'newsreach_options[select_product_category]',
    array(
        'default'           => $default_options['select_product_category'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[select_product_category]',
    array(
        'label'   => __( 'Select Product Category', 'newsreach' ),
        'section' => 'home_page_shop_option',
        'type'        => 'select',
        'choices'     => newsreach_woocommerce_product_cat(),
        'active_callback' => 'newsreach_shop_select_product_from'
    )
);

$wp_customize->add_setting(
    'newsreach_options[shop_number_of_column]',
    array(
        'default'           => $default_options['shop_number_of_column'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[shop_number_of_column]',
    array(
        'label'       => __( 'Select Number Of Column', 'newsreach' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'newsreach'),
            '3'  => __('3', 'newsreach'),
            '4'  => __('4', 'newsreach'),
        )
    )
);

$wp_customize->add_setting(
    'newsreach_options[shop_number_of_product]',
    array(
        'default'           => $default_options['shop_number_of_product'],
        'sanitize_callback' => 'newsreach_sanitize_select',
    )
);
$wp_customize->add_control(
    'newsreach_options[shop_number_of_product]',
    array(
        'label'       => __( 'Select Number Of Product', 'newsreach' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'newsreach'),
            '3'  => __('3', 'newsreach'),
            '4'  => __('4', 'newsreach'),
            '5'  => __('5', 'newsreach'),
            '6'  => __('6', 'newsreach'),
            '7'  => __('7', 'newsreach'),
            '8'  => __('8', 'newsreach'),
            '9'  => __('9', 'newsreach'),
            '10'  => __('10', 'newsreach'),
            '11'  => __('11', 'newsreach'),
            '12'  => __('12', 'newsreach'),
        )
    )
);

$wp_customize->add_setting(
    'newsreach_options[shop_post_button_text]',
    array(
        'default'           => $default_options['shop_post_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newsreach_options[shop_post_button_text]',
    array(
        'label'    => __( 'Shop section Button Text', 'newsreach' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);
$wp_customize->add_setting(
    'newsreach_options[shop_post_button_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'newsreach_options[shop_post_button_url]',
    array(
        'label'           => __( 'Button Link', 'newsreach' ),
        'section'         => 'home_page_shop_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'newsreach' ),
    )
);
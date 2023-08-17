<?php
$wp_customize->add_section(
	'dark_mode_options',
	array(
		'title' => __( 'Dark Mode Options', 'newsreach' ),
        'panel' => 'newsreach_option_panel',
	)
);

/*Enable Dark Mode*/
$wp_customize->add_setting(
	'newsreach_options[enable_always_dark_mode]',
	array(
		'default'           => $default_options['enable_always_dark_mode'],
		'sanitize_callback' => 'newsreach_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'newsreach_options[enable_always_dark_mode]',
	array(
		'label'   => __( 'Turn on Dark Mode at all times.', 'newsreach' ),
		'section' => 'dark_mode_options',
		'type'    => 'checkbox',
	)
);

/*Enable Dark Mode*/
$wp_customize->add_setting(
	'newsreach_options[enable_dark_mode]',
	array(
		'default'           => $default_options['enable_dark_mode'],
		'sanitize_callback' => 'newsreach_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'newsreach_options[enable_dark_mode]',
	array(
		'label'   => __( 'Enable Dark Mode', 'newsreach' ),
		'section' => 'dark_mode_options',
		'type'    => 'checkbox',
		'active_callback' => 'newsreach_is_always_dark_mode',
	)
);

/*Enable Dark Mode Switcher*/
$wp_customize->add_setting(
	'newsreach_options[enable_dark_mode_switcher]',
	array(
		'default'           => $default_options['enable_dark_mode_switcher'],
		'sanitize_callback' => 'newsreach_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'newsreach_options[enable_dark_mode_switcher]',
	array(
		'label'           => __( 'Display the button for toggling between Light and Dark Mode.', 'newsreach' ),
		'section'         => 'dark_mode_options',
		'type'            => 'checkbox',
		'active_callback' => 'newsreach_is_dark_mode_enabled',
	)
);

/*Dark Mode Background Color*/
$wp_customize->add_setting(
	'newsreach_options[dark_mode_bg_color]',
	array(
		'default'           => $default_options['dark_mode_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'newsreach_options[dark_mode_bg_color]',
		array(
			'label'           => __( 'Dark Mode Background Color', 'newsreach' ),
			'description'     => __( 'Only choose color that have enough contrast to go with accent color.', 'newsreach' ),
			'section'         => 'dark_mode_options',
			'type'            => 'color',
			'active_callback' => 'newsreach_is_dark_mode_enabled',
		)
	)
);


/*Dark Mode Text Color*/
$wp_customize->add_setting(
	'newsreach_options[dark_mode_text_color]',
	array(
		'default'           => $default_options['dark_mode_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'newsreach_options[dark_mode_text_color]',
		array(
			'label'           => __( 'Dark Mode Text Color', 'newsreach' ),
			'description'     => __( 'Only choose color that have enough contrast to go with Background color.', 'newsreach' ),
			'section'         => 'dark_mode_options',
			'type'            => 'color',
			'active_callback' => 'newsreach_is_dark_mode_enabled',
		)
	)
);


/*Dark Mode Accent Color*/
$wp_customize->add_setting(
	'newsreach_options[dark_mode_accent_color]',
	array(
		'default'           => $default_options['dark_mode_accent_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'newsreach_options[dark_mode_accent_color]',
		array(
			'label'           => __( 'Dark Mode Accent Color', 'newsreach' ),
			'description'     => __( 'Only choose color that have enough contrast to go with the dark background.', 'newsreach' ),
			'section'         => 'dark_mode_options',
			'type'            => 'color',
			'active_callback' => 'newsreach_is_dark_mode_enabled',
		)
	)
);

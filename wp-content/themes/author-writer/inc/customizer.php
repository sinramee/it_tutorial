<?php
/**
 * Author Writer: Customizer
 *
 * @package Author Writer
 * @subpackage author_writer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function author_writer_customize_register( $wp_customize ) {

	// Register the custom control type.
	$wp_customize->register_control_type( 'Author_Writer_Toggle_Control' );

	//add home page setting pannel
	$wp_customize->add_panel( 'author_writer_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'author-writer' ),
	    'description' => __( 'Description of what this panel does.', 'author-writer' ),
	) );

	//Mobile Seetings
	$wp_customize->add_section('author_writer_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'author-writer'),
		'priority' => 3,
		'panel' => 'author_writer_panel_id'
	) );

	$wp_customize->add_setting( 'author_writer_return_to_header_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'author-writer' ),
		'section'     => 'author_writer_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'author_writer_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'author_writer_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'author-writer' ),
		'section'     => 'author_writer_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'author_writer_slider_buttom_mob',
	) ) );


	//Sidebar Position
	$wp_customize->add_section('author_writer_tp_general_settings',array(
      'title' => __('TP General Option', 'author-writer'),
      'priority' => 2,
      'panel' => 'author_writer_panel_id'
  ) );

 	$wp_customize->add_setting('author_writer_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'author_writer_sanitize_choices'
	));
 	$wp_customize->add_control('author_writer_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'author-writer'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'author-writer'),
		'section' => 'author_writer_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','author-writer'),
		'Container' => __('Container','author-writer'),
		'Container Fluid' => __('Container Fluid','author-writer')
		),
	) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('author_writer_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Sidebar Position', 'author-writer'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'author-writer'),
     'section' => 'author_writer_tp_general_settings',
     'choices' => array(
         'full' => __('Full','author-writer'),
         'left' => __('Left','author-writer'),
         'right' => __('Right','author-writer'),
         'three-column' => __('Three Columns','author-writer'),
         'four-column' => __('Four Columns','author-writer'),
         'grid' => __('Grid Layout','author-writer')
     ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('author_writer_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'author-writer'),
     'description'   => __('This option work for pages.', 'author-writer'),
     'section' => 'author_writer_tp_general_settings',
     'choices' => array(
         'full' => __('Full','author-writer'),
         'left' => __('Left','author-writer'),
         'right' => __('Right','author-writer')
     ),
	) );

	$wp_customize->add_setting( 'author_writer_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'author-writer' ),
		'section'     => 'author_writer_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'author_writer_preloader_show_hide',
	) ) );

	$wp_customize->add_setting( 'author_writer_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Option', 'author-writer' ),
		'section'     => 'author_writer_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'author_writer_sticky',
	) ) );

	//TP Blog Option
	$wp_customize->add_section('author_writer_blog_option',array(
		'title' => __('TP Blog Option', 'author-writer'),
		'priority' => 1,
		'panel' => 'author_writer_panel_id'
	) );

		$wp_customize->add_setting( 'author_writer_remove_date', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'author_writer_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_date', array(
			'label'       => esc_html__( 'Show / Hide Date Option', 'author-writer' ),
			'section'     => 'author_writer_blog_option',
			'type'        => 'toggle',
			'settings'    => 'author_writer_remove_date',
		) ) );
    $wp_customize->selective_refresh->add_partial( 'author_writer_remove_date', array(
		'selector' => '.entry-date',
		'render_callback' => 'author_writer_customize_partial_author_writer_remove_date',
	 ));

	 $wp_customize->add_setting( 'author_writer_remove_author', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'author_writer_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_author', array(
		 'label'       => esc_html__( 'Show / Hide Author Option', 'author-writer' ),
		 'section'     => 'author_writer_blog_option',
		 'type'        => 'toggle',
		 'settings'    => 'author_writer_remove_author',
	 ) ) );
    $wp_customize->selective_refresh->add_partial( 'author_writer_remove_author', array(
		'selector' => '.entry-author',
		'render_callback' => 'author_writer_customize_partial_author_writer_remove_author',
	 ));

	 $wp_customize->add_setting( 'author_writer_remove_comments', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'author_writer_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_comments', array(
		 'label'       => esc_html__( 'Show / Hide Comment Option', 'author-writer' ),
		 'section'     => 'author_writer_blog_option',
		 'type'        => 'toggle',
		 'settings'    => 'author_writer_remove_comments',
	 ) ) );
    $wp_customize->selective_refresh->add_partial( 'author_writer_remove_comments', array(
		'selector' => '.entry-comments',
		'render_callback' => 'author_writer_customize_partial_author_writer_remove_comments',
	 ));

	 $wp_customize->add_setting( 'author_writer_remove_tags', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'author_writer_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_tags', array(
		 'label'       => esc_html__( 'Show / Hide Tags Option', 'author-writer' ),
		 'section'     => 'author_writer_blog_option',
		 'type'        => 'toggle',
		 'settings'    => 'author_writer_remove_tags',
	 ) ) );
    $wp_customize->selective_refresh->add_partial( 'author_writer_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'author_writer_customize_partial_author_writer_remove_tags',
	 ));

	 $wp_customize->add_setting( 'author_writer_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'author-writer' ),
		'section'     => 'author_writer_blog_option',
		'type'        => 'toggle',
		'settings'    => 'author_writer_remove_read_button',
	) ) );

    $wp_customize->selective_refresh->add_partial( 'author_writer_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'author_writer_customize_partial_author_writer_remove_read_button',
	 ));

    $wp_customize->add_setting('author_writer_read_more_text',array(
		'default'=> __('Read More','author-writer'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_read_more_text',array(
		'label'	=> __('Edit Button Text','author-writer'),
		'section'=> 'author_writer_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'author_writer_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'author_writer_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'author_writer_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','author-writer' ),
		'section'     => 'author_writer_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting( 'author_writer_remove_read_button', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_read_button', array(
	 'label'       => esc_html__( 'Show / Hide Read More Button', 'author-writer' ),
	 'section'     => 'author_writer_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'author_writer_remove_read_button',
 ) ) );
	// Top Bar
	$wp_customize->add_section( 'author_writer_topbar', array(
    	'title'      => __( 'Contact Details', 'author-writer' ),
    	'priority' => 4,
    	'description' => __( 'Add your contact details', 'author-writer' ),
		'panel' => 'author_writer_panel_id'
	) );

	$wp_customize->add_setting('author_writer_announcement_bar',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_announcement_bar',array(
		'label'	=> __('Add Announcement Text','author-writer'),
		'section'=> 'author_writer_topbar',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'author_writer_announcement_bar', array(
		'selector' => '.top-header p',
		'render_callback' => 'author_writer_customize_partial_author_writer_announcement_bar',
	) );

	$wp_customize->add_setting('author_writer_sign_in_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_sign_in_button',array(
		'label'	=> __('Add Sign In Button Text','author-writer'),
		'section'=> 'author_writer_topbar',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'author_writer_sign_in_button', array(
		'selector' => '.register-btn',
		'render_callback' => 'author_writer_customize_partial_author_writer_sign_in_button',
	) );

	$wp_customize->add_setting('author_writer_sign_in_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_sign_in_link',array(
		'label'	=> __('Add Sign In Page Link','author-writer'),
		'section'=> 'author_writer_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('author_writer_bar_icon_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_bar_icon_link',array(
		'label'	=> __('Add Additional Link','author-writer'),
		'section'=> 'author_writer_topbar',
		'type'=> 'url'
	));

	// Social Media
	$wp_customize->add_section( 'author_writer_social_media', array(
    	'title'      => __( 'Social Media Links', 'author-writer' ),
    	'priority' => 5,
    	'description' => __( 'Add your Social Links', 'author-writer' ),
		'panel' => 'author_writer_panel_id'
	) );

	$wp_customize->add_setting('author_writer_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_facebook_url',array(
		'label'	=> __('Facebook Link','author-writer'),
		'section'=> 'author_writer_social_media',
		'type'=> 'url'
	));
	$wp_customize->selective_refresh->add_partial( 'author_writer_facebook_url', array(
		'selector' => '.media-links',
		'render_callback' => 'author_writer_customize_partial_author_writer_facebook_url',
	) );

	$wp_customize->add_setting('author_writer_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_twitter_url',array(
		'label'	=> __('Twitter Link','author-writer'),
		'section'=> 'author_writer_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('author_writer_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_instagram_url',array(
		'label'	=> __('Instagram Link','author-writer'),
		'section'=> 'author_writer_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('author_writer_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_youtube_url',array(
		'label'	=> __('YouTube Link','author-writer'),
		'section'=> 'author_writer_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('author_writer_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_pint_url',array(
		'label'	=> __('Pinterest Link','author-writer'),
		'section'=> 'author_writer_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('author_writer_social_icon_fontsize',array(
		'default'=> '14',
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size in PX','author-writer'),
		'type'=> 'number',
		'section'=> 'author_writer_social_media',
		'input_attrs' => array(
      'step' => 1,
			'min'  => 0,
			'max'  => 100,
        ),
	));

	//home page slider
	$wp_customize->add_section( 'author_writer_slider_section' , array(
    	'title'      => __( 'Slider Section', 'author-writer' ),
    	'priority' => 6,
		'panel' => 'author_writer_panel_id'
	) );

	$wp_customize->add_setting('author_writer_slider_arrows',array(
		'default' => false,
		'sanitize_callback'	=> 'author_writer_sanitize_checkbox'
	));
	$wp_customize->add_control('author_writer_slider_arrows',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide slider','author-writer'),
		'section' => 'author_writer_slider_section',
	));

	$wp_customize->add_setting( 'author_writer_slider_arrows', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide Slider', 'author-writer' ),
		'section'     => 'author_writer_slider_section',
		'type'        => 'toggle',
		'settings'    => 'author_writer_slider_arrows',
	) ) );

	$wp_customize->selective_refresh->add_partial( 'author_writer_slider_arrows', array(
		'selector' => '.inner_carousel h2',
		'render_callback' => 'author_writer_customize_partial_author_writer_slider_arrows',
	) );


	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'author_writer_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'author_writer_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'author_writer_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'author-writer' ),
			'description' => __('Image Size ( 1835 x 700 ) px','author-writer'),
			'section'  => 'author_writer_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'author_writer_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'author-writer' ),
		'section'     => 'author_writer_slider_section',
		'type'        => 'toggle',
		'settings'    => 'author_writer_slider_button',
	) ) );

	//footer
	$wp_customize->add_section('author_writer_footer_section',array(
		'title'	=> __('Footer Text','author-writer'),
		'description'	=> __('Add copyright text.','author-writer'),
		'panel' => 'author_writer_panel_id'
	));

	$wp_customize->add_setting('author_writer_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'author_writer_footer_widget_image',array(
    'label' => __('Footer Widget Background Image','author-writer'),
    'section' => 'author_writer_footer_section'
	)));

	$wp_customize->add_setting('author_writer_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_footer_text',array(
		'label'	=> __('Copyright Text','author-writer'),
		'section'	=> 'author_writer_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('author_writer_return_to_header',array(
		'default' => true,
		'sanitize_callback'	=> 'author_writer_sanitize_checkbox'
	));
	$wp_customize->add_control('author_writer_return_to_header',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Return to header','author-writer'),
		'section' => 'author_writer_footer_section',
	));

	$wp_customize->add_setting( 'author_writer_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to Header', 'author-writer' ),
		'section'     => 'author_writer_footer_section',
		'type'        => 'toggle',
		'settings'    => 'author_writer_return_to_header',
	) ) );
	$wp_customize->selective_refresh->add_partial( 'author_writer_return_to_header', array(
		'selector' => '.site-info a',
		'render_callback' => 'author_writer_customize_partial_author_writer_return_to_header',
	) );


   // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('author_writer_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_scroll_top_position',array(
     'type' => 'radio',
     'label'     => __('Scroll to top Position', 'author-writer'),
     'description'   => __('This option work for scroll to top', 'author-writer'),
     'section' => 'author_writer_footer_section',
     'choices' => array(
         'Right' => __('Right','author-writer'),
         'Left' => __('Left','author-writer'),
         'Center' => __('Center','author-writer')
     ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'author_writer_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'author_writer_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting('author_writer_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'author_writer_sanitize_checkbox'
    ));
    $wp_customize->add_control('author_writer_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','author-writer'),
       'section' => 'title_tagline',
    ));

		$wp_customize->add_setting( 'author_writer_site_title', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'author_writer_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_site_title', array(
			'label'       => esc_html__( 'Show / Hide Site Title', 'author-writer' ),
			'section'     => 'title_tagline',
			'type'        => 'toggle',
			'settings'    => 'author_writer_site_title',
		) ) );

		// logo site title size
		$wp_customize->add_setting('author_writer_site_title_font_size',array(
			'default'	=> 20,
			'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
		));
		$wp_customize->add_control('author_writer_site_title_font_size',array(
			'label'	=> __('Site Title Font Size in PX','author-writer'),
			'section'	=> 'title_tagline',
			'setting'	=> 'author_writer_site_title_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 100,
			),
		));

		$wp_customize->add_setting( 'author_writer_site_tagline', array(
			'default'           => false,
			'transport'         => 'refresh',
			'sanitize_callback' => 'author_writer_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_site_tagline', array(
			'label'       => esc_html__( 'Show / Hide Tagline', 'author-writer' ),
			'section'     => 'title_tagline',
			'type'        => 'toggle',
			'settings'    => 'author_writer_site_tagline',
		) ) );

				// logo site tagline size
		$wp_customize->add_setting('author_writer_site_tagline_font_size',array(
			'default'	=> 15,
			'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
		));
		$wp_customize->add_control('author_writer_site_tagline_font_size',array(
			'label'	=> __('Site Tagline Font Size in PX','author-writer'),
			'section'	=> 'title_tagline',
			'setting'	=> 'author_writer_site_tagline_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 50,
			),
		));


    $wp_customize->add_setting('author_writer_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	 $wp_customize->add_control('author_writer_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','author-writer'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('author_writer_logo_settings',array(
		'default' => 'Different Line',
		'sanitize_callback' => 'author_writer_sanitize_choices'
	));
   $wp_customize->add_control('author_writer_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'author-writer'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'author-writer'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','author-writer'),
            'Same Line' => __('Same Line','author-writer')
        ),
	) );

	$wp_customize->add_setting('author_writer_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_per_columns',array(
		'label'	=> __('Product Per Row','author-writer'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('author_writer_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_product_per_page',array(
		'label'	=> __('Product Per Page','author-writer'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

		$wp_customize->add_setting( 'author_writer_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'author_writer_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'author-writer' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'author_writer_product_sidebar',
		) ) );

		$wp_customize->add_setting( 'author_writer_single_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'author_writer_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_single_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'author-writer' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'author_writer_single_product_sidebar',
		) ) );
}
add_action( 'customize_register', 'author_writer_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Author Writer 1.0
 * @see author_writer_customize_register()
 *
 * @return void
 */
function author_writer_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Author Writer 1.0
 * @see author_writer_customize_register()
 *
 * @return void
 */
function author_writer_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'AUTHOR_WRITER_PRO_THEME_NAME' ) ) {
	define( 'AUTHOR_WRITER_PRO_THEME_NAME', esc_html__( 'Author Writer Pro', 'author-writer' ));
}
if ( ! defined( 'AUTHOR_WRITER_PRO_THEME_URL' ) ) {
	define( 'AUTHOR_WRITER_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/author-writer-wordpress-theme/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Author_Writer_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Author_Writer_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Author_Writer_Customize_Section_Pro(
				$manager,
				'author_writer_section_pro',
				array(
					'priority'   => 9,
					'title'    => AUTHOR_WRITER_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'author-writer' ),
					'pro_url'  => esc_url( AUTHOR_WRITER_PRO_THEME_URL, 'author-writer' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Author_Writer_Customize_Section_Pro(
				$manager,
				'author_writer_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'author-writer' ),
					'pro_text' => esc_html__( 'Click Here', 'author-writer' ),
					'pro_url'  => esc_url( AUTHOR_WRITER_DOCS_URL, 'author-writer'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'author-writer-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'author-writer-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Author_Writer_Customize::get_instance();

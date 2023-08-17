<?php

	$author_writer_tp_theme_css = "";

	$author_writer_theme_lay = get_theme_mod( 'author_writer_tp_body_layout_settings','Full');
    if($author_writer_theme_lay == 'Container'){
		$author_writer_tp_theme_css .='body{';
			$author_writer_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$author_writer_tp_theme_css .='}';
		$author_writer_tp_theme_css .='.page-template-front-page .menubar{';
			$author_writer_tp_theme_css .='position: static;';
		$author_writer_tp_theme_css .='}';
		$author_writer_tp_theme_css .='.scrolled{';
			$author_writer_tp_theme_css .='width: auto; left:0; right:0;';
		$author_writer_tp_theme_css .='}';
	}else if($author_writer_theme_lay == 'Container Fluid'){
		$author_writer_tp_theme_css .='body{';
			$author_writer_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$author_writer_tp_theme_css .='}';
		$author_writer_tp_theme_css .='.page-template-front-page .menubar{';
			$author_writer_tp_theme_css .='width: 99%';
		$author_writer_tp_theme_css .='}';
		$author_writer_tp_theme_css .='.scrolled{';
			$author_writer_tp_theme_css .='width: auto; left:0; right:0;';
		$author_writer_tp_theme_css .='}';
	}else if($author_writer_theme_lay == 'Full'){
		$author_writer_tp_theme_css .='body{';
			$author_writer_tp_theme_css .='max-width: 100%;';
		$author_writer_tp_theme_css .='}';
	}

    $author_writer_scroll_position = get_theme_mod( 'author_writer_scroll_top_position','Right');
    if($author_writer_scroll_position == 'Right'){
        $author_writer_tp_theme_css .='#return-to-top{';
            $author_writer_tp_theme_css .='right: 20px;';
        $author_writer_tp_theme_css .='}';
    }else if($author_writer_scroll_position == 'Left'){
        $author_writer_tp_theme_css .='#return-to-top{';
            $author_writer_tp_theme_css .='left: 20px;';
        $author_writer_tp_theme_css .='}';
    }else if($author_writer_scroll_position == 'Center'){
        $author_writer_tp_theme_css .='#return-to-top{';
            $author_writer_tp_theme_css .='right: 50%;left: 50%;';
        $author_writer_tp_theme_css .='}';
    }


			//Social icon Font size
	$author_writer_social_icon_fontsize = get_theme_mod('author_writer_social_icon_fontsize');
						$author_writer_tp_theme_css .='.media-links a i{';
	$author_writer_tp_theme_css .='font-size: '.esc_attr($author_writer_social_icon_fontsize).'px;';
						$author_writer_tp_theme_css .='}';

	// site title and tagline font size option
	$author_writer_site_title_font_size = get_theme_mod('author_writer_site_title_font_size', 20);{
						$author_writer_tp_theme_css .='.logo h1 a, .logo p a{';
	$author_writer_tp_theme_css .='font-size: '.esc_attr($author_writer_site_title_font_size).'px;';
						$author_writer_tp_theme_css .='}';
	}

	$author_writer_site_tagline_font_size = get_theme_mod('author_writer_site_tagline_font_size', 15);{
						$author_writer_tp_theme_css .='.logo p{';
	$author_writer_tp_theme_css .='font-size: '.esc_attr($author_writer_site_tagline_font_size).'px;';
						$author_writer_tp_theme_css .='}';
	}

	$author_writer_return_to_header_mob = get_theme_mod( 'author_writer_return_to_header_mob',false);
	if($author_writer_return_to_header_mob == true && get_theme_mod( 'author_writer_return_to_header',true) != true){
    	$author_writer_tp_theme_css .='.return-to-header{';
			$author_writer_tp_theme_css .='display:none;';
		$author_writer_tp_theme_css .='} ';
		}
    if($author_writer_return_to_header_mob == true){
    	$author_writer_tp_theme_css .='@media screen and (max-width:575px) {';
		$author_writer_tp_theme_css .='.return-to-header{';
			$author_writer_tp_theme_css .='display:block;';
		$author_writer_tp_theme_css .='} }';
	}else if($author_writer_return_to_header_mob == false){
		$author_writer_tp_theme_css .='@media screen and (max-width:575px){';
		$author_writer_tp_theme_css .='.return-to-header{';
			$author_writer_tp_theme_css .='display:none;';
		$author_writer_tp_theme_css .='} }';
	}

		$author_writer_slider_buttom_mob = get_theme_mod( 'author_writer_slider_buttom_mob',true);
	if($author_writer_slider_buttom_mob == true && get_theme_mod( 'author_writer_slider_button',true) != true){
			$author_writer_tp_theme_css .='#slider .more-btn{';
			$author_writer_tp_theme_css .='display:none;';
		$author_writer_tp_theme_css .='} ';
	}
		if($author_writer_slider_buttom_mob == true){
			$author_writer_tp_theme_css .='@media screen and (max-width:575px) {';
		$author_writer_tp_theme_css .='#slider .more-btn{';
			$author_writer_tp_theme_css .='display:block;';
		$author_writer_tp_theme_css .='} }';
	}else if($author_writer_slider_buttom_mob == false){
		$author_writer_tp_theme_css .='@media screen and (max-width:575px){';
		$author_writer_tp_theme_css .='#slider .more-btn{';
			$author_writer_tp_theme_css .='display:none;';
		$author_writer_tp_theme_css .='} }';
	}

	$author_writer_footer_widget_image = get_theme_mod('author_writer_footer_widget_image');
	if($author_writer_footer_widget_image != false){
		$author_writer_tp_theme_css .='#footer{';
			$author_writer_tp_theme_css .='background: url('.esc_attr($author_writer_footer_widget_image).');';
		$author_writer_tp_theme_css .='}';
	}

<?php
/**
* Sidebar Metabox.
*
* @package Newsreach
*/
if( !function_exists( 'newsreach_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function newsreach_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('newsreach_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function newsreach_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'newsreach_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function newsreach_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2','layout-3' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'newsreach_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function newsreach_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'newsreach_metabox' );

if( ! function_exists( 'newsreach_metabox' ) ):


    function  newsreach_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'newsreach' ),
            'newsreach_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'newsreach' ),
            'newsreach_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$newsreach_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'newsreach' ),
    'layout-2' => esc_html__( 'Banner Layout', 'newsreach' ),
    'layout-3' => esc_html__( 'Default Layout', 'newsreach' ),
);

$newsreach_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'newsreach' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'newsreach' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'newsreach' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'newsreach' ),
                ),
);

$newsreach_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'newsreach' ),
    'layout-2' => esc_html__( 'Banner Layout', 'newsreach' ),
    'layout-3' => esc_html__( 'Default Layout', 'newsreach' ),

);

$newsreach_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'newsreach' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'newsreach' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'newsreach_post_metafield_callback' ) ):
    
    function newsreach_post_metafield_callback() {
        global $post, $newsreach_post_sidebar_fields, $newsreach_post_layout_options,  $newsreach_page_layout_options, $newsreach_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'newsreach_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-appearance"  class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'newsreach'); ?>

                        </a>
                    </li>

                    <?php if ($post_type != 'page') { ?>
                        <li>
                            <a id="metabox-navbar-general" href="javascript:void(0)">

                                <?php esc_html_e('General Settings', 'newsreach'); ?>

                            </a>
                        </li>
                    <?php } ?>


                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'newsreach'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','newsreach'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $newsreach_post_sidebar = esc_html( get_post_meta( $post->ID, 'newsreach_post_sidebar_option', true ) ); 
                            if( $newsreach_post_sidebar == '' ){ $newsreach_post_sidebar = 'global-sidebar'; }

                            foreach ( $newsreach_post_sidebar_fields as $newsreach_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="newsreach_post_sidebar_option" value="<?php echo esc_attr( $newsreach_post_sidebar_field['value'] ); ?>" <?php if( $newsreach_post_sidebar_field['value'] == $newsreach_post_sidebar ){ echo "checked='checked'";} if( empty( $newsreach_post_sidebar ) && $newsreach_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $newsreach_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','newsreach'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $newsreach_page_layout = esc_html( get_post_meta( $post->ID, 'newsreach_page_layout', true ) ); 
                                if( $newsreach_page_layout == '' ){ $newsreach_page_layout = 'layout-1'; }

                                foreach ( $newsreach_page_layout_options as $key => $newsreach_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="newsreach_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $newsreach_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $newsreach_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','newsreach'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $newsreach_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'newsreach_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="newsreach-header-overlay" name="newsreach_ed_header_overlay" value="1" <?php if( $newsreach_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="newsreach-header-overlay"><?php esc_html_e( 'Enable Header Overlay','newsreach' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','newsreach'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $newsreach_post_layout = esc_html( get_post_meta( $post->ID, 'newsreach_post_layout', true ) ); 

                                foreach ( $newsreach_post_layout_options as $key => $newsreach_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="newsreach_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $newsreach_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $newsreach_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','newsreach'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $newsreach_header_overlay = esc_html( get_post_meta( $post->ID, 'newsreach_header_overlay', true ) ); 
                                if( $newsreach_header_overlay == '' ){ $newsreach_header_overlay = 'global-layout'; }

                                foreach ( $newsreach_header_overlay_options as $key => $newsreach_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="newsreach_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $newsreach_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $newsreach_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $newsreach_ed_post_views = esc_html( get_post_meta( $post->ID, 'newsreach_ed_post_views', true ) );
                    $newsreach_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'newsreach_ed_post_read_time', true ) );
                    $newsreach_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'newsreach_ed_post_like_dislike', true ) );
                    $newsreach_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'newsreach_ed_post_author_box', true ) );
                    $newsreach_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'newsreach_ed_post_social_share', true ) );
                    $newsreach_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'newsreach_ed_post_reaction', true ) );
                    $newsreach_ed_post_rating = esc_html( get_post_meta( $post->ID, 'newsreach_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','newsreach'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newsreach-ed-post-views" name="newsreach_ed_post_views" value="1" <?php if( $newsreach_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="newsreach-ed-post-views"><?php esc_html_e( 'Disable Post Views','newsreach' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newsreach-ed-post-read-time" name="newsreach_ed_post_read_time" value="1" <?php if( $newsreach_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="newsreach-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','newsreach' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newsreach-ed-post-like-dislike" name="newsreach_ed_post_like_dislike" value="1" <?php if( $newsreach_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="newsreach-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','newsreach' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newsreach-ed-post-author-box" name="newsreach_ed_post_author_box" value="1" <?php if( $newsreach_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="newsreach-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','newsreach' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newsreach-ed-post-social-share" name="newsreach_ed_post_social_share" value="1" <?php if( $newsreach_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="newsreach-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','newsreach' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newsreach-ed-post-reaction" name="newsreach_ed_post_reaction" value="1" <?php if( $newsreach_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="newsreach-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','newsreach' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newsreach-ed-post-rating" name="newsreach_ed_post_rating" value="1" <?php if( $newsreach_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="newsreach-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','newsreach' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'newsreach_save_post_meta' );

if( ! function_exists( 'newsreach_save_post_meta' ) ):

    function newsreach_save_post_meta( $post_id ) {

        global $post, $newsreach_post_sidebar_fields, $newsreach_post_layout_options, $newsreach_header_overlay_options,  $newsreach_page_layout_options;

        if ( !isset( $_POST[ 'newsreach_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['newsreach_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $newsreach_post_sidebar_fields as $newsreach_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'newsreach_post_sidebar_option', true ) ); 
                $new = isset( $_POST['newsreach_post_sidebar_option'] ) ? newsreach_sanitize_sidebar_option_meta( wp_unslash( $_POST['newsreach_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'newsreach_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'newsreach_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? newsreach_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $newsreach_post_layout_options as $newsreach_post_layout_option ) {  
            
            $newsreach_post_layout_old = esc_html( get_post_meta( $post_id, 'newsreach_post_layout', true ) ); 
            $newsreach_post_layout_new = isset( $_POST['newsreach_post_layout'] ) ? newsreach_sanitize_post_layout_option_meta( wp_unslash( $_POST['newsreach_post_layout'] ) ) : '';

            if ( $newsreach_post_layout_new && $newsreach_post_layout_new != $newsreach_post_layout_old ){

                update_post_meta ( $post_id, 'newsreach_post_layout', $newsreach_post_layout_new );

            }elseif( '' == $newsreach_post_layout_new && $newsreach_post_layout_old ) {

                delete_post_meta( $post_id,'newsreach_post_layout', $newsreach_post_layout_old );

            }
            
        }



        foreach ( $newsreach_header_overlay_options as $newsreach_header_overlay_option ) {  
            
            $newsreach_header_overlay_old = esc_html( get_post_meta( $post_id, 'newsreach_header_overlay', true ) ); 
            $newsreach_header_overlay_new = isset( $_POST['newsreach_header_overlay'] ) ? newsreach_sanitize_header_overlay_option_meta( wp_unslash( $_POST['newsreach_header_overlay'] ) ) : '';

            if ( $newsreach_header_overlay_new && $newsreach_header_overlay_new != $newsreach_header_overlay_old ){

                update_post_meta ( $post_id, 'newsreach_header_overlay', $newsreach_header_overlay_new );

            }elseif( '' == $newsreach_header_overlay_new && $newsreach_header_overlay_old ) {

                delete_post_meta( $post_id,'newsreach_header_overlay', $newsreach_header_overlay_old );

            }
            
        }


        $newsreach_ed_post_views_old = esc_html( get_post_meta( $post_id, 'newsreach_ed_post_views', true ) ); 
        $newsreach_ed_post_views_new = isset( $_POST['newsreach_ed_post_views'] ) ? absint( wp_unslash( $_POST['newsreach_ed_post_views'] ) ) : '';

        if ( $newsreach_ed_post_views_new && $newsreach_ed_post_views_new != $newsreach_ed_post_views_old ){

            update_post_meta ( $post_id, 'newsreach_ed_post_views', $newsreach_ed_post_views_new );

        }elseif( '' == $newsreach_ed_post_views_new && $newsreach_ed_post_views_old ) {

            delete_post_meta( $post_id,'newsreach_ed_post_views', $newsreach_ed_post_views_old );

        }



        $newsreach_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'newsreach_ed_post_read_time', true ) ); 
        $newsreach_ed_post_read_time_new = isset( $_POST['newsreach_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['newsreach_ed_post_read_time'] ) ) : '';

        if ( $newsreach_ed_post_read_time_new && $newsreach_ed_post_read_time_new != $newsreach_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'newsreach_ed_post_read_time', $newsreach_ed_post_read_time_new );

        }elseif( '' == $newsreach_ed_post_read_time_new && $newsreach_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'newsreach_ed_post_read_time', $newsreach_ed_post_read_time_old );

        }



        $newsreach_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'newsreach_ed_post_like_dislike', true ) ); 
        $newsreach_ed_post_like_dislike_new = isset( $_POST['newsreach_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['newsreach_ed_post_like_dislike'] ) ) : '';

        if ( $newsreach_ed_post_like_dislike_new && $newsreach_ed_post_like_dislike_new != $newsreach_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'newsreach_ed_post_like_dislike', $newsreach_ed_post_like_dislike_new );

        }elseif( '' == $newsreach_ed_post_like_dislike_new && $newsreach_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'newsreach_ed_post_like_dislike', $newsreach_ed_post_like_dislike_old );

        }



        $newsreach_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'newsreach_ed_post_author_box', true ) ); 
        $newsreach_ed_post_author_box_new = isset( $_POST['newsreach_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['newsreach_ed_post_author_box'] ) ) : '';

        if ( $newsreach_ed_post_author_box_new && $newsreach_ed_post_author_box_new != $newsreach_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'newsreach_ed_post_author_box', $newsreach_ed_post_author_box_new );

        }elseif( '' == $newsreach_ed_post_author_box_new && $newsreach_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'newsreach_ed_post_author_box', $newsreach_ed_post_author_box_old );

        }



        $newsreach_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'newsreach_ed_post_social_share', true ) ); 
        $newsreach_ed_post_social_share_new = isset( $_POST['newsreach_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['newsreach_ed_post_social_share'] ) ) : '';

        if ( $newsreach_ed_post_social_share_new && $newsreach_ed_post_social_share_new != $newsreach_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'newsreach_ed_post_social_share', $newsreach_ed_post_social_share_new );

        }elseif( '' == $newsreach_ed_post_social_share_new && $newsreach_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'newsreach_ed_post_social_share', $newsreach_ed_post_social_share_old );

        }



        $newsreach_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'newsreach_ed_post_reaction', true ) ); 
        $newsreach_ed_post_reaction_new = isset( $_POST['newsreach_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['newsreach_ed_post_reaction'] ) ) : '';

        if ( $newsreach_ed_post_reaction_new && $newsreach_ed_post_reaction_new != $newsreach_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'newsreach_ed_post_reaction', $newsreach_ed_post_reaction_new );

        }elseif( '' == $newsreach_ed_post_reaction_new && $newsreach_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'newsreach_ed_post_reaction', $newsreach_ed_post_reaction_old );

        }



        $newsreach_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'newsreach_ed_post_rating', true ) ); 
        $newsreach_ed_post_rating_new = isset( $_POST['newsreach_ed_post_rating'] ) ? absint( wp_unslash( $_POST['newsreach_ed_post_rating'] ) ) : '';

        if ( $newsreach_ed_post_rating_new && $newsreach_ed_post_rating_new != $newsreach_ed_post_rating_old ){

            update_post_meta ( $post_id, 'newsreach_ed_post_rating', $newsreach_ed_post_rating_new );

        }elseif( '' == $newsreach_ed_post_rating_new && $newsreach_ed_post_rating_old ) {

            delete_post_meta( $post_id,'newsreach_ed_post_rating', $newsreach_ed_post_rating_old );

        }

        foreach ( $newsreach_page_layout_options as $newsreach_post_layout_option ) {  
        
            $newsreach_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'newsreach_page_layout', true ) ); 
            $newsreach_page_layout_new = isset( $_POST['newsreach_page_layout'] ) ? newsreach_sanitize_post_layout_option_meta( wp_unslash( $_POST['newsreach_page_layout'] ) ) : '';

            if ( $newsreach_page_layout_new && $newsreach_page_layout_new != $newsreach_page_layout_old ){

                update_post_meta ( $post_id, 'newsreach_page_layout', $newsreach_page_layout_new );

            }elseif( '' == $newsreach_page_layout_new && $newsreach_page_layout_old ) {

                delete_post_meta( $post_id,'newsreach_page_layout', $newsreach_page_layout_old );

            }
            
        }

        $newsreach_ed_header_overlay_old = absint( get_post_meta( $post_id, 'newsreach_ed_header_overlay', true ) ); 
        $newsreach_ed_header_overlay_new = isset( $_POST['newsreach_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['newsreach_ed_header_overlay'] ) ) : '';

        if ( $newsreach_ed_header_overlay_new && $newsreach_ed_header_overlay_new != $newsreach_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'newsreach_ed_header_overlay', $newsreach_ed_header_overlay_new );

        }elseif( '' == $newsreach_ed_header_overlay_new && $newsreach_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'newsreach_ed_header_overlay', $newsreach_ed_header_overlay_old );

        }

    }

endif;   
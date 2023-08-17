<?php
/**
 * Displays top header
 *
 * @package Digital Books
 */
?>

<div class="top-info text-right">
	<div class="container">
		<div class="social-link">
            <?php if(get_theme_mod('digital_books_social_on_of_setting') != ''){ ?>
            <?php if(get_theme_mod('digital_books_facebook_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('digital_books_facebook_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_books_facebook_icon') ); ?>"></i></a>
            <?php }?>
            <?php if(get_theme_mod('digital_books_twitter_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('digital_books_twitter_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_books_twitter_icon') ); ?>"></i></a>
            <?php }?>
            <?php if(get_theme_mod('digital_books_intagram_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('digital_books_intagram_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_books_intagram_icon') ); ?>"></i></a>
            <?php }?>
            <?php if(get_theme_mod('digital_books_linkedin_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('digital_books_linkedin_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_books_linkedin_icon') ); ?>"></i></a>
            <?php }?>
            <?php if(get_theme_mod('digital_books_pintrest_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('digital_books_pintrest_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_books_pintrest_icon') ); ?>"></i></a>
            <?php }?>
            <?php }?>
            <?php if(class_exists('woocommerce')){ ?>
                <?php if ( is_user_logged_in() ) { ?>
                    <a class="account-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','digital-books'); ?>"><?php esc_html_e('My Account','digital-books'); ?></a>
                <?php } 
                else { ?>
                    <a class="account-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','digital-books'); ?>"><?php esc_html_e('Login / Register','digital-books'); ?></a>
                <?php } ?>
        	<?php }?>
        </div>
	</div>
</div>
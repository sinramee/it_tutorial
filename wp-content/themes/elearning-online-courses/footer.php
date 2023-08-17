<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elearning Online Courses
 */
?>

<footer id="colophon" class="site-footer border-top">
    <div class="container">
    	<div class="footer-column">
	    	<div class="row">
				<?php if(is_active_sidebar( 'online-tutor-footer1' ) || is_active_sidebar( 'online-tutor-footer2' ) || is_active_sidebar( 'online-tutor-footer3' ) ): ?>
					<div class="col-lg-4 col-md-4">
						<?php if(is_active_sidebar( 'online-tutor-footer1' )):
							dynamic_sidebar( 'online-tutor-footer1' );
						endif;
						?>
					</div>

					<div class="col-lg-4 col-md-4">
						<?php if(is_active_sidebar( 'online-tutor-footer2' )):
							dynamic_sidebar( 'online-tutor-footer2' );
						endif;
						?>
					</div>

					<div class="col-lg-4 col-md-4">
						<?php if(is_active_sidebar( 'online-tutor-footer3' )):
							dynamic_sidebar( 'online-tutor-footer3' );
						endif;
						?>
					</div>

				<?php endif; ?>
			</div>
		</div>
    	<div class="row">
    		<div class="col-lg-5 col-md-5 col-12 align-self-lg-center">
				<?php if ( has_nav_menu( 'footer' ) ): ?>
		            <nav class="navbar footer-menu">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'container'      => 'div',
								'container_id'   => 'main-nav',
								'menu_id'        => false,
								'depth'          => 1,
							) );
						?>
		            </nav>
				<?php endif ?>
			</div>
	        <div class="site-info col-lg-7 col-md-7 col-12">
	            <div class="footer-menu-left">
					<?php if(! get_theme_mod('online_tutor_footer_text_setting') != ''){ ?>
					    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'elearning-online-courses' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly Powered by %s', 'elearning-online-courses' ), 'WordPress' );
							?>
					    </a>
					    <span class="sep mr-1"> | </span>
					    <span>
					    	<a target="_blank" href="<?php echo esc_url( 'https://www.themagnifico.net/themes/free-elearning-wordpress-theme/'); ?>">
					       	<?php
				            	/* translators: 1: Online Courses WordPress Theme,  */
				            	printf( esc_html__( ' %1$s ', 'elearning-online-courses' ),'Online Courses WordPress Theme' );
				            ?>
				            </a>
					        <?php
					        	/* translators: 1: TheMagnifico. */
					        	printf( esc_html__( 'by %1$s.', 'elearning-online-courses' ),'TheMagnifico'  );
					        ?>
					    </span>
					<?php }?>
					<?php echo esc_html(get_theme_mod('online_tutor_footer_text_setting','')); ?>

	            </div>
	        </div>
	    </div>
	    <a id="button"><?php esc_html_e('TOP','elearning-online-courses'); ?></a>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
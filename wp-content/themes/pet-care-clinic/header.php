<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Pet Care Clinic
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) )
  {
    wp_body_open();
  }else{
    do_action('wp_body_open');
  }
?>    
    <div id="preloader">
        <div class="loading-circle fa-spin"></div>
    </div>
    <header>
        <div class="toggle-menu responsive-menu">
            <button onclick="pet_care_clinic_resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','pet-care-clinic'); ?></span></button>
        </div>
        <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_attr_e( 'Skip to content', 'pet-care-clinic' ); ?>"><?php esc_html_e( 'Skip to content', 'pet-care-clinic' ); ?></a>
        <div class="header">         
            <nav id="pet-care-clinic-top-nav" class="navbar" role="navigation">
                <div class="container">
                    <div id="top-header">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div id="logo">
                                    <div class="site-logo">
                                        <?php if( has_custom_logo() ){ the_custom_logo();
                                            }else { ?>
                                            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php
                                            bloginfo( 'name' ); ?></a></h1>
                                            <?php $description = get_bloginfo( 'description', 'display' );
                                            if ( $description || is_customize_preview() ) : ?>
                                            <p class="site-description"><?php echo esc_html($description); ?></p>
                                        <?php endif; } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <?php if(get_theme_mod("pet_care_clinic_location_txt")) : ?>
                                            <div class="col-lg-2">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="col-lg-10 col-md-10">
                                                <p><b><?php echo esc_html(get_theme_mod('pet_care_clinic_location_txt',''));?></b></p>
                                                <p><?php echo esc_html(get_theme_mod('pet_care_clinic_location',''));?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <?php if(get_theme_mod("pet_care_clinic_time_txt")) : ?>
                                            <div class="col-lg-2 col-md-2">
                                                <i class="far fa-clock"></i>
                                            </div>
                                            <div class="col-lg-10 col-md-10">
                                                <p><b><?php echo esc_html(get_theme_mod('pet_care_clinic_time_txt',''));?></b></p>
                                                <p><?php echo esc_html(get_theme_mod('pet_care_clinic_time',''));?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <?php if(get_theme_mod("pet_care_clinic_call_txt")) : ?>
                                            <div class="col-lg-2 col-md-2">
                                                <i class="fas fa-mobile-alt"></i>
                                            </div>
                                            <div class="col-lg-10 col-md-10">
                                                <p><b><?php echo esc_html(get_theme_mod('pet_care_clinic_call_txt',''));?></b></p>
                                                <p><?php echo esc_html(get_theme_mod('pet_care_clinic_call',''));?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-menu pet-care-clinic-navbar">
                    <div class="container">
                        <div class="col-lg-9 col-md-8">
                            <div id="header" class="menu-section">
                                <div id="sidelong-menu" class="nav sidenav">
                                    <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'pet-care-clinic' ); ?>">
                                      <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="pet_care_clinic_resMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','pet-care-clinic'); ?></span></a>
                                        <?php 
                                            wp_nav_menu( array( 
                                              'theme_location' => 'primary',
                                              'container_class' => 'main-menu-navigation clearfix' ,
                                              'menu_class' => 'clearfix',
                                              'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                                              'fallback_cb' => 'wp_page_menu',
                                            ) ); 
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="social_icon">
                                <?php if(get_theme_mod("pet_care_clinic_social_fb")) : ?>
                                    <span class="fbs">
                                        <a href="<?php echo esc_url(get_theme_mod('pet_care_clinic_social_fb',''));?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','pet-care-clinic' );?></span></a>
                                    </span>
                                <?php endif; ?>
                                <?php if(get_theme_mod("pet_care_clinic_social_twitter")) : ?>
                                    <span class="tws">
                                        <a href="<?php echo esc_url(get_theme_mod('pet_care_clinic_social_twitter',''));?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','pet-care-clinic' );?></span></a>
                                    </span>
                                <?php endif; ?>
                                <?php if(get_theme_mod("pet_care_clinic_social_linkedin")) : ?>
                                    <span class="lis">
                                        <a href="<?php echo esc_url(get_theme_mod('pet_care_clinic_social_linkedin',''));?>"><i class="fab fa-linkedin"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','pet-care-clinic' );?></span></a>
                                    </span>
                                <?php endif; ?>
                                <?php if(get_theme_mod("pet_care_clinic_social_skype")) : ?>
                                    <span class="sks">
                                        <a href="skype:skype?<?php echo esc_url(get_theme_mod('pet_care_clinic_social_skype',''));?>" data-placement="bottom" data-toggle="tooltip" data-original-title="Skype"><i class="fab fa-skype"></i><span class="screen-reader-text"><?php esc_html_e( 'Skype','pet-care-clinic' );?></span></a>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
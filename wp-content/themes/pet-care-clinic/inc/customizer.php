<?php
/**
 * _s Theme Customizer
 *
 * @package Pet Care Clinic
 */

/**
 * Add  support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pet_care_clinic_customize_register($wp_customize) {

    if (class_exists('WP_Customize_Control')) {
        class Pet_Care_Clinic_Customize_Category_Control extends WP_Customize_Control {
            public function render_content() {
                $dropdown = wp_dropdown_categories(
                    array(
                        'name'              => '_customize-dropdown-categories-' . $this->id,
                        'echo'              => 0,
                        'show_option_none'  => __( '&lgash; Select &lgash;','pet-care-clinic'),
                        'option_none_value' => '0',
                        'selected'          => $this->value(),
                    )
                );
     
                // Hackily add in the data link parameter.
                $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
     
                printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                    esc_html($this->label),
                    $dropdown
                );
            }
        }
    }

    load_template( trailingslashit( get_template_directory() ) . 'inc/pro-theme-info.php' );

    $wp_customize->add_section('pet_care_clinic_theme_info_main_section', array(
        'title'    => __( 'VIEW PRO THEME', 'pet-care-clinic' ),
        'priority' => 1,
    )  );

    $wp_customize->add_setting('pet_care_clinic_theme_info_main_control', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new Pet_Care_Clinic_Theme_Info( $wp_customize, 'pet_care_clinic_theme_info_main_control', array(
        'section'     => 'pet_care_clinic_theme_info_main_section',
        'priority'    => 100,
        'options'     => array(
            esc_html__( 'The pro version of this pet care clinic theme gives you all the features and functionality to design a modern website with best overall performance. ', 'pet-care-clinic' ),
        ),
        'button_url'  => esc_url( 'https://www.unboxthemes.com/wp-themes/pet-wordpress-theme/' ),
        'button_text' => esc_html__( 'UPGRADE PREMIUM', 'pet-care-clinic' ),
    )  )  );

    /*---- General Setting -----*/
    $wp_customize->add_panel('pet_care_clinic_general_panel', array(
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('General Options', 'pet-care-clinic')
    ));

    /*---- Topbar -----*/
    $wp_customize->add_section('pet_care_clinic_top_header_section', array(
        'title' => __('Topbar', 'pet-care-clinic'),
        'priority' => null,
        'panel' => 'pet_care_clinic_general_panel'
    ));

    $wp_customize->add_setting('pet_care_clinic_location_txt', array(
        'default' => '',
        'sanitize_callback' => 'pet_care_clinic_sanitize_text'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pet_care_clinic_location_txt', array(
        'label' => __('Location Text', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_top_header_section',
        'settings' => 'pet_care_clinic_location_txt'
    )));

    $wp_customize->add_setting('pet_care_clinic_location', array(
        'default' => '',
        'sanitize_callback' => 'pet_care_clinic_sanitize_text'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pet_care_clinic_location', array(
        'label' => __('Location', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_top_header_section',
        'settings' => 'pet_care_clinic_location'
    )));

    $wp_customize->add_setting('pet_care_clinic_time_txt', array(
        'default' => '',
        'sanitize_callback' => 'pet_care_clinic_sanitize_text'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pet_care_clinic_time_txt', array(
        'label' => __('Opening Time Text', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_top_header_section',
        'settings' => 'pet_care_clinic_time_txt'
    )));

    $wp_customize->add_setting('pet_care_clinic_time', array(
        'default' => '',
        'sanitize_callback' => 'pet_care_clinic_sanitize_text'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pet_care_clinic_time', array(
        'label' => __('Opening Time', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_top_header_section',
        'settings' => 'pet_care_clinic_time'
    )));

    $wp_customize->add_setting('pet_care_clinic_call_txt', array(
        'default' => '',
        'sanitize_callback' => 'pet_care_clinic_sanitize_text'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pet_care_clinic_call_txt', array(
        'label' => __('phone', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_top_header_section',
        'settings' => 'pet_care_clinic_call_txt'
    )));

    $wp_customize->add_setting('pet_care_clinic_call', array(
        'default' => '',
        'sanitize_callback' => 'pet_care_clinic_sanitize_phone_number'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pet_care_clinic_call', array(
        'label' => __('Phone Number', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_top_header_section',
        'settings' => 'pet_care_clinic_call'
    )));

    /*----- Social Links -----*/
    $wp_customize->add_section('pet_care_clinic_social_section', array(
        'title' => __('Social Link', 'pet-care-clinic'),
        'priority' => null,
        'panel' => 'pet_care_clinic_general_panel'
    ));

    $wp_customize->add_setting('pet_care_clinic_social_fb', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'       
    ));
    $wp_customize->add_control('pet_care_clinic_social_fb', array(
        'label' => __('Facebook link', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_social_section',
        'settings' => 'pet_care_clinic_social_fb',
    ));

    $wp_customize->add_setting('pet_care_clinic_social_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'        
    ));
    $wp_customize->add_control('pet_care_clinic_social_twitter', array(
        'label' => __('Twitter link', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_social_section',
        'settings' => 'pet_care_clinic_social_twitter',
    ));

    $wp_customize->add_setting('pet_care_clinic_social_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('pet_care_clinic_social_linkedin', array(
        'label' => __('Linkedin link', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_social_section',
        'settings' => 'pet_care_clinic_social_linkedin',
    ));

    $wp_customize->add_setting('pet_care_clinic_social_skype', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'        
    ));
    $wp_customize->add_control('pet_care_clinic_social_skype', array(
        'label' => __('Skype id', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_social_section',
        'settings' => 'pet_care_clinic_social_skype',
    ));

    /*----- Copyright text -----*/
    $wp_customize->add_section('pet_care_clinic_footer_copyright_options', array(
        'title' => __('Footer', 'pet-care-clinic'),
        'priority' => null,
        'panel' => 'pet_care_clinic_general_panel'
    ));

    $wp_customize->add_setting('pet_care_clinic_copyright', array(
        'default' => '',
        'sanitize_callback' => 'pet_care_clinic_sanitize_text'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pet_care_clinic_copyright', array(
        'label' => __('Copyright', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_footer_copyright_options',
        'settings' => 'pet_care_clinic_copyright'
    )));

    /*---- Slider code -----*/
    $wp_customize->add_section('pet_care_clinic_slider_section',array(
        'title' => __('Slider', 'pet-care-clinic'),
        'priority' => 11,
        'description'   => __('Recommended image size (1420x567)','pet-care-clinic'),   
    ) );
    
    $wp_customize->add_setting('pet_care_clinic_page_setting7',array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'pet_care_clinic_sanitize_dropdown_pages'
    ));    
    $wp_customize->add_control('pet_care_clinic_page_setting7',array(
        'type'  => 'dropdown-pages',
        'label' => __('Select page for slide one:','pet-care-clinic'),
        'section'   => 'pet_care_clinic_slider_section'
    )); 
    
    $wp_customize->add_setting('pet_care_clinic_page_setting8',array(
        'default' => '0',
        'capability' => 'edit_theme_options',   
        'sanitize_callback' => 'pet_care_clinic_sanitize_dropdown_pages'
    ));    
    $wp_customize->add_control('pet_care_clinic_page_setting8',array(
        'type'  => 'dropdown-pages',
        'label' => __('Select page for slide two:','pet-care-clinic'),
        'section'   => 'pet_care_clinic_slider_section'
    )); 
    
    $wp_customize->add_setting('pet_care_clinic_page_setting9',array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'pet_care_clinic_sanitize_dropdown_pages'
    ));    
    $wp_customize->add_control('pet_care_clinic_page_setting9',array(
        'type'  => 'dropdown-pages',
        'label' => __('Select page for slide three:','pet-care-clinic'),
        'section'   => 'pet_care_clinic_slider_section'
    )); 
        
    $wp_customize->add_setting('pet_care_clinic_hide_slider',array(
        'default' => 0,
        'sanitize_callback' => 'sanitize_text_field',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control( 'pet_care_clinic_hide_slider', array(
       'settings' => 'pet_care_clinic_hide_slider',
       'section'   => 'pet_care_clinic_slider_section',
       'label'     => __('Check this to dispaly slider','pet-care-clinic'),
       'type'      => 'checkbox'
    )); 

    /*---- Services Setting -----*/        
    $wp_customize->add_section("pet_care_clinic_services_option", array(
        "title" => __("Our Services", "pet-care-clinic"),
        "priority" => 12,
    ));

    $wp_customize->add_setting("pet_care_clinic_service_sec_title", array(
        "default" => "",
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Control( $wp_customize, "pet_care_clinic_service_sec_title", array(
        "label" => __("Section title", "pet-care-clinic"),
        "section" => "pet_care_clinic_services_option",
        "settings" => "pet_care_clinic_service_sec_title",
        "type" => "text",
    )));

    $wp_customize->add_setting('pet_care_clinic_service_setting', array(
       'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Pet_Care_Clinic_Customize_Category_Control( $wp_customize, 'pet_care_clinic_service_setting',
        array('label' => __('Choose category', 'pet-care-clinic'),
            'section' => 'pet_care_clinic_services_option',
            'settings' => 'pet_care_clinic_service_setting'
        )
    ));

    /*---- Contact Page -----*/
    $wp_customize->add_section("pet_care_clinic_contact_page_option", array(
        "title" => __("Contact us Page", "pet-care-clinic"),
        'description'   => sanitize_text_field(__('Set title and define contact form here by entering shortcode','pet-care-clinic')),
        "priority" => 14,
    ));

    $wp_customize->add_setting("pet_care_clinic_contact_sec_title", array(
        "default" => "",
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Control( $wp_customize, "pet_care_clinic_contact_sec_title", array(
        "label" => __("Section title", "pet-care-clinic"),
        "section" => "pet_care_clinic_contact_page_option",
        "settings" => "pet_care_clinic_contact_sec_title",
        "type" => "text",
    )));
    
    $wp_customize->add_setting('pet_care_clinic_contact_form', array(
        'default' => '',
        'sanitize_callback' => 'pet_care_clinic_area_format',
    ));
    $wp_customize->add_control('pet_care_clinic_contact_form', array(
        'label' => __('Contact form shortcode. Ex.[ninja_forms id=5]', 'pet-care-clinic'),
        'section' => 'pet_care_clinic_contact_page_option',
        'setting' => 'pet_care_clinic_contact_form',
        'type' => 'textarea'
    ));
}

add_action('customize_register', 'pet_care_clinic_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pet_care_clinic_customize_preview_js() {
    wp_enqueue_script('pet_care_clinic_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array('customize-preview'), '20130508', true);
}
add_action('customize_preview_init', 'pet_care_clinic_customize_preview_js');

function pet_care_clinic_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}

function pet_care_clinic_sanitize_phone_number( $phone ) {
    return preg_replace( '/[^\d+]/', '', $phone );
}

function pet_care_clinic_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}

function pet_care_clinic_sanitize_dropdown_pages( $page_id, $setting ) {
    $page_id = absint( $page_id );
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function pet_care_clinic_area_format($input) {
   if ( isset($input) && !empty($input)) {
     return esc_textarea($input);
   } else {
    return '';
   }
}
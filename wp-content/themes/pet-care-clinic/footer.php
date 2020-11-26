<?php
/**
 * The template for displaying the footer
 * @package Pet Care Clinic
 */
?>
</div>

<div id="footer-area">
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 ft wow fadeInUp" data-wow-offset="5" data-wow-duration="2.5s" data-wow-delay="0.5s">
                        <?php if ( is_active_sidebar( 'footer-widget-1' ) ){
                            dynamic_sidebar('footer-widget-1');
                        } ?>
                    </div>
                    <div class="col-lg-4 col-md-4 ft wow fadeInUp" data-wow-offset="5" data-wow-duration="2.5s" data-wow-delay="0.5s">
                        <?php if ( is_active_sidebar( 'footer-widget-2' ) ){
                            dynamic_sidebar('footer-widget-2');
                        } ?>
                    </div>
                    <div class="col-lg-4 col-md-4 ft wow fadeInUp" data-wow-offset="5" data-wow-duration="2.5s" data-wow-delay="0.5s">
                        <?php if ( is_active_sidebar( 'footer-widget-3' ) ){
                            dynamic_sidebar('footer-widget-3');
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-to-top"><i class="fa fa-angle-up"></i></div>
    </footer>
    <div class="site-info container">
        <div class="copyright">
            <p><a href="<?php echo esc_url( __( 'https://www.unboxthemes.com/wp-themes/free-pet-wordpress-theme/', 'pet-care-clinic' ) ); 
                    ?>"><?php printf( esc_html__( 'Pet WordPress Theme', 'pet-care-clinic' ) ); ?> </a><?php echo esc_html(get_theme_mod('pet_care_clinic_copyright',__('By Unbox Themes','pet-care-clinic'))); ?>
            </p>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
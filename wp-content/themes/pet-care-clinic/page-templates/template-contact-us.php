<?php
/*
Template Name: Contact Us
*/
?>
<?php get_header(); ?>

<main id="maincontent">
    <div class="content-top">
        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div id="contact-us">
                        <div class="col-lg-8 col-xs-12">
                            <h3><?php echo esc_html( get_theme_mod("pet_care_clinic_contact_sec_title",'') ); ?></h3>
                            <?php
                            $code = get_theme_mod("pet_care_clinic_contact_form");
                            if(isset($code) && !empty($code)){
                                echo do_shortcode(".$code."); 
                            } ?>
                        </div>
                        <div class="col-lg-3 col-lg-offset-1 col-xs-12">
                            <div class="contact-side">
                                <?php dynamic_sidebar('contact-widget'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
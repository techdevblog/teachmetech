<?php
/*
Template Name: Home Page
*/
get_header(); ?>
<main id="maincontent">   
    <?php if( get_theme_mod( 'pet_care_clinic_hide_slider') != '') { ?>
        <?php for($sld=7; $sld<10; $sld++) { ?>
            <?php if( get_theme_mod('pet_care_clinic_page_setting'.$sld)) { ?>
            <?php $slidequery = new WP_query('page_id='.get_theme_mod('pet_care_clinic_page_setting'.$sld,true)); ?>
            <?php while( $slidequery->have_posts() ) : $slidequery->the_post();
                $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                $img_arr[] = $image;
                $id_arr[] = $post->ID;
            endwhile;
        } } ?>
        <?php if(!empty($id_arr)){ ?>
            <div id="slider" class="nivoSlider">
                <?php 
                    $i=1;
                    foreach($img_arr as $url){ ?>
                        <?php if(!empty($url)){ ?>
                        <img src="<?php echo esc_html($url); ?>" title="#slidecaption<?php echo esc_html($i); ?>" alt="<?php the_title(); ?> post thumbnail image"/>
                    <?php }else{ ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/default-slide.jpg" title="#slidecaption<?php echo esc_html($i); ?>" alt="<?php the_title(); ?> post thumbnail image"/>
                    <?php } ?>
                <?php $i++; }  ?>
            </div>
            <?php 
                $i=1;
                foreach($id_arr as $id){ 
                $title = get_the_title( $id );
                $post = get_post($id); 
                setup_postdata( $post );
                $content = substr(strip_tags(get_the_content()), 0, 150); 
            ?>
            <div id="slidecaption<?php echo esc_html($i); ?>" class="nivo-html-caption">
                <h2><?php echo esc_html($title); ?></h2>
                <p><?php echo esc_html($content); ?></p>
                <div class="read-more">
                    <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Read More', 'pet-care-clinic' ); ?><i class="fa fa-angle-right"></i>
                    <span class="screen-reader-text"><?php esc_html_e( 'Read More','pet-care-clinic' );?></span></a>
                </div>
            </div>
        <?php $i++; } ?>
    <?php } } ?>

    <?php if(get_theme_mod("pet_care_clinic_service_setting")) { ?>
    <div class="services">
        <div class="container">
            <?php if(get_theme_mod("pet_care_clinic_service_sec_title")) { ?>
                <div class="text-center">
                    <h3><?php echo esc_html(get_theme_mod('pet_care_clinic_service_sec_title',''));?></h3>
                    <img class="icon-image" src="<?php echo esc_url(get_template_directory_uri().'/images/titleicon.jpg'); ?>" alt="<?php the_title(); ?> post thumbnail image" />
                </div>
            <?php }
            // Get category ID from Theme Customizer
             $catID = get_theme_mod('pet_care_clinic_service_setting');
            // Only get Posts that are assigned to the given category ID
            $service_query = new WP_Query(array(
                'post_type' => 'post',
                'cat' => $catID,
                'posts_per_page' => 4, 
            ));
            while( $service_query->have_posts() ) : $service_query->the_post(); ?>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="service_block">
                        <?php if(has_post_thumbnail()) {?>
                            <div class="col-lg-5 col-md-5">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php } ?>
                        <div class="main-post-box <?php if(has_post_thumbnail()) { ?>col-lg-7 col-md-7"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>>
                            <h4><?php the_title();?></h4>
                            <hr>
                            <p><?php echo esc_html( wp_trim_words(get_the_content(),'12') );?></p>
                            <div class="service-more">
                                <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Learn More', 'pet-care-clinic' ); ?><i class="fa fa-angle-right"></i>
                                <span class="screen-reader-text"><?php esc_html_e( 'Learn More','pet-care-clinic' );?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
    </div>
</main>
<?php } ?>

<div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
        endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
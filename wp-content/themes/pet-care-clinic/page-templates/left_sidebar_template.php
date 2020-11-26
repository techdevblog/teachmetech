<?php
/**
 * Template Name: Left Sidebar Page Template
 *
 * @package WordPress
 * @subpackage Pet Care Clinic
 *
 */
get_header(); ?>
<main id="maincontent">
    <div class="container">
        <div class="row">
            <div id="primary" class="site-content col-lg-9 col-md-8 col-xs-12 col-md-push-4 col-lg-push-3 ">
                <div id="content" role="main">
                    <?php if (have_posts()) : ?>

                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part('template-parts/content', get_post_format());
                            ?>

                        <?php endwhile; ?>

                        <?php pet_care_clinic_paging_nav(); ?>

                    <?php else : ?>

                        <?php get_template_part('template-parts/content', 'none'); ?>

                    <?php endif; ?>
                </div>
            </div>
            <?php if (is_active_sidebar('sidebar-1')) : ?>
                <div id="secondary" class="widget-area col-lg-3 col-md-4 col-xs-12 col-md-pull-8 col-lg-pull-9" role="complementary">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
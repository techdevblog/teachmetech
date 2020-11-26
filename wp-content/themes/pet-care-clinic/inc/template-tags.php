<?php
/**
 * Custom template tags for this theme.
 *
 * @package Pet Care Clinic
 */
if (!function_exists('pet_care_clinic_paging_nav')) :

    function pet_care_clinic_paging_nav() {
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php esc_html_e('Posts navigation', 'pet-care-clinic'); ?></h1>
            <div class="nav-links">

                <?php if (get_next_posts_link()) : ?>
                    <div class="nav-previous"> <?php next_posts_link(__('<i class="fa fa-chevron-left"></i> Older posts', 'pet-care-clinic')); ?></div>
                <?php endif; ?>

                <?php if (get_previous_posts_link()) : ?>
                    <div class="nav-next"><?php previous_posts_link(__('Newer posts <i class="fa fa-chevron-right"></i>', 'pet-care-clinic')); ?> </div>
                <?php endif; ?>

            </div>
        </nav>
        <?php
    }

endif;

if (!function_exists('pet_care_clinic_post_nav')) :

    /**
     * Display navigation to next/previous post when applicable.
     *
     * @return void
     */
    function pet_care_clinic_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);

        if (!$next && !$previous) {
            return;
        }
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php esc_html_e('Post navigation', 'pet-care-clinic'); ?></h1>
            <div class="nav-links">
                <?php
                previous_post_link('<div class="nav-previous">%link</div>', _x('<i class="fa fa-chevron-left"></i> %title', 'Previous post link', 'pet-care-clinic'));
                next_post_link('<div class="nav-next">%link</div>', _x('%title <i class="fa fa-chevron-right"></i>', 'Next post link', 'pet-care-clinic'));
                ?>
            </div>
        </nav>
        <?php
    }

endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function pet_care_clinic_categorized_blog() {
    if (false === ( $pet_care_clinic_all_the_cool_cats = get_transient('pet_care_clinic_all_the_cool_cats') )) {
        // Create an array of all the categories that are attached to posts.
        $pet_care_clinic_all_the_cool_cats = get_categories(array(
            'hide_empty' => 1,
                ));

        // Count the number of categories that are attached to the posts.
        $pet_care_clinic_all_the_cool_cats = count($pet_care_clinic_all_the_cool_cats);

        set_transient('pet_care_clinic_all_the_cool_cats', $pet_care_clinic_all_the_cool_cats);
    }

    if ('1' != $pet_care_clinic_all_the_cool_cats) {
        // This blog has more than 1 category so pet_care_clinic_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so pet_care_clinic_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in pet_care_clinic_categorized_blog.
 */
function pet_care_clinic_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient('pet_care_clinic_all_the_cool_cats');
}

add_action('edit_category', 'pet_care_clinic_category_transient_flusher');
add_action('save_post', 'pet_care_clinic_category_transient_flusher');

/* Font Family*/
function pet_care_clinic_font_family() {
    $font_url = '';
    $font_family = array();
    $font_family[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

    $query_args = array(
        'family'    => rawurlencode(implode('|',$font_family)),
    );
    $font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
    return $font_url;
}
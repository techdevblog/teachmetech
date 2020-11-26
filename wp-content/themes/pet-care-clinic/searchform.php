<?php
/**
 * The template displaying search forms in pet-care-clinic
 *
 * @package Pet Care Clinic
 */
?>

<form method="get" class="form-search" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="form-group">
        <div class="input-group">
            <span class="screen-reader-text"><?php esc_attr('Search for:', 'pet-care-clinic'); ?></span>
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','pet-care-clinic' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
            <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button','pet-care-clinic' ); ?>">
        </div>
    </div>
</form>
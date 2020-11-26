<?php
/**
 * @package Pet Care Clinic
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header page-header">

        <?php the_post_thumbnail('pet-care-clinic-featured', array('class' => 'thumbnail')); ?>

        <h1 class="entry-title "><?php if(the_title( '', '', false ) !='') the_title(); else esc_html_e('Untitled','pet-care-clinic');?></h1>

        <div class="entry-meta">
            <a href="<?php echo esc_url( get_permalink() );?>"><i class="fa fa-calendar-alt"></i><?php echo esc_html( get_the_date()); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
            <a href="<?php echo esc_url( get_permalink() );?>"><i class="fa fa-user"></i><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
        </div>
        
    </header>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'pet-care-clinic'),
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '%',
            'echo' => 1
        ));
        ?>
    </div>

    <footer class="entry-meta">
        <?php the_tags(); ?>
        <?php the_category(); ?>

        <?php edit_post_link(esc_html__('Edit', 'pet-care-clinic'), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>'); ?>
        <hr class="section-divider">
    </footer>
</article>
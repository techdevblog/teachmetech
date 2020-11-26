<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Pet Care Clinic
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_post_thumbnail(); ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php if(the_title( '', '', false ) !='') the_title(); else esc_html_e('Untitled','pet-care-clinic');?></h1>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pet-care-clinic' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<?php edit_post_link(esc_html__( 'Edit', 'pet-care-clinic' ), '<footer class="entry-meta"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>' ); ?>
</article>
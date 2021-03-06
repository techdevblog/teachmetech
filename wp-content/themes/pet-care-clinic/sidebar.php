<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Pet Care Clinic
 */
?>
<main id="maincontent">
	<div id="secondary" class="widget-area col-md-4 col-lg-4" role="complementary">
		<?php do_action( 'pet_care_clinic_before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
	            <h1 class="widget-title"><?php esc_html_e( 'Archives', 'pet-care-clinic' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php esc_html_e( 'Meta', 'pet-care-clinic' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div>
</main>
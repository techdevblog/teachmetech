<?php
/**
 * Pet Care Clinic Theme Customizer
 *
 * @package Pet Care Clinic
 */

if ( ! class_exists( 'Pet_Care_Clinic_Theme_Info' ) ) :

	/**
	 * Pet_Care_Clinic_Theme_Info class.
	 */
	class Pet_Care_Clinic_Theme_Info extends WP_Customize_Control {

		/**
		 * Control type
		 *
		 * @var string control type
		 */
		public $type = 'pet-care-clinic-themeinfo-control';

		/**
		 * Button text
		 *
		 * @var string button text
		 */
		public $button_text = '';

		/**
		 * Button link
		 *
		 * @var string button url
		 */
		public $button_url = '#';

		/**
		 * List of features
		 *
		 * @var array theme features / options
		 */
		public $options = array();

		/**
		 * List of explanations
		 *
		 * @var array additional info
		 */
		public $explained_features = array();

		/**
		 * Pet_Care_Clinic_Theme_Info constructor.
		 *
		 * @param WP_Customize_Manager $manager the customize manager class.
		 * @param string               $id id.
		 * @param array                $args customizer manager parameters.
		 */
		public function __construct( WP_Customize_Manager $manager, $id, array $args ) {
			$this->button_text;
			$manager->register_control_type( 'Pet_Care_Clinic_Theme_Info' );
			parent::__construct( $manager, $id, $args );

		}
		/**
		 * Enqueue resources for the control
		 */
		public function enqueue() {
			wp_enqueue_style( 'pet-care-clinic-style', get_template_directory_uri() . '/inc/css/pet-care-clinic-style.css', '1.0.0' );
		}

		/**
		 * Json conversion
		 */
		public function to_json() {
			parent::to_json();
			$this->json['button_text']        = $this->button_text;
			$this->json['button_url']         = $this->button_url;
			$this->json['options']            = $this->options;
			$this->json['explained_features'] = $this->explained_features;
		}

		/**
		 * Control content
		 */
		public function content_template() {
			?>
			<div class="pet-care-clinic-themeinfo">
				<# if ( data.options ) { #>
					<ul class="pet-care-clinic-themeinfo-features">
						<# for (option in data.options) { #>
							<li><span class="upsell-pro-label"></span>{{ data.options[option] }}
							</li>
							<# } #>
					</ul>
					<# } #>

						<# if ( data.button_text && data.button_url ) { #>
							<a target="_blank" href="{{ data.button_url }}" class="button button-primary" target="_blank">{{
								data.button_text }}</a>
							<# } #>

								<# if ( data.explained_features.length > 0 ) { #>
									<hr />

									<ul class="pet-care-clinic-themeinfo-feature-list">
										<# for (requirement in data.explained_features) { #>
											<li>* {{{ data.explained_features[requirement] }}}</li>
											<# } #>
									</ul>
									<# } #>
			</div>
		<?php
		}
	}
endif;
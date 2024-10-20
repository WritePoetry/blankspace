<?php
/**
 * TranslatePress customizations Class
 *
 * @package           WritePoetry/BlankTheme
 * @subpackage        WritePoetry/BlankTheme/Blank_Theme_Translatepress
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankTheme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Blank_Theme_Translatepress' ) ) :

	/**
	 * The main Blank_Theme_TranslatePress class
	 */
	class Blank_Theme_TranslatePress {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'register_block_bindings' ) );
		}


		public function register_block_bindings() {
			register_block_bindings_source(
				'_blank/translatepress-language-switcher',
				array(
					'label'              => __( 'Translatepress Language Switcher', 'writewhite' ),
					'get_value_callback' => array( $this, 'custom_language_switcher' ),
				)
			);
		}

		/**
		 *  Custom language switcher
		 *
		 * @since 0.0.1
		 */
		public function custom_language_switcher() {
			ob_start();
			?>
			<?php $array = trp_custom_language_switcher(); ?>
			<!-- IMPORTANT! You need to have data-no-translation on the wrapper with the links or TranslatePress will automatically translate them in a secondary language. -->    
			<ul data-no-translation>
				<!--  // Check whether TranslatePress can run on the current path or not. If the path is excluded from translation, trp_allow_tp_to_run will be false -->
				<?php if ( apply_filters( 'trp_allow_tp_to_run', true ) ) { ?>
					<?php foreach ( $array as $name => $item ) { ?>
							<li style="list-style-image: url(<?php echo esc_attr( $item['flag_link'] ); ?>)"> 
								<a href="<?php echo $item['current_page_url']; ?>">
									<?php echo apply_filters( 'custom_language_span_output', '<span>' . $item['short_language_name'] . ':' . $item['language_name'] . '</span>', $item['short_language_name'], $item['language_name'], $item['flag_link'] ); ?></a>
							</li>
					<?php } ?>
				<?php } ?>
			</ul>
			
			<?php
				$output = ob_get_clean();
				return $output;
		}
	}


endif;





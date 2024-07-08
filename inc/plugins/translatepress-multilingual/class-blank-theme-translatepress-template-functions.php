<?php
/**
 * TranslatePress Template Functions.
 *
 * @package blank-theme
 */

if ( ! function_exists( 'white_theme_custom_language_switcher' ) ) {
	/**
	 *  Custom language switcher
	 *
	 * @since 0.0.1
	 */
	function white_theme_custom_language_switcher() {
		?>
		<?php $array = trp_custom_language_switcher();  ?>
		<!-- IMPORTANT! You need to have data-no-translation on the wrapper with the links or TranslatePress will automatically translate them in a secondary language. -->
		<ul data-no-translation>
			<!--  // Check whether TranslatePress can run on the current path or not. If the path is excluded from translation, trp_allow_tp_to_run will be false -->
			<?php if ( apply_filters( 'trp_allow_tp_to_run', true ) ){ ?>
				   <?php foreach ($array as $name => $item){ ?>
						<li style="list-style-image: url(<?php echo $item['flag_link'] ?>)">
							<a href="<?php echo $item['current_page_url']?>">
								<span><?php echo $item['short_language_name']. ':' . $item['language_name']?>
								</span>
							</a>
						</li>
				   <?php } ?>
			<?php } ?>
		</ul>
		<?php
	}
}

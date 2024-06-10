<?php
/**
 * Title: Promotions
 * Slug: blank-theme/promotions
 * Categories: featured
 * Keywords: Promotions
 * Block Types: core/buttons
 */
?>
<!-- wp:group {"metadata":{"name":"Promotions"},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-accent-background-color has-background">
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">
			<?php
				/* Translators: WordPress link. */
				$promo_link = '<a href="' . esc_url( __( '#', 'white-theme' ) ) . '"> how to get it</a>';
				echo sprintf(
					/* Translators: Designed with WordPress */
					esc_html__( 'A promo only for today and %1$s', 'white-theme' ),
					$promo_link
				);
				?>
		</p>
		<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

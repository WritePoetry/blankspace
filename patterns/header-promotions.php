<?php
/**
 * Title: Promotions
 * Slug: _blank/header-promotions
 * Categories: featured
 * Keywords: Promotions
 * Block Types: core/buttons
 */
?>

<!-- wp:group {"metadata":{"name":"Promotions"},"style":{"className":"has-no-root-padding-top","elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-color has-primary-background-color has-text-color has-background has-link-color has-no-root-padding-top" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">
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
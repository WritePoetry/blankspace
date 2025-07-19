<?php
/**
 * Title: Testimonial custom post type 
 * Slug: blankspace/jetpack-testimonials
 * Categories: call-to-action
 * Keywords: newsletter, subscribe, button
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|60"}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--60)">
	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
	<p class="has-text-align-center has-secondary-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase">Testimonials</p>
	<!-- /wp:paragraph -->
	 
	<!-- wp:heading {"textAlign":"center","align":"wide"} -->
	<h2 class="wp-block-heading alignwide has-text-align-center">What our client think about us</h2>
	<!-- /wp:heading -->
	
	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->
 
	<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"jetpack-testimonial","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]},"align":"wide"} -->
	<div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"grid","columnCount":3}} -->

	<!-- wp:post-title {"level":3} /-->
	<!-- wp:post-featured-image {"aspectRatio":"3/4","height":"200px","sizeSlug":"full"} /-->
	<!-- wp:post-excerpt /-->

	<!-- /wp:post-template -->

	<!-- wp:query-no-results -->
	<!-- wp:paragraph {"placeholder":"Your Testimonial Archive currently has no entries. You can start creating them on your dashboard."} -->
	<p><em><?php esc_html_e( 'Your Testimonial Archive currently has no entries. You can start creating them on your dashboard.', 'jetpack-classic-theme-helper' ); ?></em></p>
	<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->

	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->


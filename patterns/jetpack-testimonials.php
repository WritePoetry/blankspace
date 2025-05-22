<?php
/**
 * Title: Testimonial custom post type 
 * Slug: blankspace/jetpack-testimonials
 * Categories: call-to-action
 * Keywords: newsletter, subscribe, button
 */
?>
<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|60"}}},"backgroundColor":"secondary","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-color has-secondary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--60)">
	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"small"} -->
	<p class="has-text-align-center has-primary-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase">Testimonials</p>
	<!-- /wp:paragraph -->
	 
	<!-- wp:heading {"textAlign":"center","align":"wide"} -->
	<h2 class="wp-block-heading alignwide has-text-align-center">What our client think about us</h2>
	<!-- /wp:heading -->
	
	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->
 
	<!-- wp:html -->
	<?php
		// print the newsletter shortcode this way to prevent the <p> tags from being added
		echo do_shortcode( '[testimonials columns=3 display_content=full]' );
	?>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->
 
 

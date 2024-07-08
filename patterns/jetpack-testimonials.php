<?php
/**
 * Title: Testimonial custom post type 
 * Slug: write-white/jetpack-testimonials
 * Categories: call-to-action
 * Keywords: newsletter, subscribe, button
 */
?>
<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"contrast","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-color has-contrast-background-color has-text-color has-background has-link-color">
	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"small"} -->
	<p class="has-text-align-center has-primary-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase">Testimonials</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">What our client think about us</h2>
	<!-- /wp:heading -->
		
	<!-- wp:html -->
	<?php
		// print the newsletter shortcode this way to prevent the <p> tags from being added
	 	echo do_shortcode( '[testimonials columns=2 display_content=full]' );
	?>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->
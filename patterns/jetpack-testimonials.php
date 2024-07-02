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
	
	<!-- wp:html -->
	<?php
		// print the newsletter shortcode this way to prevent the <p> tags from being added
	 	echo do_shortcode( '[testimonials]' );
	?>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->
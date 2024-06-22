<?php
/**
 * Title: Testimonial custom post type 
 * Slug: write-white/jetpack-testimonials
 * Categories: call-to-action
 * Keywords: newsletter, subscribe, button
 */
?>
<!-- wp:group {"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-background-color has-background">

	<!-- wp:html -->
	<?php
		// print the newsletter shortcode this way to prevent the <p> tags from being added
	 	echo do_shortcode( '[testimonials]' );
	?>
	<!-- /wp:html --></div>
	<!-- /wp:group -->

<?php
/**
 * Title: Brevo Newsletter Subscribe
 * Slug: write-white/newsletter-subscribe-brevo
 * Categories: call-to-action
 * Keywords: newsletter, subscribe, button
 */
?>
<!-- wp:group {"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-background-color has-background">

	<!-- wp:html -->
	<?php
		// print the newsletter shortcode this way to prevent the <p> tags from being added
	 	echo do_shortcode( '[sibwp_form id=1]' );
	?>
	<!-- /wp:html --></div>
	<!-- /wp:group -->

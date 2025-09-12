<?php
/**
 * Title: Brevo Newsletter Subscribe
 * Slug: blankspace/newsletter-subscribe-brevo
 * Categories: call-to-action
 * Keywords: newsletter, subscribe, button
 */
?>

<!-- wp:group {"className":"subscribe-newsletter-brevo"} -->
<div class="wp-block-group subscribe-newsletter-brevo">
	<!-- wp:shortcode -->
[sibwp_form id=<?php echo esc_attr( defined('BREVO_FORM_ID') ? BREVO_FORM_ID : 1 ); ?>]
<!-- /wp:shortcode -->
</div>
<!-- /wp:group -->


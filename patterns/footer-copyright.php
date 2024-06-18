<?php
/**
 * Title: Copyright
 * Slug: write-white/footer-copyright
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: newsletter, subscribe, button
 */
?>

<!-- wp:group {"backgroundColor":"base","layout":{"type":"constrained"},"fontSize":"tiny"} -->
<div class="wp-block-group has-base-background-color has-background has-tiny-font-size">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:paragraph -->
		<p>
			<?php echo esc_html( apply_filters( 'eewc_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . gmdate( 'Y' ) ) ); ?>
		</p>
		<!-- /wp:paragraph -->


		<!-- wp:jetpack/contact-info -->
		<div class="wp-block-jetpack-contact-info">
			<!-- wp:jetpack/email {"email":"info@easyenglishwithcristina.com"} -->
			<div class="wp-block-jetpack-email"><a href="mailto:info@easyenglishwithcristina.com">info@easyenglishwithcristina.com</a></div>
			<!-- /wp:jetpack/email -->
		</div>
		<!-- /wp:jetpack/contact-info -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

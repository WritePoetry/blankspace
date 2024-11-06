<?php

/**
 * Title: Footer with copyright
 * Slug: blankspace/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: newsletter, subscribe, button
 */
?>

<!-- wp:group {"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:columns -->
		<div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
			<div class="wp-block-column" style="flex-basis:33.33%">
    			<!-- wp:pattern {"slug":"blankspace/branding"} /-->

				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed est arcu, iaculis eu augue et, auctor bibendum odio. Maecenas ultrices nisl et nibh imperdiet lacinia. Phasellus scelerisque metus velit, nec pellentesque tellus tempus semper.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%">
				<!-- wp:pattern {"slug":"blankspace/newsletter-subscribe-jetpack"} /-->


				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
						<p style="font-style:normal;font-weight:600">Company Information</p>
						<!-- /wp:paragraph -->
						<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","flexWrap":"wrap","orientation":"vertical"}} -->
						<!-- wp:navigation-link {"label":"About Us","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Contact Us","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Blog","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Careers","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Stores","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Sitemap","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- /wp:navigation -->
					</div>
					<!-- /wp:column -->


					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
						<p style="font-style:normal;font-weight:600">Customer Service</p>
						<!-- /wp:paragraph -->
						<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","flexWrap":"wrap","orientation":"vertical"}} -->
						<!-- wp:navigation-link {"label":"Terms & Conditions","type":"custom","url":"/test-page#anchor","kind":"custom","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Privacy Policy","type":"custom","url":"/test-page#anchor","kind":"custom","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Shipping Policy","type":"custom","url":"/test-page#anchor","kind":"custom","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Return and Refund Policy","type":"custom","url":"/test-page#anchor","kind":"custom","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"FAQ","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- /wp:navigation -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
						<p style="font-style:normal;font-weight:600">Account Informations</p>
						<!-- /wp:paragraph -->
						<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","flexWrap":"wrap","orientation":"vertical"}} -->
						<!-- wp:navigation-link {"label":"My Account","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"My Wish List","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Track Your Order","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Sign In","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- wp:navigation-link {"label":"Create an Account","type":"page","url":"#","kind":"post-type","isTopLevelLink":true} /-->
						<!-- /wp:navigation -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->


			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"align":"wide","backgroundColor":"contrast","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide has-text-color has-contrast-color has-alpha-channel-opacity has-contrast-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
 
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide"><!-- wp:social-links {"openInNewTab":true,"size":"has-medium-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
		<ul class="wp-block-social-links has-medium-icon-size is-style-logos-only">
			<!-- wp:social-link {"url":"#","service":"instagram","label":"My Instagram Profile"} /-->
			<!-- wp:social-link {"url":"#","service":"youtube","label":"My YouTube Channel"} /-->
			<!-- wp:social-link {"url":"#","service":"twitter"} /-->
			<!-- wp:social-link {"url":"#","service":"github"} /-->
			<!-- wp:social-link {"url":"#","service":"wordpress"} /-->
		</ul>
		<!-- /wp:social-links -->

		<!-- wp:navigation {"overlayMenu":"never","fontSize":"small"} -->
			<!-- wp:navigation-link {"label":"Sitemap","type":"custom","url":"#","kind":"custom","isTopLevelLink":true} /-->
			<!-- wp:navigation-link {"label":"Open an Issue","type":"custom","url":"#","kind":"custom","isTopLevelLink":true} /-->
			<!-- wp:navigation-link {"label":"Credits","type":"custom","url":"#","kind":"custom","isTopLevelLink":true} /-->
 		<!-- /wp:navigation -->
		 
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"blankspace/copyright"} /-->
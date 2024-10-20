<?php

/**
 * Title: Banner with text on the right
 * Slug: _blank/banner-list-right
 * Categories: banner, call-to-action, featured
 * Viewport width: 1400
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/2985330911_45946e689c_o.jpg","dimRatio":0,"minHeight":100,"minHeightUnit":"vh","align":"full","style":{"color":{"duotone":"var:preset|duotone|blue-orange"}}} -->
<div class="wp-block-cover alignfull" style="min-height:100vh" id="business-english"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/2985330911_45946e689c_o.jpg" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">

			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">

				<!-- wp:column -->
				<div class="wp-block-column"></div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"textColor":"base","fontSize":"small"} -->
					<p class="has-base-color has-text-color has-small-font-size" style="text-transform:uppercase">Only 4 slots available</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":2,"anchor":"lorem-ipsum","style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"0"}}}} -->
					<h2 class="wp-block-heading" id="lorem-ipsum" style="margin-top:0;font-style:normal;font-weight:300">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
					<!-- /wp:heading -->


					<!-- wp:paragraph -->
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut sodales tortor. Vestibulum efficitur lacinia posuere. Etiam efficitur metus vitae tellus pretium vehicula. Curabitur metus dolor, tempus id aliquam volutpat, commodo ac magna.</p>
					<!-- /wp:paragraph -->



					<!-- wp:list {"className":"is-style-checked"} -->
					<ul class="wp-block-list is-style-checked">
						<!-- wp:list-item -->
						<li>First element</li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li>Second element</li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li>Third element</li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li>Fourth element</li>
						<!-- /wp:list-item -->
					</ul>
					<!-- /wp:list -->

				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->
<?php
/**
 * Title: Header inside hero
 * Slug: write-white/header-hero
 * Categories: header, banner, call-to-action
 * Keywords: header, nav, links, button
 * Viewport Width: 1500
 * Block Types: core/template-part/header
 * Inserter: true
 */
?>

<!-- wp:cover {"metadata":{"name":"Merged banner with header"},"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/pexels-charlotte-may-5824814.jpg","dimRatio":50,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="min-height:100vh" id="header-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim has-background-dim "></span>
<img class="wp-block-cover__image-background " alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/pexels-charlotte-may-5824814.jpg" data-object-fit="cover" />
    <div class="wp-block-cover__inner-container">
		<!-- wp:pattern {"slug":"write-white/header-default"} /--> 

		<!-- wp:columns {"align":"wide","style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"textColor":"luminous-vivid-orange","fontSize":"small"} -->
				<p class="has-luminous-vivid-orange-color has-text-color has-small-font-size" style="text-transform:uppercase">Only 4 slots available</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"style":{"typography":{"fontStyle":"normal"},"spacing":{"margin":{"top":"0"}}}} -->
				<h2 class="wp-block-heading" id="lorem-ipsum" style="margin-top:0;font-style:normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
				<!-- /wp:heading -->
				 
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut sodales tortor. Vestibulum efficitur lacinia posuere. Etiam efficitur metus vitae tellus pretium vehicula. Curabitur metus dolor, tempus id aliquam volutpat, commodo ac magna. </p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://github.com/giacomo-secchi/write-white/">Contribute to the project →</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:embed {"url":"https://www.youtube.com/watch?v=q1dblSSzYe4","type":"video","providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-4-3 wp-has-aspect-ratio"} -->
				<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-4-3 wp-has-aspect-ratio">
					<div class="wp-block-embed__wrapper">
						https://www.youtube.com/watch?v=q1dblSSzYe4
					</div>
				</figure>
				<!-- /wp:embed -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
			
    </div>
</div>
<!-- /wp:cover -->
 


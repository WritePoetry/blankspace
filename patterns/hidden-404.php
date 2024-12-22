<?php
/**
 * Title: 404
 * Slug: blankspace/hidden-404
 * Inserter: no
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-group alignwide" style="padding-right:0;padding-left:0">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/404-image.png" alt="<?php echo esc_attr_x( 'Small totara tree on ridge above Long Point', 'image description', 'twentytwentyfive' ); ?>" style="object-fit:cover"/>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom">
			<!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":1} -->
				<h1 class="wp-block-heading" id="page-not-found">
					<?php echo esc_html_x( 'Page not found', '404 error message: Heading for a webpage that is not found', 'blankspace' ); ?>
				</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html_x( 'The page you are looking for doesn\'t exist, or it has been moved. Please try searching using the form below.', '404 error message: Message to convey that a webpage could not be found', 'blankspace' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:button {"className":"back-history"} -->
				<div class="wp-block-button back-history"><a class="wp-block-button__link wp-element-button" href="" target="_blank" rel=" noreferrer noopener nofollow">Go to previous page</a></div>
				<!-- /wp:button -->     
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

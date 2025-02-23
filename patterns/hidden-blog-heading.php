<?php
/**
 * Title: Hidden blog heading
 * Slug: blankspace/hidden-blog-heading
 * Description: Hidden heading for the home page and index template.
 * Inserter: no
 */

?>
<?php 
	// Get the title of the posts page
	$page_ID = get_option( 'page_for_posts' );
?>

<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase"><?php esc_html_e( 'Blog & news', 'blankspace' ); ?></p>
<!-- /wp:paragraph -->
		
<!-- wp:heading {"textAlign":"center","level":2,"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"primary"} -->
<h2 class="wp-block-heading alignwide has-text-align-center has-primary-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0"><?php esc_html_e( get_the_title( $page_ID ) ); ?></h2>
<!-- /wp:heading -->
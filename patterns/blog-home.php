<?php
/**
 * Title: Blog Home
 * Slug: _blank/blog-home
 * Categories: featured
 * Keywords: Hero
 * Block Types: core/buttons
 */
?>
<?php 
	// Get the title of the posts page
	$page_ID = get_option( 'page_for_posts' );
?>
	
<!-- wp:spacer {"height":"var(--wp--preset--spacing--60)"} -->
	<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
	
<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
	<p class="has-text-align-center has-secondary-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase"><?php echo esc_html_x( 'Blog & news', 'writewhite' ); ?></p>
<!-- /wp:paragraph -->
		
<!-- wp:heading {"textAlign":"center","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"primary"} -->
	<h2 class="wp-block-heading alignwide has-text-align-center has-primary-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0"><?php get_template_part( 'template-parts/content/page-title' , null , $page_ID ); ?></h2>
<!-- /wp:heading -->


<!-- wp:spacer {"height":"var(--wp--preset--spacing--60)"} -->
	<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"flex","columns":3},"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-query alignwide">
		
	<!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|60","left":"var:preset|spacing|60","top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">

			<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"clamp(15vw, 30vh, 400px)","align":"wide","style":{"border":{"radius":"15px"}}} /-->
			<!-- wp:post-title {"isLink":true} /-->
			<!-- wp:post-excerpt /-->
			<!-- wp:post-date {"isLink":true} /-->
			<!-- wp:read-more /-->
			 
		</div>
		<!-- /wp:group --> 
	<!-- /wp:post-template -->
	

	<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->



<!-- wp:spacer {"height":"var(--wp--preset--spacing--60)"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->


 
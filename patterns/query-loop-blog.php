<?php
/**
 * Title: Photo blog posts
 * Slug: blankspace/query-loop-blog
 * Categories: query
 * Block Types: core/query
 * Viewport width: 1400
 * Description: A list of posts, 3 columns, with only featured images.
 *
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase">Latest posts</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"wp-block-heading alignwide has-text-align-center has-primary-color has-text-color has-link-color","style":{"spacing":{"margin":{"top":"0"}}}} -->
<h3 class="wp-block-heading alignwide has-text-align-center has-primary-color has-text-color has-link-color" style="margin-top:0">This Website has a Blog Section</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"border":{"width":"1px"},"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"borderColor":"cyan-bluish-gray","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-cyan-bluish-gray-border-color" style="border-width:1px;padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","align":"full"} /-->
<!-- wp:post-title {"level":3} /-->
<!-- wp:post-date {"isLink":true} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.12em"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-4"}}}},"textColor":"accent-4","fontSize":"small"} -->
	<p class="has-accent-4-color has-text-color has-link-color has-small-font-size"><?php echo esc_html_x( 'Written by', 'Prefix before the author name. The post author name is displayed in a separate block.', 'blankspace' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:post-author-name {"isLink":true,"fontSize":"small"} /-->
</div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"showMoreOnNewLine":false} /-->
 
<!-- wp:group {"layout":{"type":"constrained","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:read-more {"style":{"typography":{"textDecoration":"underline"}}} /--></div>
<!-- /wp:group -->

 
</div>
<!-- /wp:group -->
 


<!-- /wp:post-template -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous {"label":"<?php esc_html_e( 'Newer Posts', 'blankspace' ); ?>"} /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next {"label":"<?php esc_html_e( 'Older Posts', 'blankspace' ); ?>"} /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:group -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'blankspace' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results -->

<!-- wp:spacer {"height":"var:preset|spacing|70"} -->
<div style="height:var(--wp--preset--spacing--70)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:query -->


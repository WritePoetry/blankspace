
<?php
/**
 * Title: Blog query loop
 * Slug: blankspace/template-query-loop-blog
 * Inserter: no
 */
?>

<!-- wp:query {"query":{"perPage":12,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":3},"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"clamp(15vw, 30vh, 400px)","align":"wide","style":{"spacing":{"margin":{"bottom":"0"}}}} /-->

		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50"}},"border":{"right":{"color":"var:preset|color|cyan-bluish-gray","width":"1px"},"bottom":{"color":"var:preset|color|cyan-bluish-gray","width":"1px"},"left":{"width":"1px","color":"var:preset|color|cyan-bluish-gray"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide" style="border-right-color:var(--wp--preset--color--cyan-bluish-gray);border-right-width:1px;border-bottom-color:var(--wp--preset--color--cyan-bluish-gray);border-bottom-width:1px;border-left-color:var(--wp--preset--color--cyan-bluish-gray);border-left-width:1px;padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);padding-top:var(--wp--preset--spacing--50)">
			<!-- wp:post-title {"isLink":true,"fontSize":"large"} /-->
			<!-- wp:post-excerpt {"excerptLength":35} /-->
			<!-- wp:post-date {"isLink":true} /-->
			<!-- wp:read-more /-->

			<!-- wp:spacer {"height":"var(--wp--preset--spacing--40)"} -->
			<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->
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


 
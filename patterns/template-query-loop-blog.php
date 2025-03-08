
<?php
/**
 * Title: Blog query loop
 * Slug: blankspace/template-query-loop-blog
 * Inserter: no
 */
?>

<!-- wp:query {"query":{"pages":1,"offset":1,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":12},"displayLayout":{"type":"flex","columns":3},"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"align":"wide"} -->
		<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"clamp(15vw, 30vh, 400px)","align":"wide"} /-->
		<!-- wp:post-title {"isLink":true} /-->
		<!-- wp:post-excerpt /-->
		<!-- wp:post-date {"isLink":true} /-->
		<!-- wp:read-more /-->

		<!-- wp:spacer {"height":"var(--wp--preset--spacing--40)"} -->
		<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
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
 


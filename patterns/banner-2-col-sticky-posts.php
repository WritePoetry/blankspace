<?php
/**
 * Title: Banner with video
 * Slug: blankspace/banner-2-col-sticky-posts
 * Categories: header, banner, call-to-action
 * Keywords: header, nav, links, button
 * Viewport Width: 1500
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background"><!-- wp:query {"query":{"pages":1,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false,"perPage":10},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-query alignfull"><!-- wp:post-template {"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase">Newest post</p>
<!-- /wp:paragraph -->

<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"0"}}}} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} /-->

<!-- wp:post-date {"isLink":true} /-->

<!-- wp:read-more {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"4px"}},"backgroundColor":"secondary","textColor":"white"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-featured-image {"isLink":true,"align":"wide","style":{"border":{"radius":"40px"}}} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
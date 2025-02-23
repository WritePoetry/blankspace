<?php
/**
 * Title: Hero
 * Slug: blankspace/hero-product
 * Categories: featured
 * Keywords: Hero
 * Block Types: core/buttons
 */
?>
<!-- wp:cover {"url":"http://localhost:8888/wp-content/uploads/2024/06/2832316-hd_1920_1080_30fps.mp4","id":15,"dimRatio":50,"customOverlayColor":"#FFF","backgroundType":"video","isDark":false,"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#FFF"></span><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="http://localhost:8888/wp-content/uploads/2024/06/2832316-hd_1920_1080_30fps.mp4" data-object-fit="cover"></video><div class="wp-block-cover__inner-container"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">Great Product</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
	<!-- wp:woocommerce/featured-product {"dimRatio":20,"editMode":false,"productId":16} -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="http://localhost:8888/?product=test-product">Shop now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->


<!-- /wp:woocommerce/featured-product -->



<!-- wp:woocommerce/single-product {"productId":16} -->
<div class="wp-block-woocommerce-single-product"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"isDescendentOfSingleProductBlock":true} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:post-title {"isLink":true,"__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductBlock":true} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductBlock":true} /-->

<!-- wp:post-excerpt {"__woocommerceNamespace":"woocommerce/product-query/product-summary"} /-->

<!-- wp:woocommerce/add-to-cart-form {"isDescendentOfSingleProductBlock":true} /-->

<!-- wp:woocommerce/product-meta -->
<div class="wp-block-woocommerce-product-meta"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/product-sku /-->

<!-- wp:post-terms {"term":"product_cat","prefix":"Category: "} /-->

<!-- wp:post-terms {"term":"product_tag","prefix":"Tags: "} /--></div>
<!-- /wp:group --></div>
<!-- /wp:woocommerce/product-meta --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:woocommerce/single-product -->
</div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->

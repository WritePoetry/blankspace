<?php
/**
 * Title: Testimonial custom post type 
 * Slug: blankspace/jetpack-testimonials
 * Categories: call-to-action
 * Keywords: newsletter, subscribe, button
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/pexels-walls-io-440716388-15569285.jpg","id":431,"dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"isDark":true,"sizeSlug":"large","align":"full","className":"is-dark","style":{"color":{"duotone":"var:preset|duotone|orange-gray"},"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80","right":"var:preset|spacing|80"}}}} -->
<div class="wp-block-cover alignfull is-dark" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)"><img class="wp-block-cover__image-background wp-image-431 size-large" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/pexels-walls-io-440716388-15569285.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column -->


<!-- wp:column {"className":"is-vertically-aligned-center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-text-align-left has-secondary-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase">Testimonials</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"left","align":"wide"} -->
<h2 class="wp-block-heading alignwide has-text-align-left"><?php echo wp_kses_post( _x( 'What our<br>client think<br>about us', 'Heading of the Testimonials pattern', 'blankspace' ) ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"aspectRatio":"2/3","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"30px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/pexels-andrew-3178818.jpg" alt="" style="border-radius:30px;aspect-ratio:2/3;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"jetpack-testimonial","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|70","padding":{"right":"var:preset|spacing|60","left":"var:preset|spacing|60","top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-content /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"aspectRatio":"3/4","width":"60px","height":"60px","sizeSlug":"full","style":{"border":{"radius":"100%"}}} /-->

<!-- wp:post-title {"level":4,"fontSize":"small"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Your Testimonial Archive currently has no entries. You can start creating them on your dashboard."} -->
<p><em><?php esc_html_e( 'Your Testimonial Archive currently has no entries. You can start creating them on your dashboard.', 'blankspace' ); ?></em></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div></div>
<!-- /wp:cover -->


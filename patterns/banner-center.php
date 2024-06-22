<?php
/**
 * Title: Banner with text centered
 * Slug: write-white/banner-center
 * Categories: banner, call-to-action, featured
 * Viewport width: 1400
 */
?>

 

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/videos/5473798-uhd_4096_2160_25fps.mp4","dimRatio":50,"customOverlayColor":"#FFF","backgroundType":"video","minHeight":100,"minHeightUnit":"vh","isDark":false,"style":{"color":{"duotone":"var:preset|duotone|blue-and-lavender"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#FFF"></span><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/videos/5473798-uhd_4096_2160_25fps.mp4" data-object-fit="cover"></video><div class="wp-block-cover__inner-container">
        <!-- wp:heading {"textAlign":"center","textColor":"primary","fontSize":"x-large"} -->
        <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-xx-large-font-size" id="#"><?php echo esc_html_x( 'The beginning of an incredible story', 'Heading of the hero section', 'whritewhite' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"textAlign":"center"} -->
        <p class="has-text-align-center">With <strong>_Blank theme</strong> you will be able to create an incredible website with ease!</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Download Write_Blank theme →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
 
     
		 
</div></div>
<!-- /wp:cover -->



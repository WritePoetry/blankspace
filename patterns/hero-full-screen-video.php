<?php
/**
 * Title: Hero with full screen video
 * Slug: blankspace/hero-full-screen-video
 * Categories: banner, call-to-action, featured
 * Description: A hero with a full screen video, heading, short paragraph and buttons.
 * Viewport width: 1400
 *
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/videos/1778068-hd_1280_720_30fps.mp4","dimRatio":50,"customOverlayColor":"#FFF","backgroundType":"video","minHeight":100,"minHeightUnit":"vh","gradient":"gradient-1","isDark":true,"align":"full","style":{"color":{"duotone":"var:preset|duotone|blue-and-lavender"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-dark" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-gradient-1-gradient-background" style="background-color:#FFF"></span><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/videos/1778068-hd_1280_720_30fps.mp4" data-object-fit="cover"></video><div class="wp-block-cover__inner-container">
    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"uppercase"}},"textColor":"secondary","fontSize":"medium"} -->
    <p class="has-text-align-center has-secondary-color has-text-color has-link-color has-medium-font-size" style="text-transform:uppercase">Kickstarter theme</p>
    <!-- /wp:paragraph -->
 
    <!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" id="#"><?php echo esc_html_x( 'The beginning of an incredible story', 'Heading of the hero section', 'blankspace' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":"has-text-align-center","fontSize":"medium"} -->
    <p class="has-text-align-center has-medium-font-size">With <strong>BlankSpace theme</strong> you will be able<br>to create an <strong>incredible website</strong> with ease!</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons"><!-- wp:button -->
    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://github.com/WritePoetry/blankspace-theme/releases/latest" target="_blank" rel=" noreferrer noopener nofollow">Download BlankSpace →</a></div>
    <!-- /wp:button -->

    <!-- wp:button {"className":"is-style-outline"} -->
    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">Ciao ti voglio bene</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons -->
		 
</div></div>
<!-- /wp:cover -->
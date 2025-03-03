<?php
/**
 * Title: Hero with full screen image
 * Slug: blankspace/hero-full-screen-image
 * Categories: banner, call-to-action, featured
 * Description: A hero with a full screen image, heading, short paragraph and buttons.
 * Viewport width: 1400
 *
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/2186228674_34104ccbbf_o.jpg","dimRatio":50,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","gradient":"black-contrast-radial","align":"full","className":"is-dark","style":{"color":{"duotone":"var:preset|duotone|blue-and-lavender"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-dark" style="min-height:100vh" id="hero-banner-image"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-black-contrast-radial-gradient-background"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/2186228674_34104ccbbf_o.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"uppercase"}},"textColor":"secondary","fontSize":"medium"} -->
    <p class="has-text-align-center has-secondary-color has-text-color has-link-color has-medium-font-size" style="text-transform:uppercase"><?php esc_html_e( 'Kickstarter theme', 'blankspace' ); ?></p>
    <!-- /wp:paragraph -->
 
    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
    <h2 class="wp-block-heading has-text-align-center" id="#" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'The beginning of an incredible story', 'Heading of the hero section', 'blankspace' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"textAlign":"center","fontSize":"medium"} -->
    <p class="has-text-align-center has-medium-font-size"><?php echo wp_kses_post( 'With <strong>BlankSpace theme</strong> you will be able<br>to create an <strong>incredible website</strong> with ease!', 'blankspace' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons"><!-- wp:button -->
    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://github.com/WritePoetry/blankspace-theme/releases/latest" target="_blank" rel=" noreferrer noopener nofollow"><?php esc_html_e( 'Download BlankSpace →', 'blankspace' ); ?></a></div>
    <!-- /wp:button -->

    <!-- wp:button {"className":"is-style-outline"} -->
    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Ciao ti voglio bene', 'blankspace' ); ?></a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons -->
		 
</div></div>
<!-- /wp:cover -->
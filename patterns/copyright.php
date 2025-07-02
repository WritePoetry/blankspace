<?php
/**
 * Title: Copyright
 * Slug: blankspace/copyright
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: newsletter, subscribe, button
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
 
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"blankspace/copyright"}}}} -->
<p class="has-tiny-font-size">Copyright Block</p>
<!-- /wp:paragraph -->

<!-- wp:site-title {"level":0,"isLink":false,"fontSize":"tiny"} /-->

<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"blankspace/admin-email"}}},"fontSize":"tiny"} -->
<p class="has-tiny-font-size">Admin Email Address Block</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"tiny"} -->
<p class="has-tiny-font-size">
    <?php
    /* Translators: WordPress link. */
    $theme_link = '<a href="' . esc_url( __( 'https://write-poetry.com/#blankspace', 'blankspace' ) ) . '" target="_blank" rel="nofollow">BlankSpace</a>';
    echo sprintf(
        /* Translators: Made with BlankSpace */
        esc_html__( 'Made with %1$s', 'blankspace' ),
        $theme_link
    );
    ?>
</p>
<!-- /wp:paragraph -->
 
 
</div>
<!-- /wp:group -->


 
<?php
/**
 * Title: Latest post section heading with kicker
 * Slug: blankspace/hidden-heading-kicker-latest-posts
 * Inserter: no
 */

?>
 
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
    <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
    <p class="has-text-align-center has-secondary-color has-text-color has-link-color has-small-font-size" style="text-transform:uppercase"><?php esc_html_e( 'Latest posts', 'blankspace' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","level":2,"textColor":"primary","style":{"spacing":{"margin":{"top":"0"}}}} -->
    <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color" style="margin-top:0"><?php esc_html_e( 'This Website has a Blog Section', 'blankspace' ); ?></h2>
    <!-- /wp:heading --></div>
<!-- /wp:group -->



 

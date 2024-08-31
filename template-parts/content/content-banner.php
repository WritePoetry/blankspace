<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php
    $args = array(
        'name'      => $args,
        'post_type' => 'page',
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php the_content(); ?>
        <?php 
        endwhile; 
        wp_reset_postdata(); ?>
    <?php endif; ?>
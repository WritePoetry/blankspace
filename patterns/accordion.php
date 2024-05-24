<?php
/**
 * Title: Post Meta
 * Slug: write-white/accordion
 * Categories: query
 * Keywords: post meta
 * Block Types: core/template-part/post-meta
 */
?>
<!-- wp:html -->

<div
  data-wp-interactive='wpmovies'
  <?php echo wp_interactivity_data_wp_context( array( 'isOpen' => false ) ); ?>
  data-wp-watch="callbacks.logIsOpen"
>
  <button
    data-wp-on--click="actions.toggle"
    data-wp-bind--aria-expanded="context.isOpen"
    aria-controls="p-1"
  >
    Toggle
  </button>

  <p id="p-1" data-wp-bind--hidden="!context.isOpen">
    This element is now visible!
  </p>
</div>
<!-- /wp:html -->
<?php
/**
* Title: Banner with GitHub latest version
* Slug: blankspace/github-project-versions
* Categories: banner, call-to-action, featured
* Viewport width: 1400
*/
?>

<!-- wp:group {"align":"wide","style":{"dimensions":{"minHeight":"50vh"},"spacing":{"blockGap":"var:preset|spacing|100"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide" style="min-height:50vh"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"250px","sizeSlug":"large","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-large is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/write-poetry-transparent-logo.png" alt="" style="width:250px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>WritePoetry Plugin latest version:&nbsp;</p>
<!-- /wp:paragraph -->

<!-- wp:write-poetry/api-fetcher {"url":"https://api.github.com/repos/WritePoetry/wordpress-plugin/releases/latest","text":"tag_name","link":"html_url"} -->
<span data-url="https://api.github.com/repos/WritePoetry/wordpress-plugin/releases/latest" data-link="html_url" data-text="tag_name" class="wp-block-write-poetry-api-fetcher">Fetching data…</span>
<!-- /wp:write-poetry/api-fetcher --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"250px","sizeSlug":"large","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-large is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/_BlankSpace_theme_transparent-logo.png" alt="" style="width:250px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>_BlankSpace Theme latest version:&nbsp;</p>
<!-- /wp:paragraph -->

<!-- wp:write-poetry/api-fetcher {"url":"https://api.github.com/repos/WritePoetry/blankspace-theme/releases/latest","text":"tag_name","link":"html_url"} -->
<span data-url="https://api.github.com/repos/WritePoetry/blankspace-theme/releases/latest" data-link="html_url" data-text="tag_name" class="wp-block-write-poetry-api-fetcher">Fetching data…</span>
<!-- /wp:write-poetry/api-fetcher --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

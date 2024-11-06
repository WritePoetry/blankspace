<?php
/**
* Title: Banner with GitHub latest version
* Slug: blankspace/github-project-versions
* Categories: banner, call-to-action, featured
* Viewport width: 1400
*/
?>



<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
    <!-- wp:image {"width":"250px","sizeSlug":"large","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-large is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/write-poetry-transparent-logo.png" alt=""  style="width:250px"/></figure>
<!-- /wp:image -->


 
         
        <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph -->
	<p>Write Poetry Plugin latest version:&nbsp;</p>
	<!-- /wp:paragraph -->
	 
	<!-- wp:write-poetry/api-fetcher {"url":" https://api.github.com/repos/WritePoetry/wordpress-plugin/releases/latest","text":"tag_name","link":"html_url"} -->
	<span data-url="https://api.github.com/repos/WritePoetry/wordpress-plugin/releases/latest" data-link="html_url" data-text="tag_name" class="wp-block-write-poetry-api-fetcher">Fetching data…</span>
	<!-- /wp:write-poetry/api-fetcher -->
</div>
<!-- /wp:group -->
    

</div>
<!-- /wp:column -->
 <!-- wp:column -->
<div class="wp-block-column">
    



        <!-- wp:image {"width":"250px","sizeSlug":"large","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-large is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/_Blank_theme_transparent-logo.png" alt="" style="width:250px"/></figure>
<!-- /wp:image -->


<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph -->
	<p>_Blank Theme latest version:&nbsp;</p>
	<!-- /wp:paragraph -->

	<!-- wp:write-poetry/api-fetcher {"url":" https://api.github.com/repos/WritePoetry/_blank-theme/releases/latest","text":"tag_name","link":"html_url"} -->
	<span data-url="https://api.github.com/repos/WritePoetry/_blank-theme/releases/latest" data-link="html_url" data-text="tag_name" class="wp-block-write-poetry-api-fetcher">Fetching data…</span>
	<!-- /wp:write-poetry/api-fetcher -->
</div>
<!-- /wp:group -->
    
       


</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

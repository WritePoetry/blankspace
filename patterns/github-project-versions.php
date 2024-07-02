<?php
/**
* Title: Banner with GitHub latest version
* Slug: write-white/github-project-versions
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

	 <!-- wp:html -->
     <div class="api-fetch" data-api-url="https://api.github.com/repos/giacomo-secchi/write-poetry/releases/latest" data-api-link="html_url" data-api-text="tag_name"></div>
        <!-- /wp:html -->
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

	 <!-- wp:html -->
     <div class="api-fetch" data-api-url="https://api.github.com/repos/giacomo-secchi/write-white/releases/latest" data-api-link="html_url" data-api-text="tag_name"></div>
        <!-- /wp:html -->
</div>
<!-- /wp:group -->
    
       


</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

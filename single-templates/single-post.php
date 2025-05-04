<?php
/**
 * This is the template used for displaying single posts of the blog/news 
 */
get_header();
the_post();

the_content();
// add here default components that should always appear at the bottom of the page
get_template_part( "hep/social-share", "components", [ 
	"class" => "no-inline-margins",
] );

get_footer();
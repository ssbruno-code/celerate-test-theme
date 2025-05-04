<?php

get_header();
if( have_posts() ) :
    while ( have_posts() ) : the_post();
        // Include the page content template.
        the_content();
    endwhile; // end of the loop.
endif;

get_footer();
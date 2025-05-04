<?php

/**
 * @component       hep/404-page
 * @description     Displays the template for 404 Error page.
 */

$default_args = array(
	'class' => '',
	'404_heading' => get_field( '404_heading', 'option' ) ?: 'Sorry, page not found',
	'404_body_copy' => get_field( '404_body_copy', 'option' ) ?: '<p>404 Error. The page you are looking for was moved, removed, renamed or might never have existed. You stumbled upon a broken link.</p>',
);
$args = array_merge( $default_args, $args );
?>
<section class="error404-page-content">
	<h1 class="error404-heading"><?php echo $args['404_heading']; ?></h1>
	<div class="error404-body-copy"><?php echo $args['404_body_copy']; ?></div>
</section>
<?php
/**
 * @component       acf_blocks/hero-banner-top
 * @description     Add a description for the component
*/

$default_args = array("class" => "");
$args = array_merge($default_args, $args ?? []);
?>
<div class="acf-blocks-hero-banner-top <?php echo $args['class']; ?>">
    <div class="container">
        <h1>Hero Banner</h1>
    </div>
</div>
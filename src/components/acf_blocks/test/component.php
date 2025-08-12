<?php
/**
 * @component       acf_blocks/test
 * @description     Add a description for the component
*/

$default_args = array("class" => "");
$args = array_merge($default_args, $args ?? []);
?>
<div class="acf-blocks-test <?php echo $args['class']; ?>">

</div>
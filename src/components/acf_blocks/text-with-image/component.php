<?php
/**
 * @component       acf_blocks/text-with-image
 * @description     Add a description for the component
*/
wp_enqueue_style('font-awesome');

$use_alternative_style = get_field('use_alternative_style');
$title_ti = get_field('title_ti') ? get_field('title_ti') : 'End-to-End Process Automation';
$description_ti = get_field('subtitle_ti') ? get_field('subtitle_ti') : 'Rapidly deploy and securely manage end to end processes.';
$image_ti = get_field('image_ti') ? get_field('image_ti') : get_template_directory_uri() . '/src/assets/images/notebook-.png';
?>
<section class="acf-blocks-text-with-image <?php echo $use_alternative_style ? ' alternative-style' : ''; ?>">
    <div class="container text-image-block">
        <div class="row py-5 ">
            <div class="content col-12 col-md-6 d-flex flex-column <?php echo $use_alternative_style ? ' order-first order-md-last' : ' order-last order-md-first'; ?>">
                <h2><?php echo esc_html( $title_ti ); ?></h2>
                <h3 class="pt-2"><?php echo esc_html( $description_ti ); ?></h3>
                <ul class="list-unstyled arrow-list mb-0">
                <?php 
                    if(have_rows('list_ti')): 
                        while(have_rows('list_ti')): the_row();
                            ?>
                            <li><?php echo esc_html( get_sub_field('item_text') ); ?></li>
                            <?php 
                        endwhile; 
                    endif;
                ?>
                </ul>
                
            </div>
            <div class="image col-12 col-md-6 d-flex flex-column justify-content-center align-items-center img  <?php echo $use_alternative_style ? ' order-last order-md-first' : ' order-first order-md-last'; ?>">
                <img src="<?php echo esc_url($image_ti); ?>" alt=" banner" class="hero-img img-fluid">
            </div>
        </div>
    </div>
</section>
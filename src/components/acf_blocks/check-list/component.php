<?php
/**
 * @component       acf_blocks/check-list
 * @description     Add a description for the component
*/

$title_ck = get_field('title_ck') ? get_field('title_ck') : 'JobTraQ\'s no-node workflow platform enables management of any process';
$cta_text_ck = isset(get_field('cta_button_ck')['title']) ? get_field('cta_button_ck')['title'] : 'See a Demo';
$cta_link_ck = isset(get_field('cta_button_ck')['url']) ? get_field('cta_button_ck')['url'] : '#';
$cta_tab_ck = isset(get_field('cta_button_ck')['target']) ? get_field('cta_button_ck')['target'] : '_self'; 
?>
<section class="acf-blocks-check-list">
    <div class="text-center container py-5">

        <h2 class="pb-2"><?php echo esc_html( $title_ck ); ?></h2>

        <div class="row g-2 my-4">

            <?php 
                if(have_rows('checklist_ck')): 
                    while(have_rows('checklist_ck')): the_row();
                        ?>
                        <div class="col-12 col-md-4 ">
                            <div class="cap-item"><i class="cap-icon fa fa-check"></i><?php echo esc_html( get_sub_field('list_item_text') ); ?></div>
                        </div>
                        <?php 
                    endwhile; 
                endif;
            ?>  

        </div><!-- /.row -->
        <div class="cta-btn pt-4">
            <a href="<?php echo esc_url($cta_link_ck); ?>" target="<?php echo esc_attr($cta_tab_ck); ?>" class="btn btn-primary"><?php echo esc_html($cta_text_ck); ?></a>
        </div>
    </div>
</section>
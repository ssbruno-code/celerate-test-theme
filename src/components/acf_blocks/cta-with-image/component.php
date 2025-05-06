<?php
/**
 * @component       acf_blocks/cta-with-image
 * @description     Add a description for the component
*/

$title_ct = get_field('title_ct') ? get_field('title_ct') : 'Integrate with JobTraQ';
$subtitle_ct = get_field('subtitle_ct') ? get_field('subtitle_ct') : 'Integrations';
$description_ct = get_field('description_ct') ? get_field('description_ct') : 'Seamlessly integrate with your existing manufacturing tech stack and other applications critical to your operations.';
$cta_text_ct = isset(get_field('cta_button_ct')['title']) ? get_field('cta_button_ct')['title'] : 'See a Demo';
$cta_link_ct = isset(get_field('cta_button_ct')['url']) ? get_field('cta_button_ct')['url'] : '#';
$cta_tab_ct = isset(get_field('cta_button_ct')['target']) ? get_field('cta_button_ct')['target'] : '_self'; 
$image_ct = get_field('image_ct') ? get_field('image_ct') : get_template_directory_uri() . '/src/assets/images/ctaimg.png';
?>
<section class="acf-blocks-cta-with-image">
    <div class="container cta-container">
        <div class="row py-5">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center content order-2 order-md-1">
                <h3><?php echo esc_html( $subtitle_ct ); ?></h3>
                <h2><?php echo esc_html( $title_ct ); ?></h2>
                <p class="text-hero py-3">
                    <?php echo esc_html( $description_ct ); ?>
                </p>
                <div class="button-cta">
                    <a href="<?php echo esc_url($cta_link_ct); ?>" target="<?php echo esc_attr($cta_tab_ct); ?>" class="btn btn-primary">
                        <?php echo esc_html($cta_text_ct); ?>
                    </a>
                </div>
                
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center img order-1 order-md-2">
                <img src="<?php echo esc_url($image_ct); ?>" alt="hero banner" class="hero-img img-fluid">

            </div>
        </div>
        
    </div>
</section>
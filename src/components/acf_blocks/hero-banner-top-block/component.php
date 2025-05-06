<?php
/**
 * @component       acf_blocks/hero-banner-top
 * @description     Add a description for the component
*/

$title = get_field('title') ? get_field('title') : 'Quote Management';
$description = get_field('description') ? get_field('description') : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet aliquam lectus, in scelerisque eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc iaculis at felis sed pretium.';
$cta_text = isset(get_field('cta_button')['title']) ? get_field('cta_button')['title'] : 'See a Demo';
$cta_link = isset(get_field('cta_button')['url']) ? get_field('cta_button')['url'] : '#';
$cta_tab = isset(get_field('cta_button')['target']) ? get_field('cta_button')['target'] : '_self'; 
$img_url = get_field('image') ? get_field('image') : get_template_directory_uri() . '/src/assets/images/her-img.png';
?>
<section class="acf-blocks-hero-banner-top" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/assets/images/bg-hero.png'); background-size: cover; background-repeat: no-repeat; background-position: center right;">
    <div class="container hero-container">
        <div class="row">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center content order-2 order-md-1">
                <h1><?php echo esc_html( $title ); ?></h1>
                <p class="text-hero py-3">
                <?php echo esc_html( $description ); ?>
                </p>
                <div class="button-cta">
                    <a href="<?php echo esc_url($cta_link); ?>" target="<?php echo esc_attr($cta_tab); ?>" class="btn btn-secondary">
                        <?php echo esc_html($cta_text); ?>
                    </a>
                </div>
                
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center img order-1 order-md-2">
                <img src="<?php echo esc_url($img_url); ?>" alt="hero banner" class="hero-img img-fluid">

            </div>
        </div>
        
    </div>
</section>
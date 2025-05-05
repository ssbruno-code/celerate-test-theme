<?php
/**
 * @component       acf_blocks/hero-banner-top
 * @description     Add a description for the component
*/

$default_args = array("class" => "");
$args = array_merge($default_args, $args ?? []);
?>
<section class="acf-blocks-hero-banner-top <?php echo $args['class']; ?>" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/assets/images/bg-hero.png'); background-size: cover; background-repeat: no-repeat; background-position: center right;">
    <div class="container hero-container">
        <div class="row py-5">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center content order-2 order-md-1">
                <h1>Quote Management</h1>
                <p class="text-hero py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet aliquam lectus, in scelerisque eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc iaculis at felis sed pretium.
                </p>
                <div class="button-cta">
                    <a href="#" class="btn btn-secondary">
                        See a Demo
                    </a>
                </div>
                
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center img order-1 order-md-2">
                <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/her-img.png" alt="hero banner" class="hero-img img-fluid">

            </div>
        </div>
        
    </div>
</section>
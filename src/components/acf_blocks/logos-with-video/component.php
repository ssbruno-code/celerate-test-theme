<?php
/**
 * @component       acf_blocks/logos-with-video
 * @description     Add a description for the component
*/

$default_args = array("class" => "");
$args = array_merge($default_args, $args ?? []);
?>
<section class="acf-blocks-logos-with-video <?php echo $args['class']; ?>">
    <div class="container content py-5">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h2 class="title-1 text-center">Trusted by leading companies worldwise</h2>
            <div class="row py-5 logos border-bottom">
                <div class="col-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/nasa.png" alt="" class="img-fluid"></div>
                <div class="col-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/ellwood.png" alt="" class="img-fluid"></div>
                <div class="col-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/tcenergy.png" alt="" class="img-fluid"></div>
                <div class="col-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/baillie.png" alt="" class="img-fluid"></div>
            </div>

            <div class="row cta-video mt-5">
                <div class="col-12 col-md-5 desc pr-0">
                    <div class="d-flex flex-column">
                        <h2 class="title-2 ">See for Yourself</h2>
                        <p class="description py-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet aliquam lectus, in scelerisque eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <div class="button-cta">
                            <a href="#" class="btn btn-primary">
                                See a Demo
                            </a>
                        </div>
                    </div>                
                </div>
                <div class="col-12 col-md-7 video ">
                    <!-- Video box -->
                    <div class="video-wrapper position-relative js-video">

    <!-- ▸ Poster frame (change to your own poster) -->
                        <img
                            src="<?php echo get_template_directory_uri(); ?>/src/assets/images/video-thumb.png"
                            class="img-fluid w-100 video-thumb"
                            alt="Workflow demo video"
                        >

                        <!-- ▸ Play button -->
                        <button
                            class="video-play-btn position-absolute top-50 start-50 translate-middle p-0 border-0 bg-transparent"
                            aria-label="Play video"
                        >
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/src/assets/images/VideoCircle.png"
                                class="img-fluid"
                                alt="Play icon"
                            >
                        </button>

                        <!-- ▸ Hidden template holding the ACF-supplied iframe -->
                        <template class="video-template">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/lLJbHHeFSsE?si=KU_7MkYfuauWKU5t" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </template>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
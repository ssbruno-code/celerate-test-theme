<?php
/**
 * @component       acf_blocks/logos-with-video
 * @description     Add a description for the component
*/

$title_lv = get_field('title_lv') ? get_field('title_lv') : 'Trusted by leading companies worldwise';
$description_lv = get_field('description_lv') ? get_field('description_lv') : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet aliquam lectus, in scelerisque eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.';	 
$logo_1_lv = get_field('logo_1_lv') ? get_field('logo_1_lv') : get_template_directory_uri() . '/src/assets/images/nasa.png';
$logo_2_lv = get_field('logo_2_lv') ? get_field('logo_2_lv') : get_template_directory_uri() . '/src/assets/images/ellwood.png';
$logo_3_lv = get_field('logo_3_lv') ? get_field('logo_3_lv') : get_template_directory_uri() . '/src/assets/images/tcenergy.png';
$logo_4_lv = get_field('logo_4_lv') ? get_field('logo_4_lv') : get_template_directory_uri() . '/src/assets/images/baillie.png';
$second_title_lv = get_field('second_title_lv') ? get_field('second_title_lv') : 'See for Yourself';
$cta_text_lv = isset(get_field('cta_button_lv')['title']) ? get_field('cta_button_lv')['title'] : 'See a Demo';
$cta_link_lv = isset(get_field('cta_button_lv')['url']) ? get_field('cta_button_lv')['url'] : '#';
$cta_tab_lv = isset(get_field('cta_button_lv')['target']) ? get_field('cta_button_lv')['target'] : '_self'; 
$video_thumbnail_lv = get_field('video_thumbnail_lv') ? get_field('video_thumbnail_lv') : get_template_directory_uri() . '/src/assets/images/video-thumb.png';
$video_iframe_lv = get_field('video_iframe_lv') ? get_field('video_iframe_lv') : '';

?>

<section class="acf-blocks-logos-with-video">
    <div class="container content py-5">
        <div class="d-flex flex-column justify-content-center align-items-center py-3">
            <h2 class="title-1 text-center"><?php echo esc_html( $title_lv ); ?></h2>
            <div class="row py-5 logos border-bottom">
                <div class="col-6 col-md-3"><img src="<?php echo esc_url($logo_1_lv); ?>" alt="" class="img-fluid"></div>
                <div class="col-6 col-md-3"><img src="<?php echo esc_url($logo_2_lv); ?>" alt="" class="img-fluid"></div>
                <div class="col-6 col-md-3"><img src="<?php echo esc_url($logo_3_lv); ?>" alt="" class="img-fluid"></div>
                <div class="col-6 col-md-3"><img src="<?php echo esc_url($logo_4_lv); ?>" alt="" class="img-fluid"></div>
            </div>

            <div class="row cta-video mt-5">
                <div class="col-12 col-md-5 desc pr-0">
                    <div class="d-flex flex-column">
                        <h2 class="title-2 "><?php echo esc_html( $second_title_lv ); ?></h2>
                        <p class="description py-3"><?php echo esc_html( $description_lv ); ?></p>
                        <div class="button-cta">
                            <a href="<?php echo esc_url($cta_link_lv); ?>" target="<?php echo esc_attr($cta_tab_lv); ?>" class="btn btn-primary">
                                <?php echo esc_html($cta_text_lv); ?>
                            </a>
                        </div>
                    </div>                
                </div>
                <div class="col-12 col-md-7 video ">
                    <!-- Video box -->
                    <div class="video-wrapper position-relative js-video">
                        <img src="<?php echo esc_url($video_thumbnail_lv); ?>"class="img-fluid w-100 video-thumb" alt="Workflow demo video">

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

                        <?php 
                            if ($video_iframe_lv) {
                                ?>
                                <template class="video-template">
                                    <?php echo $video_iframe_lv; ?>
                                </template>
                                <?php
                            }
                        ?>

                        <!-- ▸ Hidden template holding the ACF-supplied iframe -->
                        
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
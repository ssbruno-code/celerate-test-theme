<?php
/**
 * @component       acf_blocks/testimonial-quotes
 * @description     Add a description for the component
*/

$testimonials_t = get_field('testimonials_t');

?>
<section class="acf-blocks-testimonial-quotes" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/assets/images/bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
    <div class="testimonials-section text-white">
        <div class="container">
            <div class="row justify-content-center gy-5 gx-0 gx-md-5">

            <?php
                foreach ( $testimonials_t as $testimonial ) {

                    /* Either pass the whole object … */
                    $quote               = get_field( 'testimonial_text', $testimonial );
                    $quote_source        = get_field( 'name',            $testimonial );
                    $quote_source_detail = get_field( 'detail',          $testimonial );
                    $quote_img = get_field( 'author_image',          $testimonial );
                    ?>
                    <div class="col-12 col-md-4">
                        <div class="card testimonial-card h-100 border-0 shadow-sm">
                            <div class="card-body d-flex flex-column">
                
                                <blockquote class="blockquote mb-4 flex-grow-1">
                                    <p class="mb-0"><?php echo esc_html( $quote ); ?></p>
                                </blockquote>
                
                                <div class="d-flex align-items-center pt-3">
                                    <img src="<?php echo esc_url( $quote_img ); ?>"
                                         alt=""
                                         class="rounded-circle me-3 testimonial-avatar">
                                    <div>
                                        <span class="fw-bold text-primary d-block">
                                            <?php echo esc_html( $quote_source ); ?>
                                        </span>
                                        <small class="text-muted">
                                            <?php echo esc_html( $quote_source_detail ); ?>
                                        </small>
                                    </div>
                                </div>
                
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>                

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
</section>
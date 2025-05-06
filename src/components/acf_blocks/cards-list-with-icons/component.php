<?php
/**
 * @component       acf_blocks/cards-list-with-icons
 * @description     Add a description for the component
*/

$title_cl = get_field('title_cl') ? get_field('title_cl') : 'What is the cost of managing through spreadsheets, email, and subpar legacy applications?';
$title_2_cl = get_field('title_2_cl') ? get_field('title_2_cl') : 'Broken processes cost more than you think.';
$card_1_title_cl = get_field('card_1_title_cl') ? get_field('card_1_title_cl') : 'Does your company encounter these challenges?';
$card_2_title_cl = get_field('card2_title_cl') ? get_field('card2_title_cl') : 'Business costs of these pain points include:';
$image_icon_1_cl = get_field('image_icon_1_cl') ? get_field('image_icon_1_cl') : get_template_directory_uri() . '/src/assets/images/icon1.png';
$image_icon_2_cl = get_field('image_icon_2_cl') ? get_field('image_icon_2_cl') : get_template_directory_uri() . '/src/assets/images/icon2.png';
$image_icon_3_cl = get_field('image_icon_3_cl') ? get_field('image_icon_3_cl') : get_template_directory_uri() . '/src/assets/images/icon3.png';
$image_icon_4_cl = get_field('image_icon_4_cl') ? get_field('image_icon_4_cl') : get_template_directory_uri() . '/src/assets/images/icon4.png';
$text_icon_1_cl = get_field('text_icon_1_cl') ? get_field('text_icon_1_cl') : 'Decrease Revenue';
$text_icon_2_cl = get_field('text_icon_2_cl') ? get_field('text_icon_2_cl') : 'Slow Turnaround';
$text_icon_3_cl = get_field('text_icon_3_cl') ? get_field('text_icon_3_cl') : 'Delayed Reporting';
$text_icon_4_cl = get_field('text_icon_4_cl') ? get_field('text_icon_4_cl') : 'Organizational Friction';

?>
<section class="pain-points-section acf-blocks-cards-list-with-icons py-5" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/assets/images/bg-4.png'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
  <div class="container">

    <!-- Top headline -->
    <h2 class="text-center title mb-5">
      <?php echo esc_html( $title_cl ); ?>
    </h2>

    <!-- Two white cards -->
    <div class="row justify-content-center gx-4 gy-4">
      <!-- Challenges card -->
      <div class="col-12 col-md-6">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title fw-bold">
              <?php echo esc_html( $card_1_title_cl ); ?>
            </h5>
            <ul class="list-unstyled arrow-list mb-0">
                <?php 
                if(have_rows('card_1_list_cl')): 
                    while(have_rows('card_1_list_cl')): the_row();
                        ?>
                        <li><?php echo esc_html( get_sub_field('item_text') ); ?></li>
                        <?php 
                    endwhile; 
                endif;
                ?>
              <!-- <li>Inability to keep track of high volumes of requests, jobs, or tasks</li>
              <li>Poor project coordination and status tracking</li>
              <li>Unclear decision making</li>
              <li>Delayed reporting</li>
              <li>Lack of traceability</li>
              <li>Audit results include red flags and issues</li> -->
            </ul>
          </div>
        </div>
      </div>

      <!-- Business-costs card -->
      <div class="col-12 col-md-6">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title fw-bold">
              <?php echo esc_html( $card_2_title_cl ); ?>
            </h5>
            <ul class="list-unstyled arrow-list mb-0">
            <?php 
                if(have_rows('card_2_title_cl')): 
                    while(have_rows('card_2_title_cl')): the_row();
                        ?>
                        <li><?php echo esc_html( get_sub_field('item_text') ); ?></li>
                        <?php 
                    endwhile; 
                endif;
                ?>
              <!-- <li>Lost business opportunities and poor company image</li>
              <li>Reduced labor and machine efficiency</li>
              <li>Impaired ability to grow revenue and capacity</li>
              <li>Poor decision making</li>
              <li>Organizational friction</li> -->
            </ul>
          </div>
        </div>
      </div>
    </div><!-- /.row -->

    <!-- Sub-headline -->
    <h3 class="text-center my-5 pt-2 title">
      <?php echo esc_html( $title_2_cl ); ?>
    </h3>

    <!-- Icons row -->
    <div class="row text-center gy-4 gy-md-0 pb-3">
      <!-- 1 -->
      <div class="col-6 col-md-3">
        <div class="icon-circle mx-auto mb-5">
          <img src="<?php echo esc_url($image_icon_1_cl); ?>" alt="icon-1" class="img-fluid">
        </div>
        <h3 class="icon-text mb-0"><?php echo esc_html( $text_icon_1_cl ); ?></h3>
      </div>

      <!-- 2 -->
      <div class="col-6 col-md-3">
        <div class="icon-circle mx-auto mb-5">
          <img src="<?php echo esc_url($image_icon_2_cl); ?>" alt="icon-2" class="img-fluid">
        </div>
        <h3 class="icon-text mb-0"><?php echo esc_html( $text_icon_2_cl ); ?></h3>
      </div>

      <!-- 3 -->
      <div class="col-6 col-md-3">
        <div class="icon-circle mx-auto mb-5">
          <img src="<?php echo esc_url($image_icon_3_cl); ?>" alt="icon-3" class="img-fluid">
        </div>
        <h3 class="icon-text mb-0"><?php echo esc_html( $text_icon_3_cl ); ?></h3>
      </div>

      <!-- 4 -->
      <div class="col-6 col-md-3">
        <div class="icon-circle mx-auto mb-5">
          <img src="<?php echo esc_url($image_icon_4_cl); ?>" alt="icon-4" class="img-fluid">
        </div>
        <h3 class="icon-text mb-0"><?php echo esc_html( $text_icon_4_cl ); ?></h3>
      </div>
    </div><!-- /.row -->

  </div><!-- /.container -->
</section>

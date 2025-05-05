<?php
/**
 * @component       acf_blocks/cards-list-with-icons
 * @description     Add a description for the component
*/

?>
<section class="pain-points-section acf-blocks-cards-list-with-icons py-5" style="background-image: url('<?php echo get_template_directory_uri(); ?>/src/assets/images/bg-4.png'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
  <div class="container">

    <!-- Top headline -->
    <h2 class="text-center title mb-5">
      What is the cost of managing through spreadsheets,<br class="d-none d-md-inline">
      email, and subpar legacy applications?
    </h2>

    <!-- Two white cards -->
    <div class="row justify-content-center gx-4 gy-4">
      <!-- Challenges card -->
      <div class="col-12 col-md-6">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title fw-bold">
              Does your company encounter these challenges?
            </h5>
            <ul class="list-unstyled arrow-list mb-0">
              <li>Inability to keep track of high volumes of requests, jobs, or tasks</li>
              <li>Poor project coordination and status tracking</li>
              <li>Unclear decision making</li>
              <li>Delayed reporting</li>
              <li>Lack of traceability</li>
              <li>Audit results include red flags and issues</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Business-costs card -->
      <div class="col-12 col-md-6">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title fw-bold">
              Business costs of these pain points include:
            </h5>
            <ul class="list-unstyled arrow-list mb-0">
              <li>Lost business opportunities and poor company image</li>
              <li>Reduced labor and machine efficiency</li>
              <li>Impaired ability to grow revenue and capacity</li>
              <li>Poor decision making</li>
              <li>Organizational friction</li>
            </ul>
          </div>
        </div>
      </div>
    </div><!-- /.row -->

    <!-- Sub-headline -->
    <h3 class="text-center my-5 pt-2 title">
      Broken processes cost more than you think.
    </h3>

    <!-- Icons row -->
    <div class="row text-center gy-4 gy-md-0 pb-3">
      <!-- 1 -->
      <div class="col-6 col-md-3">
        <div class="icon-circle mx-auto mb-5">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/icon1.png" alt="" class="img-fluid">
        </div>
        <h3 class="icon-text mb-0">Decrease Revenue</h3>
      </div>

      <!-- 2 -->
      <div class="col-6 col-md-3">
        <div class="icon-circle mx-auto mb-5">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/icon2.png" alt="" class="img-fluid">
        </div>
        <h3 class="icon-text mb-0">Slow Turnaround</h3>
      </div>

      <!-- 3 -->
      <div class="col-6 col-md-3">
        <div class="icon-circle mx-auto mb-5">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/icon3.png" alt="" class="img-fluid">
        </div>
        <h3 class="icon-text mb-0">Delayed Reporting</h3>
      </div>

      <!-- 4 -->
      <div class="col-6 col-md-3">
        <div class="icon-circle mx-auto mb-5">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/icon4.png" alt="" class="img-fluid">
        </div>
        <h3 class="icon-text mb-0">Organizational Friction</h3>
      </div>
    </div><!-- /.row -->

  </div><!-- /.container -->
</section>

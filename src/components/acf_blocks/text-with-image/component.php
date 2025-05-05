<?php
/**
 * @component       acf_blocks/text-with-image
 * @description     Add a description for the component
*/
wp_enqueue_style('font-awesome');
?>
<section class="acf-blocks-text-with-image">
    <div class="container text-image-block">
        <div class="row py-5">
            <div class="content col-12 col-md-6 d-flex flex-column order-2 order-md-1">
                <h2>End-to-End Process Automation</h2>
                <h3 class="pt-2">Rapidly deploy and securely manage end to end processes.</h3>
                <ul class="list-unstyled arrow-list mb-0">
                    <li>Manage Cross-department work activities, reviews, and approvals</li>
                    <li>Full traceability</li>
                    <li>Visual drag and drop workflow designer</li>
                    <li>Configurable dashboards</li>
                    <li>Notifications, alerts and escalations</li>
                    <li>Integrate with enterprise business applications (ERP, CRM, RPA, HRIS)</li>
                </ul>
                
            </div>
            <div class="image col-12 col-md-6 d-flex flex-column justify-content-center align-items-center img order-1 order-md-2">
                <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/notebook-.png" alt="hero banner" class="hero-img img-fluid">
            </div>
        </div>
    </div>
</section>
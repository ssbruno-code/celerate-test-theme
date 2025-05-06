<?php

/**
 * @component       Site Header
 * @description     Main header of the website
 */

$header_logo = get_field('header_logo', 'option') ? get_field('header_logo', 'option') : get_template_directory_uri() . '/src/assets/images/logo.png';
$headercta_text = isset(get_field('header_cta', 'option')['title']) ? get_field('header_cta', 'option')['title'] : 'Request a Free Trial';
$headercta_link = isset(get_field('header_cta', 'option')['url']) ? get_field('header_cta', 'option')['url'] : '#';
$headercta_tab = isset(get_field('header_cta', 'option')['target']) ? get_field('header_cta', 'option')['target'] : '_self'; 

?>
<header class="celeratewpcss-header border-bottom">
  <!-- ── Mobile-only top bar: CTA button ──────────────────────────────── -->
  <div class="d-md-none d-flex justify-content-end p-2">
    <a href="#" class="btn btn-primary btn-sm"><?php echo $headercta_text; ?></a>
  </div>

  <!-- ── Mobile-only second bar: logo + hamburger ─────────────────────── -->
  <div class="d-md-none d-flex justify-content-between align-items-center px-3 border-bottom"> </div>

  <!-- ── Desktop / shared navbar ──────────────────────────────────────── -->
  <nav class="navbar navbar-expand-md bg-white">
    <div class="container py-2">
      <a class="navbar-brand " href="<?php echo home_url(); ?>">
        <img class="img-fluid" src="<?php echo $header_logo; ?>" alt="Logo" height="48" />
      </a>

      <!-- Re-use same toggler for ≤ md (hidden on desktop) -->
      <button
        class="navbar-toggler d-md-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#mainNav"
        aria-controls="mainNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >

        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/src/assets/images/menu-icon.svg" alt="menu icon" height="48" />
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="mainNav">
        <ul class="navbar-nav mb-2 mb-md-0 me-md-3">
        <?php
          $menu_location = 'header_menu'; // Replace with your menu location
          $locations     = get_nav_menu_locations();
          if ( isset( $locations[ $menu_location ] ) ) {
            $menu_id     = $locations[ $menu_location ];
            $menu_items  = wp_get_nav_menu_items( $menu_id );
            $current_id  = get_queried_object_id(); // For active class logic
            $current_url = ( is_ssl() ? "https://" : "http://" ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            
            foreach ( $menu_items as $item ) {
              // Check if active
              $active_class = '';
              if ( $item->object_id == $current_id ) {
                $active_class = 'active';
              } elseif ( untrailingslashit( $item->url ) === untrailingslashit( $current_url ) ) {
                $active_class = 'active';
              }

              echo '<li class="nav-item">';
              echo '<a href="' . esc_url( $item->url ) . '" class="nav-link ' . esc_attr( $active_class ) . '">';
              echo esc_html( $item->title );
              echo '</a></li>';
            }
          }
          ?>
        </ul>
        <!-- Desktop CTA -->
        <a href="<?php echo $headercta_link; ?>" target="<?php echo $headercta_tab; ?>" class="btn btn-primary d-none d-md-inline-block"><?php echo $headercta_text; ?></a>
      </div>
    </div>
  </nav>
</header>
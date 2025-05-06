<?php

/**
 * @component       site_footer
 * @description     Displays the main website footer
 */


?>
<?php

/**
 * @component       Site Header
 * @description     Main header of the website
 */

$footer_logo = get_field('footer_logo', 'option') ? get_field('footer_logo', 'option') : get_template_directory_uri() . '/src/assets/images/logo_w.png';
$footercta_text = isset(get_field('footer_cta', 'option')['title']) ? get_field('footer_cta', 'option')['title'] : 'See a Demo';
$footercta_link = isset(get_field('footer_cta', 'option')['url']) ? get_field('footer_cta', 'option')['url'] : '#';
$footercta_tab = isset(get_field('footer_cta', 'option')['target']) ? get_field('footer_cta', 'option')['target'] : '_self'; 
$copyright_text = get_field('copyright_text', 'option') ? get_field('copyright_text', 'option') : '© 2023 Celerate. All rights reserved.';
?>
<footer class="celeratewpcss-site-footer">

  <!-- ── Desktop / shared navbar ──────────────────────────────────────── -->
  <nav class=" ">
    <div class="container">
		<div class="row pt-3 pb-5" style="border-bottom: 1px solid #117EC3;">
			<div class="col-12 col-md-3 px-0">
				<a class="navbar-brand " href="<?php echo home_url(); ?>">
					<img class="img-fluid" src="<?php echo $footer_logo; ?>" alt="Logo" height="48" />
				</a>
			</div>
			<div class="col-12 col-md-9 d-flex flex-column  flex-md-row justify-content-end gap-3 px-0">
				<ul class="navbar-nav d-flex flex-md-row gap-3 justify-content-end mr-5 pt-5 pb-2 pt-md-0 pb-md-0">
					<?php
						$menu_location = 'footer_menu'; // Replace with your menu location
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
				<a href="<?php echo $footercta_link; ?>" target="<?php echo $footercta_tab; ?>" class=" btn btn-secondary"><?php echo $footercta_text; ?></a>

			</div>
		</div>
		<div class="row">
			<div class="d-flex justify-content-between flex-column  flex-md-row  px-0">
				<div class="copy d-flex align-items-center ">
					<p class="copyright "><?php echo $copyright_text; ?></p>

				</div>
				<ul class="terms navbar-nav p-0 d-flex flex-row gap-3 justify-content-start justify-content-md-end">
					<?php
						$menu_locationz = 'subfooter_menu'; // Replace with your menu location
						$locations     = get_nav_menu_locations();
						if ( isset( $locations[ $menu_locationz ] ) ) {
							$menu_id     = $locations[ $menu_locationz ];
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
			</div>
    </div>
  </nav>
</footer>
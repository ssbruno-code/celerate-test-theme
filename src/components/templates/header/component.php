<?php

/**
 * @component       Site Header
 * @description     Main header of the website
 */
?>
<header class="celeratewpcss-header border-bottom">
  <!-- ── Mobile-only top bar: CTA button ──────────────────────────────── -->
  <div class="d-md-none d-flex justify-content-end p-2">
    <a href="#" class="btn btn-primary btn-sm">Request a Free Trial</a>
  </div>

  <!-- ── Mobile-only second bar: logo + hamburger ─────────────────────── -->
  <div class="d-md-none d-flex justify-content-between align-items-center px-3 border-bottom"> </div>

  <!-- ── Desktop / shared navbar ──────────────────────────────────────── -->
  <nav class="navbar navbar-expand-md bg-white">
    <div class="container py-2">
      <a class="navbar-brand " href="<?php echo home_url(); ?>">
        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo.png" alt="Logo" height="48" />
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
          <li class="nav-item"><a class="nav-link" href="#">Overview</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Platform Features</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Use Cases</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
        </ul>
        <!-- Desktop CTA -->
        <a href="#" class="btn btn-primary d-none d-md-inline-block">Request a Free Trial</a>
      </div>
    </div>
  </nav>
</header>
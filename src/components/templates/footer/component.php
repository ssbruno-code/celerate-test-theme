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
?>
<footer class="celeratewpcss-site-footer">

  <!-- ── Desktop / shared navbar ──────────────────────────────────────── -->
  <nav class=" ">
    <div class="container">
		<div class="row pt-3 pb-5" style="border-bottom: 1px solid #117EC3;">
			<div class="col-12 col-md-3 px-0">
				<a class="navbar-brand " href="<?php echo home_url(); ?>">
					<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo_w.png" alt="Logo" height="48" />
				</a>
			</div>
			<div class="col-12 col-md-9 d-flex flex-column  flex-md-row justify-content-end gap-3 px-0">
				<ul class="navbar-nav d-flex flex-md-row gap-3 justify-content-end mr-5 pt-5 pb-2 pt-md-0 pb-md-0">
					<li class="nav-item"><a class="nav-link" href="#">Overview</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Platform Features</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Use Cases</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
				</ul>
				<a href="#" class=" btn btn-secondary">Contact Us</a>

			</div>
		</div>
		<div class="row">
			<div class="d-flex justify-content-between flex-column  flex-md-row  px-0">
				<div class="copy d-flex align-items-center ">
					<p class="copyright ">Copyright 2023, All Rights Reserved.</p>

				</div>
				<ul class="terms navbar-nav p-0 d-flex flex-row gap-3 justify-content-start justify-content-md-end">
					<li class="nav-item py-0"><a class="nav-link" href="#">Privacy Policy</a></li>|
					<li class="nav-item py-0"><a class="nav-link" href="#">Terms of Use</a></li>|
					<li class="nav-item py-0"><a class="nav-link" href="#">Sitemap</a></li>
				</ul>
			</div>
    </div>
  </nav>
</footer>
<footer id="footer">
	<div class="footer-top">

		<div class="container">

			<div class="row justify-content-center">
				<div class="col-lg-6">
					<a href="?action=home" class="footer-logo"><img src="public/assets/img/logo/code.png" alt=""></a>
					<h3>Mon Blog</h3>
					<p>Merci d'avoir lu jusqu'au bout.</p>
				</div>
			</div>

			<div class="social-links">
				<a href="#" target="_blank"><i class="bx bxl-facebook"></i></a>
				<a href="#" target="_blank"><i class="bx bxl-linkedin"></i></a>
			</div>

			<?php if (isset($session['user']) && !empty($session['user']) && $session['user']['role'] === 'admin'): ?>
				<div class="mt-3">
					<a href="?action=admin" class="fs-5"><strong>Dashboard</strong></a>
				</div>
			<?php endif ?>

		</div>
	</div>

	<div class="container footer-bottom clearfix">
		<div class="copyright">
			Template de base, &copy; <strong><span>Knight</span></strong>. Tous les droits sont réservés.
		</div>
		<div class="credits">
			<!-- All the links in the footer should remain intact. -->
			<!-- You can delete the links only if you purchased the pro version. -->
			<!-- Licensing information: https://bootstrapmade.com/license/ -->
			<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/knight-free-bootstrap-theme/ -->
			Conçu par <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
		</div>
	</div>
</footer>
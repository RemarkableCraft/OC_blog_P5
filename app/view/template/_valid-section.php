<section id="valid" class="valid section-bg">
	<div class="container">
		<!-- ===== Title Valid Section ===== -->
		<div class="section-title">
			<h2>Validation d'inscription</h2>
		</div>
		<!-- END Title Valid Section -->

		<!-- ======= Valid Inscription Form ======= -->
		<form action="?action=confirm" method="POST" role="form" class="needs-validation d-flex flex-column align-items-center" data-aos="fade-left" novalidate>

			<?php if (isset($errorValid) && !empty($errorValid)): ?>
				<div class="alert alert-danger" role="alert">
					<?= $errorValid ?>
				</div>
			<?php endif ?>

			<?php if (isset($successValid) && !empty($successValid)): ?>
				<div class="alert alert-success" role="alert">
					<?= $successValid ?>
				</div>
			<?php endif ?>

			<input type="hidden" name="token" value="<?= $token ?>">

			<input type="hidden" name="user" value="<?= $user ?>">

			<div class="mt-3 form-group w-75">
				<input type="text" name="code" id="code" class="form-control" placeholder="Code" required value="<?php if (isset($post) && !empty($post)) {echo $post['code'];} ?>">
				<div class="invalid-feedback">Ton code est dans le mail</div><!-- message required -->
			</div><!-- code -->

			<div class="mt-3 form-group">
				<div class="text-center">
					<button type="submit" name="soumission" value="valid" class="btn-get-started">Valider</button>
				</div>
			</div>
		</form>
		<!-- END Valid Inscription Form -->
	</div>
</section>
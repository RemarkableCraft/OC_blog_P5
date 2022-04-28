<section id="contact" class="form section-bg">
	<div class="container">

		<div class="section-title">
			<h2>Contact</h2>
			<p>Vous avez un projet? Une question? N'hésitez pas ce formulaire est là pour ça.</p>
		</div>

		<div class="col-lg-8 mt-5 mt-lg-0 mx-auto">

			<form action="?action=contact" method="POST" novalidate  class="needs-validation php-email-form shadow" data-aos="fade-left">
				<?php if (isset($errorContact) && !empty($errorContact)): ?>
					<div class="alert alert-danger" role="alert">
						<?= $errorContact ?>
					</div>
				<?php endif ?>

				<?php if (isset($successContact) && !empty($successContact)): ?>
					<div class="alert alert-success" role="alert">
						<?= $successContact ?>
					</div>
				<?php endif ?>

				<div class="row">
					<!-- ======= Identité expéditeur ======= -->
					<div class="col-md-6 form-group">
						<input type="text"
										name="name"
										class="form-control"
										id="name"
										placeholder="Nom, Prénom, Société"
										value="<?php if (isset($post) && !empty($post)) { echo $post['name']; } ?>"
										required>
						<div class="invalid-feedback">Il faut mettre quelque chose ici</div><!-- message required -->
					</div><!-- END Identité expéditeur -->

					<!-- ======= Mail expéditeur ======= -->
					<div class="col-md-6 form-group mt-3 mt-md-0">
						<input type="email"
										name="email"
										class="form-control"
										id="email"
										placeholder="Mail"
										value="<?php if (isset($post) && !empty($post)) { echo $post['email']; } ?>"
										required>
						<div class="invalid-feedback">Sans le mail je ne pourrais pas te répondre</div><!-- message required -->
					</div><!-- END Mail expéditeur -->
				</div>

				<div class="form-group mt-3">
					<!-- ======= Message ======= -->
					<textarea class="form-control" name="message" rows="5" placeholder="Message" required><?php if (isset($post) && !empty($post)) { echo $post['message']; } ?></textarea>
					<div class="invalid-feedback">Désolé mais je n'ai pas entendu ce que tu voulais</div><!-- message required -->
					<!-- END Message -->
				</div>

				<div class="text-center">
					<button type="submit" class="btn-get-started" name="soumission">Envoyer</button>
				</div>
			</form>

		</div>

	</div>
</section>
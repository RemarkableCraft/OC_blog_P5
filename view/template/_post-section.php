<section id="portfolio-details" class="portfolio-details pt-0">
	<div class="container">

		<div class="row gx-5">

			<div class="col-lg-8" data-aos="fade-right">
				<?= $post['contentPost'] ?>
			</div>

			<div class="col-lg-4" data-aos="fade-left">
				<img src="<?= $post['imagePost'] ?>" class="mb-4 img-fluid">
				<div class="portfolio-info">
					<ul>
						<li><strong>Publié par</strong> : <?= $post['pseudo'] ?></li>
						<?php if ($post['updateDatePost'] !== NULL): ?>
							<li><strong>Mis à jour le</strong>: <?= $this->dateToFrench($post['updateDatePost'],"d F Y") ?></li>
						<?php endif ?>
						<li><strong>Créer le</strong> : <?= $this->dateToFrench($post['createDatePost'],"d F Y") ?></li>
					</ul>
				</div>
				<hr>
				<div class="portfolio-description">
					<h3>Commentaires</h3>

					<?php if (isset($session['user']) && !empty($session['user'])): ?>
						<form action="?action=comment" method="POST" novalidate  class="needs-validation php-email-form" data-aos="fade-left">

							<?php if (isset($errorComment) && !empty($errorComment)): ?>
								<div class="alert alert-danger" role="alert">
									<?= $errorComment ?>
								</div>
							<?php endif ?>

							<?php if (isset($successComment) && !empty($successComment)): ?>
								<div class="alert alert-success" role="alert">
									<?= $successComment ?>
								</div>
							<?php endif ?>

							<input type="hidden" name="post" value="<?= $post['idPost'] ?>">

							<input type="hidden" name="autor" value="<?= $session['user']['idUser'] ?>">

							<div class="form-group mt-3">
								<!-- ======= Message ======= -->
								<textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
								<div class="invalid-feedback">Désolé mais je ne vois pas ce que tu as voulu dire.</div><!-- message required -->
								<!-- END Message -->
							</div>

							<div class="text-center">
								<button type="submit" class="btn-get-started" name="soumission" value="editComment">Envoyer</button>
							</div>
						</form>
					<?php else: ?>
						<div class="alert alert-success" role="alert">
							Connectez-vous pour laisser un commentaire
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>
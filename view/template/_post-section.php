<section id="portfolio-details" class="portfolio-details pt-0">
	<div class="container">

		<div class="row gx-5">

			<div class="col-lg-8">
				<?= $post['contentPost'] ?>
			</div>

			<div class="col-lg-4">
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
				</div>
			</div>

		</div>
	</div>
</section>
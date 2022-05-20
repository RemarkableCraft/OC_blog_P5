<?php $lien = $this->get_SERVER('QUERY_STRING');?>

<section id="blog" class="blog">
	<div class="container">
		<!-- ===== Title Blog Section ===== -->
		<div class="section-title" data-aos="fade-up">
			<h2>Blog</h2>
			<?php if ($lien === 'action=home' OR $lien === ''): ?>
				<p>Voici la liste de mes derniers articles</p>
			<?php endif ?>
		</div>
		<!-- END Title Blog Section -->

		<div class="row blog-container" data-aos="fade-up" data-aos-delay="200">
			<?php while($post = $posts->fetch(PDO::FETCH_ASSOC)): ?>
				<!-- ===== Card Blog Section ===== -->
				<div class="col-lg-4 col-md-6 blog-item">
					<div class="blog-wrap">
						<!-- ===== Image Post ===== -->
						<img src="<?= html_entity_decode($post['imagePost']) ?>" class="img-fluid">
						<!-- END Image Post -->

						<!-- ===== Infos Post ===== -->
						<div class="blog-info">
							<h4><?= $post['titlePost'] ?></h4>

							<div class="mb-2">
								<?php if ($post['updateDatePost'] === NULL): ?>
									<p>Posté le <?= $this->dateToFrench($post['createDatePost'],"d F Y") ?></p>
								<?php else: ?>
									<p>Mise à jour le <?= $this->dateToFrench($post['updateDatePost'],"d F Y") ?></p>
								<?php endif ?>
							</div>

							<div>
								<p><?= nl2br($post['chapoPost']) ?></p>
							</div>

							<div class="blog-links">
								<a href="?action=post&id=<?= $post['idPost'] ?>" title="Lire la suite"><i class="bx bx-link"></i></a>
							</div>
						</div>
						<!-- END Infos Post -->
					</div>
				</div>
				<!-- END Card Blog Section -->
			<?php endwhile ?>
		</div>

		<!-- ===== Button Blog Post ===== -->
		<?php if ($lien === 'action=home' OR $lien === ''): ?>
			<div class="d-flex justify-content-center">
				<a data-aos="fade-up" data-aos-delay="200" href="?action=blog" class="btn-get-started scrollto">En voir d'autre</a>
			</div>
		<?php endif ?>
		<!-- END Button Blog Post -->
	</div>
</section>
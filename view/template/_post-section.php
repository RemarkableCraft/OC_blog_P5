<section id="article" class="article pt-0">
	<div class="container">
		<div class="row gx-5">
			<!-- ===== Post Section ===== -->
			<article class="col-lg-8" data-aos="fade-right">
				<?= html_entity_decode($post['contentPost']) ?>
			</article>
			<!-- END Post Section -->

			<aside class="col-lg-4" data-aos="fade-left">
				<!-- ===== Meta Post Section ===== -->
				<img src="<?= $post['imagePost'] ?>" class="mt-sm-4 mt-lg-0 mb-4 img-fluid">
				<div class="article-info border-bottom">
					<ul>
						<li><strong>Publié par</strong> : <?= $post['pseudo'] ?></li>
						<?php if ($post['updateDatePost'] !== NULL): ?>
							<li><strong>Mis à jour le</strong>: <?= $this->dateToFrench($post['updateDatePost'],"d F Y") ?></li>
						<?php endif ?>
						<li><strong>Créer le</strong> : <?= $this->dateToFrench($post['createDatePost'],"d F Y") ?></li>
					</ul>
				</div>
				<!-- END Meta Post Section -->

				<!-- ===== Comment Section ===== -->
				<?php include 'view/template/_comment-section.php'; ?>
				<!-- END Comment Section -->
			</aside>
		</div>
	</div>
</section>
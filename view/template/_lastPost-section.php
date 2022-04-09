<section id="blog" class="blog">
	<div class="container">

		<div class="section-title" data-aos="fade-up">
			<h2>Blog</h2>
			<p>Voici un liste de mes derniers articles</p>
		</div>

		<div class="row blog-container" data-aos="fade-up" data-aos-delay="200">
			<?php while($post = $posts->fetch(PDO::FETCH_ASSOC)): ?>
				<div class="col-lg-4 col-md-6 blog-item">
					<div class="blog-wrap">
	          <img src="<?= $post['imagePost'] ?>" class="img-fluid">
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
					</div>
				</div>
			<?php endwhile ?>
		</div>

		<div class="d-flex justify-content-center">
			<a data-aos="fade-up" data-aos-delay="200" href="?action=blog" class="btn-get-started scrollto">En voir d'autre</a>
		</div>
	</div>
</section>
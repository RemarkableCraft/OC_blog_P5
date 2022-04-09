<section id="blog-post" class="blog">
	<div class="container">

		<div class="section-title" data-aos="fade-up">
			<h2>Blog</h2>
		</div>

		<div class="row blog-container" data-aos="fade-up" data-aos-delay="200">
			<?php while($post = $posts->fetch(PDO::FETCH_ASSOC)): ?>

				<div class="col-lg-4 col-md-6 blog-item">
					<div class="blog-wrap">
	          <img src="<?= $post['imagePost'] ?>" class="img-fluid">
	          <div class="blog-info">
	            <h4><?= $post['titlePost'] ?></h4>
	            <p><?= nl2br($post['chapoPost']) ?></p>
	            <div class="blog-links">
	              <a href="?action=post&id=<?= $post['idPost'] ?>" title="Lire la suite"><i class="bx bx-link"></i></a>
	            </div>
	          </div>
					</div>
				</div>

			<?php endwhile ?>
		</div>
	</div>
</section>
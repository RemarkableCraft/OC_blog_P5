<!-- ======= Create Post ======= -->
<section class="container" data-aos="fade-up">
	<div class="section-title">
		<h2>Créer un article</h2>
	</div>

	<div class="text-center">
		<a href="?action=createPost" class="btn-get-started">Formulaire de création</a>
	</div>
</section>
<!-- End Create Post -->

<!-- ======= Table Post ======= -->
<section class="section-bg" data-aos="fade-up">
	<div class="container">
		<div class="section-title">
			<h2>Mes articles</h2>
		</div>

		<table class="table table-striped table-hover bg-white">
		  <thead class="table-success">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Titre</th>
		      <th scope="col">Châpo</th>
		      <th scope="col">Créé</th>
		      <th scope="col">Mis à jour</th>
		      <th scope="col">Option</th>
		    </tr>
		  </thead>

		  <tbody>
		  	<?php while($post = $posts->fetch(PDO::FETCH_ASSOC)): ?>
			    <tr>
			      <th scope="row"><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= $post['idPost'] ?></a></th>
			      <td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= $post['titlePost'] ?></a></td>
			      <td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= nl2br($post['chapoPost']) ?></a></td>
			      <td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= $this->dateToFrench($post['createDatePost'],"d F Y H:h")?></a></td>
			      <?php if ($post['updateDatePost'] === NULL): ?>
			      	<td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset">null</a></td>
			      <?php else: ?>
			      	<td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= $this->dateToFrench($post['updateDatePost'],"d F Y H:h") ?></a></td>
			      <?php endif ?>
			      <td class="option-links">
			      	<div class="d-flex">
				      	<a href="?action=editPost"class="edit"><i class="bi bi-pen"></i></a>
				      	<a href="?action=deletePost"class="delete"><i class="bi bi-trash"></i></a>
			      	</div>
			      </td>
			    </tr>
			  <?php endwhile ?>
		  </tbody>
		</table>
	</div>
</section>
<!-- End Table Post -->

<!-- ======= Comment Post ======= -->
<section>
	<div class="container">
		<div class="section-title">
			<h2>Liste de commentaires</h2>
		</div>

			<table class="table table-striped table-hover bg-white">
			  <thead class="table-success">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Contenu</th>
			      <th scope="col">Sur l'article</th>
			      <th scope="col">Par</th>
			      <th scope="col">Le</th>
			    </tr>
			  </thead>

			  <tbody>
			  	<?php if (!$comment): ?>
				  	<tr><td colspan="5" class="text-center">Il n'y a pas de nouveau commentaire</td></tr>
			  	<?php else: ?>
				    <tr>
				      <th scope="row"><a href="?action=post&id=<?= $comment['postComment'] ?>" class="text-reset"><?= $comment['idComment'] ?></a></th>
				      <td><a href="?action=post&id=<?= $comment['postComment'] ?>" class="text-reset"><?= nl2br($comment['contentComment']) ?></a></td>
				      <td><a href="?action=post&id=<?= $comment['postComment'] ?>" class="text-reset"><?= $comment['titlePost'] ?></a></td>
				      <td><a href="?action=post&id=<?= $comment['postComment'] ?>" class="text-reset"><?= $comment['pseudo'] ?></a></td>
				      <td><a href="?action=post&id=<?= $comment['postComment'] ?>" class="text-reset"><?= $this->dateToFrench($comment['createDateComment'],"d F Y H:h") ?></a></td>
				    </tr>
			  	<?php endif ?>
			  </tbody>
			</table>
	</div>
</section>
<!-- End Comment Post -->
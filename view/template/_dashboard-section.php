<!-- ======= Table Post ======= -->
<section class="dashboard container" data-aos="fade-up">
	<div class="section-title">
		<h2>Mes articles</h2>
	</div>

	<table class="table table-striped table-hover">
	  <thead class="table-success">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Titre</th>
	      <th scope="col">Châpo</th>
	      <th scope="col">Création</th>
	      <th scope="col">Modification</th>
	      <th scope="col">Option</th>
	    </tr>
	  </thead>

	  <tbody>
	  	<?php while($post = $posts->fetch(PDO::FETCH_ASSOC)): ?>
		    <tr>
		      <th scope="row"><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= $post['idPost'] ?></a></th>
		      <td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= $post['titlePost'] ?></a></td>
		      <td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= $post['chapoPost'] ?></a></td>
		      <td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= $this->dateToFrench($post['createDatePost'],"d F Y H:h")?></a></td>
		      <?php if ($post['updateDatePost'] === NULL): ?>
		      	<td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset">null</a></td>
		      <?php else: ?>
		      	<td><a href="?action=post&id=<?= $post['idPost'] ?>" class="text-reset"><?= $this->dateToFrench($post['updateDatePost'],"d F Y H:h") ?></a></td>
		      <?php endif ?>
		      <td class="option-links">
		      	<div class="d-flex">
			      	<a href="#"class="edit"><i class="bi bi-pen"></i></a>
			      	<a href="#"class="delete"><i class="bi bi-trash"></i></a>
		      	</div>
		      </td>
		    </tr>
		  <?php endwhile ?>
	  </tbody>
	</table>
</section>
<!-- End Table Post -->
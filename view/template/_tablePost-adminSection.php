<section id="tablePost" class="section-bg" data-aos="fade-up">
	<div class="container">
		<!-- ===== Title Table Post Section -->
		<div class="section-title">
			<h2>Mes articles</h2>
		</div>
		<!-- END Title Table Post Section -->

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
						<th scope="row"><?= $post['idPost'] ?></th>

						<td><?= $post['titlePost'] ?></td>

						<td><?= nl2br($post['chapoPost']) ?></td>

						<td><?= $this->dateToFrench($post['createDatePost'],"d F Y H:h")?></td>

						<?php if ($post['updateDatePost'] === NULL): ?>
							<td>null</td>
						<?php else: ?>
							<td><?= $this->dateToFrench($post['updateDatePost'],"d F Y H:h") ?></td>
						<?php endif ?>

						<td class="option-links">
							<div class="d-flex">
								<a href="?action=editPost&id=<?= $post['idPost'] ?>"class="edit"><i class="bi bi-pen"></i></a>
								<a href="?action=deletePost&id=<?= $post['idPost'] ?>"class="delete"><i class="bi bi-trash"></i></a>
								<button class="edit" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $post['idPost'] ?>"><i class="bi bi-eye"></i></button>
							</div>
						</td>
					</tr>

					<!-- ===== Modal ===== -->
					<div class="modal fade" id="exampleModal<?= $post['idPost'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel"><?= $post['titlePost'] ?></h5>

									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>

								<div class="modal-body">
									<img src="<?= $post['imagePost'] ?>" class="img-thumbnail rounded mx-auto d-block">

									<?= nl2br($post['contentPost']) ?>
								</div>

								<div class="modal-footer option-links">
									<a href="?action=editPost&id=<?= $post['idPost'] ?>"class="edit"><i class="bi bi-pen"></i></a>

									<a href="?action=deletePost"class="delete"><i class="bi bi-trash"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- END Modal -->
				<?php endwhile ?>
			</tbody>
		</table>
	</div>
</section>
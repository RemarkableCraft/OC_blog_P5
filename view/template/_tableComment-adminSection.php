<section id="tableComment" data-aos="fade-up">
	<div class="container">
		<!-- ===== Title Table Comment Section ===== -->
		<div class="section-title">
			<h2>Liste de commentaires</h2>
		</div>
		<!-- END Table Comment Section -->

		<table class="table table-striped table-hover bg-white">
			<thead class="table-success">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Contenu</th>
					<th scope="col">Sur l'article</th>
					<th scope="col">Par</th>
					<th scope="col">Le</th>
					<th scope="col">Voir</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($comment = $comments->fetch(PDO::FETCH_ASSOC)): ?>
					<tr>
						<th scope="row"><?= $comment['idComment'] ?></th>

						<td><?= nl2br($comment['contentComment']) ?></td>

						<td><?= $comment['titlePost'] ?></td>

						<td><?= $comment['pseudo'] ?></td>

						<td><?= $this->dateToFrench($comment['createDateComment'],"d F Y H:h") ?></td>

						<td class="option-links">
							<a href="?action=post&id=<?= $comment['postComment'] ?>" class="edit" target="_blank"><i class="bi bi-eye"></i></a>
						</td>
					</tr>
				<?php endwhile ?>
			</tbody>
		</table>
	</div>
</section>
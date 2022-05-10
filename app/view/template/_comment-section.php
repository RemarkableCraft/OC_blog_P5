<div class="article-description mt-3">
	<h3>Commentaires</h3>

	<?php if (isset($session['user']) && !empty($session['user'])): ?>
		<!-- ===== Comment Form ===== -->
		<form action="?action=comment" method="POST" novalidate  class="needs-validation php-email-form" data-aos="fade-left">
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
		<!-- END Comment Form -->
	<?php else: ?>
		<div class="alert alert-success" role="alert">
			Connectez-vous pour laisser un commentaire
		</div>
	<?php endif ?>

	<?php if ($nbrComment === '0'): ?>
		<p>Il n'y a pas de commentaire</p>
	<?php elseif ($nbrComment === '1'): ?>
		<p>Il y a 1 commentaire</p>
	<?php else: ?>
		<p>Il y a <?= $nbrComment ?> commentaires</p>
	<?php endif ?>

	<!-- ===== List Comment Novalidate ===== -->
	<?php if (isset($session['user']) && !empty($session['user']) && $session['user']['role'] === 'admin'): ?>
		<?php while($commentNovalidate = $commentsNovalidate->fetch(PDO::FETCH_ASSOC)): ?>
			<div class="shadow-sm mt-3 pb-3 pt-1 bg-comment">
				<div class="row border-bottom border-success m-3">
					<strong class="col-8"><?= $commentNovalidate['pseudo'] ?></strong>
					<span class="col-4 text-end"><?= $this->dateToFrench($commentNovalidate['createDateComment'],"d F Y") ?></span>
				</div>
				<div class="mx-3"><?= nl2br($commentNovalidate['contentComment']) ?></div>
				<div class="text-center mt-3"><a href="?action=validComment&id=<?= $commentNovalidate['idComment'] ?>" class="btn-success py-1 px-3 rounded">Valider</a></div>
			</div>
		<?php endwhile ?>
	<?php endif ?>
	<!-- END List Comment Novalidate -->

	<!-- ===== List Comment ===== -->
	<?php while($commentValidate = $commentsValidate->fetch(PDO::FETCH_ASSOC)): ?>
		<div class="shadow-sm mt-3 pb-3 pt-1">
			<div class="row border-bottom m-3">
				<strong class="col-8"><?= $commentValidate['pseudo'] ?></strong>
				<span class="col-4 text-end"><?= $this->dateToFrench($commentValidate['createDateComment'],"d F Y") ?></span>
			</div>

			<div class="mx-3"><?= nl2br($commentValidate['contentComment']) ?></div>
		</div>
	<?php endwhile ?>
	<!-- END List Comment -->
</div>
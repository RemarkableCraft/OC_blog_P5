<section id="formPost" class="form">
	<div class="container">
		<div class="section-title">
			<?php if ($lien === 'action=createPost'): ?>
				<h2>Créer un nouvel article</h2>
			<?php else: ?>
				<h2>Modifier l'article</h2>
			<?php endif ?>
		</div>

		<form action="#" method="POST" novalidate class="needs-validation php-email-form shadow" data-aos="fade-left">
			<!-- ==== Message Error ==== -->
			<?php if (isset($errorPost) && !empty($errorPost)): ?>
				<div class="alert alert-danger" role="alert">
					<?= $errorPost ?>
				</div>
			<?php endif ?>

			<?php if (isset($successPost) && !empty($successPost)): ?>
				<div class="alert alert-success" role="alert">
					<?= $successPost ?>
				</div>
			<?php endif ?>
			<!-- END Message Error -->

			<!-- ==== Titre ==== -->
			<div class="form-group mt-3">
				<input type="text" name="titlePost" id="titlePost" class="form-control" placeholder="Titre de l'article" value="<?php if ($lien !== 'action=createPost'){ echo $post['titlePost']; } ?>" required>
				<div class="invalid-feedback">Tu as oublié le titre.</div><!-- message required -->
			</div>
			<!-- END Titre -->

			<!-- ==== Chapo ==== -->
			<div class="form-group mt-3">
				<textarea class="form-control" name="chapoPost" rows="5" placeholder="Résumé de l'article" maxlength="300" required><?php if ($lien !== 'action=createPost') { echo $post['chapoPost']; } ?></textarea>
				<div class="invalid-feedback">De quoi parle ton article, en quelque mot.</div><!-- message required -->
			</div>
			<!-- END Chapo -->

			<!-- ==== Contenu ==== -->
			<div class="form-group mt-3">
				<div id="editor"><?php if ($lien !== 'action=createPost'){ echo $post['contentPost']; } ?></div>
				<input type="hidden" name="contentPost" id="contentPost" required>
			</div>
				<div class="invalid-feedback" id="invalid-feedback">De quoi parle ton article, en quelque mot.</div><!-- message required -->
			<!-- END Contenu -->

			<div class="text-center">
				<button type="submit" class="btn-get-started" name="soumission" id="soumission">Créer l'article</button>
			</div>
		</form>
	</div>
</section>
<?php var_dump($POST); ?>
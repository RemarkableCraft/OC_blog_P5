<section id="formPost" class="form">
	<div class="container">
		<div class="section-title">
			<?php if ($lien === 'action=createPost'): ?>
				<h2>Créer un nouvel article</h2>
			<?php else: ?>
				<h2>Modifier l'article</h2>
			<?php endif ?>
		</div>

		<form action="
			<?php if ($lien === 'action=createPost'): ?>
				?action=addPost
			<?php else: ?>
				?action=updatePost&id=<?= $post['idPost'] ?>
			<?php endif ?>" method="POST" novalidate class="needs-validation php-email-form shadow" data-aos="fade-left">
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
				<input type="text" name="titlePost" id="titlePost" class="form-control" placeholder="Titre de l'article" value="<?php if ($lien !== 'action=createPost'){ echo $post['titlePost']; } elseif	(isset($POST) && !empty($POST)) { echo $POST['titlePost']; } ?>" required>
				<div class="invalid-feedback">Tu as oublié le titre.</div><!-- message required -->
			</div>
			<!-- END Titre -->

			<!-- ==== Chapo ==== -->
			<div class="form-group mt-3">
				<textarea class="form-control" name="chapoPost" rows="5" placeholder="Résumé de l'article" maxlength="300" required><?php if ($lien !== 'action=createPost') { echo $post['chapoPost']; } elseif	(isset($POST) && !empty($POST)) { echo $POST['chapoPost']; } ?></textarea>
				<div class="invalid-feedback">De quoi parle ton article, en quelque mot.</div><!-- message required -->
			</div>
			<!-- END Chapo -->

			<!-- ==== Contenu ==== -->
			<div class="form-group mt-3">
				<div id="editor"><?php if ($lien !== 'action=createPost'){ echo html_entity_decode($post['contentPost']); } elseif	(isset($POST) && !empty($POST)) { echo $POST['contentPost']; } ?></div>
				<input type="hidden" name="contentPost" id="contentPost" required>
			</div>
				<div class="invalid-feedback" id="invalid-feedback">Écrit au moins un petit truc, allez...</div><!-- message required -->
			<!-- END Contenu -->

			<!-- ==== Image ==== -->
			<p class="mt-3 mb-1">Choisir une image de présentation</p>
			<div class="d-flex justify-content-center flex-wrap">
				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image1" value="https://picsum.photos/id/0/1000/800" checked>
				  <label class="form-check-label" for="image1">
				    <img src="https://picsum.photos/id/0/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>

				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image2" value="https://picsum.photos/id/1/1000/800" <?php if ($lien !== 'action=createPost' && $post['imagePost'] === 'https://picsum.photos/id/1/1000/800'): ?> checked <?php elseif (isset($POST) && !empty($POST) && $POST['imagePost'] === 'https://picsum.photos/id/1/1000/800'):?> checked <?php endif ?>>
				  <label class="form-check-label" for="image2">
				    <img src="https://picsum.photos/id/1/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>
				
				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image3" value="https://picsum.photos/id/103/1000/800" <?php if ($lien !== 'action=createPost' && $post['imagePost'] === 'https://picsum.photos/id/103/1000/800'): ?> checked <?php elseif (isset($POST) && !empty($POST) && $POST['imagePost'] === 'https://picsum.photos/id/103/1000/800'):?> checked <?php endif ?>>
				  <label class="form-check-label" for="image3">
				    <img src="https://picsum.photos/id/103/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>
				
				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image4" value="https://picsum.photos/id/1031/1000/800" <?php if ($lien !== 'action=createPost' && $post['imagePost'] === 'https://picsum.photos/id/1031/1000/800'): ?> checked <?php elseif (isset($POST) && !empty($POST) && $POST['imagePost'] === 'https://picsum.photos/id/1031/1000/800'):?> checked <?php endif ?>>
				  <label class="form-check-label" for="image4">
				    <img src="https://picsum.photos/id/1031/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>
				
				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image5" value="https://picsum.photos/id/1033/1000/800" <?php if ($lien !== 'action=createPost' && $post['imagePost'] === 'https://picsum.photos/id/1033/1000/800'): ?> checked <?php elseif (isset($POST) && !empty($POST) && $POST['imagePost'] === 'https://picsum.photos/id/1033/1000/800'):?> checked <?php endif ?>>
				  <label class="form-check-label" for="image5">
				    <img src="https://picsum.photos/id/1033/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>
				
				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image6" value="https://picsum.photos/id/1060/1000/800" <?php if ($lien !== 'action=createPost' && $post['imagePost'] === 'https://picsum.photos/id/1060/1000/800'): ?> checked <?php elseif (isset($POST) && !empty($POST) && $POST['imagePost'] === 'https://picsum.photos/id/1060/1000/800'):?> checked <?php endif ?>>
				  <label class="form-check-label" for="image6">
				    <img src="https://picsum.photos/id/1060/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>
				
				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image7" value="https://picsum.photos/id/1067/1000/800" <?php if ($lien !== 'action=createPost' && $post['imagePost'] === 'https://picsum.photos/id/1067/1000/800'): ?> checked <?php elseif (isset($POST) && !empty($POST) && $POST['imagePost'] === 'https://picsum.photos/id/1067/1000/800'):?> checked <?php endif ?>>
				  <label class="form-check-label" for="image7">
				    <img src="https://picsum.photos/id/1067/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>
				
				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image8" value="https://picsum.photos/id/119/1000/800" <?php if ($lien !== 'action=createPost' && $post['imagePost'] === 'https://picsum.photos/id/119/1000/800'): ?> checked <?php elseif (isset($POST) && !empty($POST) && $POST['imagePost'] === 'https://picsum.photos/id/119/1000/800'):?> checked <?php endif ?>>
				  <label class="form-check-label" for="image8">
				    <img src="https://picsum.photos/id/119/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>
				
				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image9" value="https://picsum.photos/id/160/1000/800" <?php if ($lien !== 'action=createPost' && $post['imagePost'] === 'https://picsum.photos/id/160/1000/800'): ?> checked <?php elseif (isset($POST) && !empty($POST) && $POST['imagePost'] === 'https://picsum.photos/id/160/1000/800'):?> checked <?php endif ?>>
				  <label class="form-check-label" for="image9">
				    <img src="https://picsum.photos/id/160/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>
				
				<div class="form-check m-2 ps-0 w-25">
				  <input class="d-none" type="radio" name="imagePost" id="image10" value="https://picsum.photos/id/180/1000/800" <?php if ($lien !== 'action=createPost' && $post['imagePost'] === 'https://picsum.photos/id/180/1000/800'): ?> checked <?php elseif (isset($POST) && !empty($POST) && $POST['imagePost'] === 'https://picsum.photos/id/180/1000/800'):?> checked <?php endif ?>>
				  <label class="form-check-label" for="image10">
				    <img src="https://picsum.photos/id/180/1000/800" class="img-featured img-thumbnail">
				  </label>
				</div>
			</div>
			<!-- END Image -->

			<div class="text-center">
			<?php if ($lien === 'action=createPost'): ?>
				<button type="submit" class="btn-get-started" name="soumission" id="soumission">Créer l'article</button>
			<?php else: ?>
				<button type="submit" class="btn-get-started" name="soumission" id="soumission">Modifier l'article</button>
			<?php endif ?>
			</div>
		</form>
	</div>
</section>
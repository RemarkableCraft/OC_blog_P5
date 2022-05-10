<form action="?action=signUp" method="POST" role="form" class="needs-validation" data-aos="fade-right" novalidate>
	<div class="row text-center">
		<h3>Inscription</h3>
	</div>

	<div class="row mt-3">
		<div class="col-md-6 form-group">
			<input type="text" name="name" id="name" class="form-control" placeholder="Nom" required value="<?php if (isset($postUp) && !empty($postUp)) {echo $postUp['name'];} ?>">
			<div class="invalid-feedback">Comment il s'écrit déjà ton nom?</div><!-- message required -->
		</div><!-- nom -->

		<div class="col-md-6 form-group mt-3 mt-md-0">
			<input type="text" name="surname" id="surname" class="form-control" placeholder="Prénom" required value="<?php if (isset($postUp) && !empty($postUp)) {echo $postUp['surname'];} ?>">
			<div class="invalid-feedback">C'est quoi déjà ton prénom?</div><!-- message required -->
		</div><!-- prénom -->
	</div>

	<div class="row mt-3">
		<div class="col-md-6 form-group">
			<input type="text" name="pseudo1" id="pseudo1" class="form-control" placeholder="Pseudo" required value="<?php if (isset($postUp) && !empty($postUp)) {echo $postUp['pseudo1'];} ?>">
			<div class="invalid-feedback">Tu n'as pas un pseudonyme, ce sera plus simple?</div><!-- message required -->
		</div><!-- pseudo1 -->

		<div class="col-md-6 form-group mt-3 mt-md-0">
			<input type="email" name="email" id="email" class="form-control" placeholder="Mail" required value="<?php if (isset($postUp) && !empty($postUp)) {echo $postUp['email'];} ?>">
			<div class="invalid-feedback">Je vais en avoir besoin pour t'envoyer un mail de validation.</div><!-- message required -->
		</div><!-- mail -->
	</div>

	<div class="mt-3 form-group input-group">
		<input type="password" name="password1" id="password1" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Mot de passe" required value="<?php if (isset($postUp) && !empty($postUp)) {echo $postUp['password1'];} ?>">

		<div class="toggle-password1">
			<button type="button" class="btn btn-secondary eye rounded-0 rounded-end"><i class="bi bi-eye"></i></button>
			<button type="button" class="btn btn-secondary eye-slash rounded-0 rounded-end"><i class="bi bi-eye-slash"></i></button>
		</div>

		<div class="invalid-feedback">Tu veux quand même pas que tout le monde utilise ton compte.</div><!-- message required -->
	</div>

	<div id="passwordHelpBlock" class="form-text">
		<ul class="password-policies">
			<li class="policy-length">Le mot de passe doit comporter au moins 8 caractères.</li>
			<li class="policy-uppercase">Le mot de passe doit inclure au moins une lettre majuscule.</li>
			<li class="policy-number">Le mot de passe doit inclure au moins un numéro.</li>
			<li class="policy-special">Le mot de passe doit inclure au moins un caractère spécial.</li>
		</ul>
	</div><!-- password1 -->

	<div class="mt-3 form-group input-group">
		<input type="password" name="password2" id="password2" class="form-control" placeholder="Confirmation mot de passe" required>

		<div class="toggle-password2">
			<button class="btn btn-secondary eye rounded-0 rounded-end" type="button"><i class="bi bi-eye"></i></button>
			<button class="btn btn-secondary eye-slash rounded-0 rounded-end" type="button"><i class="bi bi-eye-slash"></i></button>
		</div>

		<div class="invalid-feedback">Je sais c'est long de recopier son code mais on n'a pas le choix.</div><!-- message required -->
	</div><!-- password2 -->

	<div class="mt-3 form-group">
		<div class="text-center">
			<button type="submit" name="soumission" value="signUp" class="btn-get-started">S'inscrire</button>
		</div>
	</div>
</form>
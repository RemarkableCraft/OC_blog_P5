<form action="?action=signIn" method="POST" role="form" class="needs-validation" data-aos="fade-left" novalidate>
	<div class="row text-center">
		<h3>Connexion</h3>
	</div>

	<div class="mt-3 form-group">
		<input type="hidden" name="lien" value="<?= $server['HTTP_REFERER'] ?>">

		<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudo" required value="<?php if (isset($postIn) && !empty($postIn)) {echo $postIn['pseudo'];} ?>">
		<div class="invalid-feedback">Ton pseudo c'est le néant?</div><!-- message required -->
	</div><!-- pseudo -->

	<div class="mt-3 form-group input-group">
		<input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>

		<div class="toggle-password">
			<button class="btn btn-secondary eye rounded-0 rounded-end" type="button"><i class="bi bi-eye"></i></button>
			<button class="btn btn-secondary eye-slash rounded-0 rounded-end" type="button"><i class="bi bi-eye-slash"></i></button>
		</div>

		<div class="invalid-feedback">Tu n'as pas oublié quelque chose.</div><!-- message required -->
	</div><!-- password -->

	<div class="mt-3 form-group">
		<div class="text-center">
			<button type="submit" name="soumission" value="signIn" class="btn-get-started">Se Connecter</button>
		</div>
	</div>
</form>
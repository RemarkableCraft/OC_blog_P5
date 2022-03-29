<section id="sign" class="sign section-bg">
	<div class="container">

		<div class="section-title">
			<h2>Connexion / Inscription</h2>
		</div>

		<div class="row">

			<div class="col-lg-6 border-end pe-lg-5">
				<!-- ======= Inscription Form ======= -->
				<form action="" method="POST" role="form" class="needs-validation" data-aos="fade-right" novalidate>
					<div class="row text-center">
						<h3>Inscription</h3>
					</div>

					<div class="row mt-3">
						<div class="col-md-6 form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="Nom" required>
							<div class="invalid-feedback">Comment il s'écrit déjà ton nom?</div><!-- message required -->
						</div><!-- nom -->

						<div class="col-md-6 form-group mt-3 mt-md-0">
							<input type="text" name="text" id="text" class="form-control" placeholder="Prénom" required>
							<div class="invalid-feedback">C'est quoi déjà ton prénom?</div><!-- message required -->
						</div><!-- prénom -->
					</div>

					<div class="row mt-3">
						<div class="col-md-6 form-group">
							<input type="text" name="pseudo1" id="pseudo1" class="form-control" placeholder="Pseudo" required>
							<div class="invalid-feedback">Tu n'as pas un pseudonyme, ce sera plus simple?</div><!-- message required -->
						</div><!-- pseudo1 -->

						<div class="col-md-6 form-group mt-3 mt-md-0">
							<input type="email" name="email" id="email" class="form-control" placeholder="Mail" required>
							<div class="invalid-feedback">Je vais en avoir besoin pour t'envoyer un mail de validation.</div><!-- message required -->
						</div><!-- mail -->
					</div>

					<div class="mt-3 form-group input-group">
						<input type="password" name="password1" id="password1" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Mot de passe" required>

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

						<div class="invalid-feedback">C'est presque pareil, mais tu t'es trompé quelque part.</div><!-- message required -->
					</div><!-- password2 -->

					<div class="mt-3 form-group">
						<div class="text-center">
							<button type="submit" name="soumission-inscription" class="btn-get-started">S'inscrire</button>
						</div>
					</div>
				</form>
				<!-- END Inscription Form -->
			</div>

			<div class="col-lg-6 mt-5 mt-lg-0 ps-lg-5">
				<!-- ======= Connexion Form ======= -->
				<form action="" method="POST" role="form" class="needs-validation" data-aos="fade-left" novalidate>
					<div class="row text-center">
						<h3>Connexion</h3>
					</div>

					<div class="mt-3 form-group">
						<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudo" required>
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
							<button type="submit" name="soumission-connexion" class="btn-get-started">Se Connecter</button>
						</div>
					</div>
				</form>
				<!-- END Connexion Form -->
			</div>
		</div>
	</div>
</section>
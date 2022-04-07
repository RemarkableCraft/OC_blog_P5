<header id="header" class="d-flex align-items-center">
	<div class="container d-flex align-items-center justify-content-between">

		<div class="logo">
			<a href="index.html"><img src="public/assets/img/logo.png" alt="" class="img-fluid"></a>
		</div>

		<nav id="navbar" class="navbar">
			<ul>
				<li><a class="nav-link" href="?action=home#hero">Home</a></li>
				<li><a class="nav-link" href="?action=home#about">À propos</a></li>
				<li><a class="nav-link" href="?action=home#blog">Blog</a></li>
				<li><a class="nav-link" href="?action=home#contact">Contact</a></li>
				<li><a class="nav-link" href="?action=home#cv">Curriculum vitae</a></li>
				<?php if (isset($_SESSION['user'])): ?>
					<li><a class="nav-link" href="?action=signOut">Se déconnecter</a></li>
				<?php else: ?>
					<li><a class="nav-link" href="?action=sign">Connexion/Inscription</a></li>
				<?php endif ?>
			</ul>
			<i class="bi bi-list mobile-nav-toggle"></i>
		</nav>

	</div>
</header>
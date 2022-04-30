<?php $titlePage = "Connexion/Inscription"; ?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
	<main id="main">
		<!-- ======= Sign In/Up Section ======= -->
		<?php include 'view/template/_sign-section.php'; ?>
		<!-- End Sign In/Up Section -->
	</main>
<?php $main = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>
<?php $titlePage = "Connexion/Inscription"; ?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
  <main id="main">
		<!-- ======= Sign In/Up Section ======= -->
		<?php include 'view/template/_signInUp-section.php'; ?>
		<!-- End Sign In/Up Section -->
  </main>
<?php $main = ob_get_clean(); ?>

<?php
	unset($_SESSION['msgErrorSignUp']);
	unset($_SESSION['msgSuccessSignUp']);
	unset($_SESSION['msgErrorSignIn']);
	unset($_SESSION['msgSuccessSignIn']);
?>

<?php require 'view/template.php'; ?>
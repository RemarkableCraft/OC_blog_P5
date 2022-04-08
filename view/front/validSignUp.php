<?php $titlePage = "Validation de compte"; ?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
  <main id="main">
		<!-- ======= Sign In/Up Section ======= -->
		<?php include 'view/template/_valid-section.php'; ?>
		<!-- End Sign In/Up Section -->
  </main>
<?php $main = ob_get_clean(); ?>

<?php
	unset($_SESSION['msgErrorValid']);
	unset($_SESSION['msgSuccessValid']);
?>

<?php require 'view/template.php'; ?>
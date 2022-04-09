<?php $titlePage = "Mon blog"; ?>

<?php $hero = "true"; ?>

<?php ob_start(); ?>
	<main id="main">
		<?php if (isset($successSignIn) && !empty($successSignIn)): ?>
			<div class="toast fixed-top m-5 bg-success text-white bg-opacity-50" role="alert" aria-live="assertive" aria-atomic="true">
			  <div class="toast-body fs-5">
			    <?= $successSignIn ?>
			  </div>
			</div>
		<?php endif ?>

		<!-- ======= About Us Section ======= -->
		<?php include 'view/template/_aboutUs-section.php'; ?>
		<!-- End About Us Section -->

		<!-- ======= Blog Section ======= -->
		<?php include 'view/template/_lastPost-section.php'; ?>
		<!-- End Blog Section -->

		<!-- ======= Contact Section ======= -->
		<?php include 'view/template/_contact-section.php'; ?>
		<!-- End Contact Section -->

		<!-- ======= Cv Section ======= -->
		<?php include 'view/template/_cv-section.php'; ?>
		<!-- End Cv Section -->
	</main>
<?php $main = ob_get_clean(); ?>

<?php
	unset($_SESSION['msgErrorContact']);
	unset($_SESSION['msgSuccessContact']);
	unset($_SESSION['msgSuccessSignIn']);
?>

<?php require 'view/template.php'; ?>
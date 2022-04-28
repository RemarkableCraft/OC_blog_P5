<?php $titlePage = "Mon blog"; ?>

<?php $hero = "true"; ?>

<?php ob_start(); ?>
	<main id="main">

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
	$this->unset_SESSION(['msgErrorContact','msgSuccessContact']);
?>

<?php require 'view/template.php'; ?>
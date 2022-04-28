<?php $titlePage = "Dashboard"; ?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
	<main id="main">
		<!-- ======= Dashboard Section ======= -->
		<?php include 'view/template/_dashboard-section.php'; ?>
		<!-- End Dashboard Section -->
	</main>
<?php $main = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>
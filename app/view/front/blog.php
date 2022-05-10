<?php $titlePage = "Mon blog"; ?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
	<main id="main">
		<!-- ======= Blog Section ======= -->
		<?php include 'view/template/_blog-section.php'; ?>
		<!-- End Blog Section -->
	</main>
<?php $main = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>
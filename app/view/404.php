<?php $titlePage = "Erreur 404"; ?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
	<main id="main">
		<!-- ======= Sign In/Up Section ======= -->
		<?php include 'view/template/_404-section.php'; ?>
		<!-- End Sign In/Up Section -->
	</main>
<?php $main = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>
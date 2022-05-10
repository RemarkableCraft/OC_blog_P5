<?php $titlePage = "Dashboard"; ?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
	<main id="main">
		<!-- ===== Create Post Section ===== -->
		<?php include 'view/template/_createPost-adminSection.php'; ?>
		<!-- End Create Post Section -->

		<!-- ===== Table Post Section ===== -->
		<?php include 'view/template/_tablePost-adminSection.php'; ?>
		<!-- End Table Post Section -->

		<!-- ===== Table Comment Section ===== -->
		<?php include 'view/template/_tableComment-adminSection.php'; ?>
		<!-- End Table Comment Section -->
	</main>
<?php $main = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>
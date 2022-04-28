<?php $titlePage = $post['titlePost']; ?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <?php include 'view/template/_breadcrumbs.php'; ?>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <?php include 'view/template/_post-section.php'; ?>
    <!-- End Portfolio Details Section -->
  </main>
<?php $main = ob_get_clean(); ?>

<?php
	$this->unset_SESSION(['msgErrorComment','msgSuccessComment']);
?>

<?php require 'view/template.php'; ?>
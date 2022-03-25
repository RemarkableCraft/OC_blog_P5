<?php $titlePage = "Titre article"; ?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
  <main id="main" data-aos="fade-up">
    <!-- ======= Breadcrumbs ======= -->
    <?php include 'view/template/_breadcrumbs.php'; ?>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <?php include 'view/template/_post-section.php'; ?>
    <!-- End Portfolio Details Section -->
  </main>
<?php $main = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>
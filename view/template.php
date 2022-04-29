<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?= $titlePage ?></title>

	<!-- Favicons -->
	<link href="public/assets/img/favicon.png" rel="icon">
	<link href="public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="public/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Knight CSS File -->
	<link href="public/assets/css/knight.css" rel="stylesheet">

	<!-- =======================================================
	* Template Name: Knight - v4.7.0
	* Template URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->

	<!-- Template Main CSS File -->
	<link href="public/assets/css/styles.css" rel="stylesheet">

	<!-- Include stylesheet for Quill -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<body>
	<!-- ===== Message Popup ===== -->
	<?php include 'template/_message-popup.php'; ?>
	<!-- END Message Popup -->

	<!-- ===== Hero ===== -->
	<?php if (isset($hero) && $hero === "true") {
		include 'template/_hero-section.php';
	}?>
	<!-- END Hero -->

	<!-- ===== Header ===== -->
	<?php include 'template/_header.php'; ?>
	<!-- END Header -->

	<!-- ===== Main ===== -->
	<?= $main ?>
	<!-- END Main -->

	<!-- ===== Footer ===== -->
	<?php include 'template/_footer.php'; ?>
	<!-- END Footer -->

	<!-- ===== Button Back to top ===== -->
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	<!-- END Button Back to top -->

	<!-- Vendor JS Files -->
	<script src="public/assets/vendor/aos/aos.js"></script>
	<script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="public/assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="public/assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="public/assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="public/assets/js/knight.js"></script>

	<!-- Show 'required' messages -->
	<script src="public/assets/js/validationForm.js"></script>

	<!-- Password option -->
	<script src="public/assets/js/validationPassword.js"></script>

	<!-- Show popup -->
	<script src="public/assets/js/showPopup.js"></script>

	<!-- Include the Quill library -->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

	<!-- Initialize Quill editor for formPost -->
	<script src="public/assets/js/initializeQuill.js"></script>
</body>
</html>

<?php
	$this->unset_SESSION(['msgSuccess','msgError']);
?>
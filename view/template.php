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

	<!-- Template Main CSS File -->
	<link href="public/assets/css/styles.css" rel="stylesheet">

	<!-- Include stylesheet -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

	<!-- =======================================================
	* Template Name: Knight - v4.7.0
	* Template URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
</head>

<body>
	<!-- ======= Message Popup ======= -->
	<?php if (isset($success) && !empty($success)): ?>
		<div class="toast fixed-top m-5 bg-success text-white bg-opacity-50" role="alert" aria-live="assertive" aria-atomic="true">
		  <div class="toast-body fs-5">
		    <?= $success ?>
		  </div>
		</div>
	<?php endif ?>

	<?php if (isset($error) && !empty($error)): ?>
		<div class="toast fixed-top m-5 bg-danger text-white bg-opacity-50" role="alert" aria-live="assertive" aria-atomic="true">
		  <div class="toast-body fs-5">
		    <?= $error ?>
		  </div>
		</div>
	<?php endif ?>
	<!-- End Message Popup -->

	<!-- ======= Hero Section ======= -->
	<?php if (isset($hero) && $hero === "true") {
		include 'template/_hero-section.php';
	}?>
	<!-- End Hero -->

	<!-- ======= Header ======= -->
	<?php include 'template/_header.php'; ?>
	<!-- End Header -->

	<!-- ======= Main ======= -->
	<?= $main ?>
	<!-- End Main -->

	<!-- ======= Footer ======= -->
	<?php include 'template/_footer.php'; ?>
	<!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="public/assets/vendor/aos/aos.js"></script>
	<script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="public/assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="public/assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="public/assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="public/assets/js/knight.js"></script>

	<!-- Afficher les messages 'required' -->
	<script src="public/assets/js/validationForm.js"></script>

	<!-- Vérifier en temps réel la bonne syntax du mot de passe
	---- & l'option mot de passe visible ou caché -->
	<script src="public/assets/js/validationPassword.js"></script>

	<!-- Afficher le toast -->
	<script>
		window.onload = (event) => {
			let myAlert = document.querySelector('.toast');
			let bsAlert = new bootstrap.Toast(myAlert);
			bsAlert.show();
		}
	</script>

	<!-- Include the Quill library -->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

	<!-- Initialize Quill editor for formPost -->
	<script>
	  var quill = new Quill('#editor', {
	  	placeholder: 'Écrivez votre article.',
	    theme: 'snow'
	  });

	  let editor = document.getElementById('editor');

	  let button = document.getElementById('soumission');
	  let text = document.getElementById('contentPost');

	  button.addEventListener('click',function() {
	  	if (editor.children[0].innerHTML.replace(/(<([^>]+)>)/ig, "").length == 0) {
	  		document.getElementById('invalid-feedback').style.display = 'block';
	  		editor.style.border = '1px solid red';
	  		editor.style.borderRadius = '0';
	  		editor.classList.add('form-control');
	  		editor.classList.add('is-invalid');
	  	} else {
	  		text.value = editor.children[0].innerHTML;
	  	}
	  });
	</script>

</body>
</html>

<?php
	$this->unset_SESSION(['msgSuccess','msgError']);
?>
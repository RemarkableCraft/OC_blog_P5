<?php
	$lien = $this->get_SERVER('QUERY_STRING');

	if ($lien === 'action=createPost') {
		$titlePage = "Création d'article";
	} else {
		$titlePage = "Modification d'article";
	}
?>

<?php $hero = "false"; ?>

<?php ob_start(); ?>
	<main id="main">
		<!-- ===== Form Edit/Create Post ===== -->
		<?php include 'view/template/_formPost.php'; ?>
		<!-- END Form Edit/Create Post -->
	</main>
<?php $main = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>
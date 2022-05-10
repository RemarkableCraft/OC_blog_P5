<!-- ===== Message Success ===== -->
<?php if (isset($success) && !empty($success)): ?>
	<div class="toast fixed-top m-5 bg-success text-white bg-opacity-50" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-body fs-5">
			<?= $success ?>
		</div>
	</div>
<?php endif ?>
<!-- END Message Success -->

<!-- ===== Message Error -->
<?php if (isset($error) && !empty($error)): ?>
	<div class="toast fixed-top m-5 bg-danger text-white bg-opacity-50" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-body fs-5">
			<?= $error ?>
		</div>
	</div>
<?php endif ?>
<!-- END Message Error -->
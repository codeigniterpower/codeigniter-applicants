<!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('partials/metadata'); ?>

	<?php foreach ($css as $file):?>
		<link rel="stylesheet" type="text/css" href="<?php echo $file;?>">
	<?php endforeach;?>
</head>
<body>
	<div id="app">
		<?php $this->load->view('partials/header'); ?>

		<main>
			<section class="section is-main-section">
				<?php $this->load->view($content); ?>
			</section>
		</main>

		<?php $this->load->view('partials/footer'); ?>
	</div>

	<?php foreach ($js as $file):?>
		<script type="text/javascript" src="<?php echo $file;?>"></script>
	<?php endforeach;?>
</body>
</html>

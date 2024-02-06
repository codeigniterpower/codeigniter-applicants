<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->helper('html');

		$metaline1 = array('name' => 'description', 'content' => 'codeigniter-applicants - Recruitment system to manage job vacancies and job applicants - future employees - futuros empleados y organizacion de prospectos');
		$metaline2 = array('name' => 'keywords', 'content' => 'system, admin, catalogo, sistemas, recruitment, reclutamiento, sistema, rrhh, vacancy, employees, postulants, applicants');
		$metaline3 = array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1');
		$metaline4 = array('name' => 'copyright', 'content' => '(c) 2024 Diaz Victor / mckaygerhard ');
		$metaline5 = array('name' => 'dcterms.rightsHolder', 'content' => 'Diaz Victor / mckaygerhard ');
		$metaline6 = array('name' => 'dcterms.dateCopyrighted', 'content' => '2024');
		$metaline7 = array('charset' => config_item('charset'));
		$meta = array( $metaline1, $metaline2, $metaline3, $metaline4, $metaline5, $metaline6, $metaline7 );

		if( !isset($page_css) ) $page_css=array('app.css','bulma.min.css','fontawesome.min.css');
		if( !isset($page_title) ) $page_title="applicants";

		echo '';
	?>


<?=doctype('html5'), PHP_EOL?>
<html>
<head>
<title><?=$page_title?></title>
<?php echo meta($meta) ?>
<?php foreach($page_css as $css) echo '<link rel="stylesheet" type="text/css" href="'.base_url(). '/assets/css/'.$css.'">'.PHP_EOL;?>
<link rel="shortcut icon" href="<?=base_url()?>/assets/images/tijerazo.jpg" type="image/x-icon">
</head>
	<body onload = 'checkAvailable()' > <!-- check browsers and denied the non-standard -->

	<nav class="navbar is-fixed-top">
	    <div class="navbar-brand is-justify-content-space-between">
		<a class="navbar-item">
		    <figure class="image">
			<img class="is-rounded" src="<?=base_url()?>/assets/images/logo.jpg" alt="Tijerazo">
		    </figure>
		</a>

		<div class="is-flex">
			<!-- init info id only for mobile and minor view media less than 900px -->
		    <div class="navbar-item is-hidden-desktop">
			<span class="mr-3">ID: 23127872</span>
			<span class="icon">
			    <i class="fas fa-user"></i>
			</span>
		    </div>

		    <a class="navbar-item is-hidden-desktop" id="navbar-bars">
			<span class="icon">
			    <i></i>
			</span>
		    </a>
			<!-- end info id only for mobile and minor view media less than 900px -->
		</div>
	    </div>

	    <div class="navbar-menu" id="navbar-menu">
		<div class="navbar-end">
			<!-- init info id only for desktop view media mayor of 1024px -->
		    <div class="navbar-item is-hidden-touch">
			<span class="mr-3">ID: 23127872</span>
			<span class="icon">
			    <i class="fas fa-user"></i>
			</span>
		    </div>
			<!-- end info id only for desktop view media mayor of 1024px -->
		    
		    <div class="navbar-item">
			<div class="field is-grouped">
			    <div class="control">
				<a href="javascript:void(0);" class="button">
				    <span>Iniciar sesión</span>
				</a>
			    </div>

			    <div class="control">
				<a href="javascript:void(0);" class="button is-success">
				    <span>Registrarme</span>
				</a>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	</nav>

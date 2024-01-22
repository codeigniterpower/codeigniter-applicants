	<h1>Welcome/Bienvenido a VNX Codeigniter</h1>
	<p >This is:</p>
	<?php
	$userdata = $this->session->userdata('userdata');

		echo br().PHP_EOL;  // genera neuva linea en codigo html al navegador
		echo form_fieldset('This is the view '.$viewtitle,array('class'=>'containerin ') );

		echo '<div class="row"><div class="col-sm-4 col-sm-offset-4">';
		foreach ($userdata as $ukey => $value)
		{
			echo '<spawn class="btn btn-danger">'.$ukey.'</spawn>:'.$value;
		}
		echo '</div></div>';
		echo form_fieldset_close() . PHP_EOL;

		echo 'Click here to test checksession on Home module/controller: '.anchor('Indexhome','<spawn class="btn btn-danger">Go to Indexhome</spawn>');
		echo br();
		echo 'Click here to test checksession on same controller but textfunct method: '.anchor('Indexother/testfunct','<spawn class="btn btn-danger">indexother/testfunc</spawn>');
		echo br();
		echo anchor('Indexauth/auth/logout','<spawn class="btn btn-danger">Logout</spawn>');

	?>

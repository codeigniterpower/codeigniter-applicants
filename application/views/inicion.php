	<h1>Welcome/Bienvenido a VNX Codeigniter</h1>
	<p >Ejemplo de login con imap</p>
	<?php
	$errormesag = 'Sin novedades';
	if($this->session->flashdata("error")){
		$errormesag = $this->session->flashdata("error");
	}
	$formopen = form_open("Indexauth/auth/login", array('method'=> 'post', 'class' => 'needs-validation w-75 mx-auto my-auto'));
		echo br().PHP_EOL;  // genera neuva linea en codigo html al navegador
		echo form_fieldset('titulo marco',array('class'=>'containerin ') );
		echo '<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="login-panel panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login
						</h3>
					</div>
					<div class="panel-body">
						'.$formopen.'
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Email" type="input" name="username" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" type="password" name="userclave" required>
								</div>
								<button type="submit" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
							</fieldset>
						</form>
					</div>
				</div>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
						'.$errormesag.'
					</div>
			</div>
		</div>
		';
		echo form_fieldset_close() . PHP_EOL;
	?>

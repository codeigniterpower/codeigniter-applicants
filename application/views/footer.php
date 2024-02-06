	<footer class="footer">
	    <p>&copy; 2023 <a href="https://codeberg.org/codeigniter/codeigniter-applicants" target="_blank">applicants system!</a></p>
	    <div class="social is-flex">
		<a href="javascript:void(0);">
		    <span class="icon">
			<i class="fab fa-twitter fa-lg"></i>
		    </span>
		</a>
		<a href="javascript:void(0);">
		    <span class="icon">
			<i class="fab fa-facebook-f fa-lg"></i>
		    </span>
		</a>
		<a href="javascript:void(0);">
		    <span class="icon">
			<i class="fab fa-instagram fa-lg"></i>
		    </span>
		</a>
		<a href="javascript:void(0);">
		    <span class="icon">
			<i class="fab fa-pinterest fa-lg"></i>
		    </span>
		</a>
	    </div>
	</footer>

<!-- @nombre: footer.php archivo de cierre comun de clases de estilo en todas las vistas y cargas -->
<!-- @author Díaz Urbaneja Víctor Eduardo Diex <diazvictor@tutamail.com> -->
<?php

	if( !isset($page_css) ) $page_css=array('app.js','polyfill.js');

	foreach($page_css as $css) echo '<script type="text/javascript" src="'.base_url(). '/assets/js/'.$css.'"></script>'.PHP_EOL;

	if(ENVIRONMENT !== 'production')
	{
		echo '<p class="footer">FOOTER IN DEVELOPER MODE! (disabled only in production mode),
		page rendered in <strong>{elapsed_time}</strong> seconds.
		'.anchor('http://venenux.blogspot.net','Sistema Codeigniter VNX').'
		es copyright &copy; 2012 PICCORO Lenz McKAY
		</p>'. PHP_EOL;
	}
?>
</body>
</html>

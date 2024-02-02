<?php

class Home_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title'] = 'Applicants | Home';

		$data['css'] = [
			'/assets/css/bulma.min.css',
			'/assets/css/fontawesome.min.css',
			'/assets/css/app.css'
		];

		$data['js'] = [
			'/assets/js/app.js'
		];

		$data['content'] = 'home/main';

		$this->load->view('page', $data);
	}

}

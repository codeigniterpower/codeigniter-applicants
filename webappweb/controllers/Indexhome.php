<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexhome extends CP_Controller {

	function __construct()
	{
		parent::__construct();
		$this->checksession();
	}

	/**	http://127.0.0.1/codeigniterpower/index.php/indexcontroler/index */
	public function index()
	{
		$data = array();
		$data['viewtitle'] = 'index at Indexhome index function';
		$this->load->view('header.php',$data);
		$this->load->view('homesview.php',$data);
		$this->load->view('footer.php',$data);
	}

	public function testfunct()
	{
		$data = array();
		$data['viewtitle'] = 'testfunc at Indexhome testfunct function';
		$this->load->view('header.php',$data);
		$this->load->view('homesview.php',$data);
		$this->load->view('footer.php',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexauth extends CP_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index($data = NULL)
	{
		$this->load->view('header.php',$data);
		$this->load->view('inicion.php',$data);
		$this->load->view('footer.php',$data);
	}

	public function auth($action = 'logout', $username = NULL, $userclave = NULL)
	{
		if($username == NULL)
			$username = $this->input->post('username');
		if($userclave == NULL)
			$userclave = $this->input->post('userclave');

		if ( $action == 'login' )
		{
			$this->load->model('usersmodel');
			
			$im_access = TRUE;//$this->usersmodel->loginimap($username, $userclave);
			
			$rs_access = $this->usersmodel->logindb($username, $userclave);
		}

		$data = array();
		if($rs_access AND $im_access)
		{
			$this->session->set_userdata('userdata', $rs_access);
			redirect('Indexhome');
		}
		else
		{
			$this->session->sess_destroy();
			header('location:'.site_url('/Indexauth'));
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

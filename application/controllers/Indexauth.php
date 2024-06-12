<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexauth extends CP_Controller {

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * default index
	 * @name: index
	 * @param $data (MIXED)
	 * @return void
	 */
	public function index($data = NULL)
	{
		$this->load->view('header.php',$data);
		$this->load->view('inicion.php',$data);
		$this->load->view('footer.php',$data);
	}

	/**
	 * check authentication, redirects to valid view if success
	 * @name: auth
	 * @param $action (STRING), $username (STRING), $userclave (STRING)
	 * @return void
	 */
	public function auth($action = 'logout', $username = NULL, $userclave = NULL)
	{
		if($username == NULL)
			$username = $this->input->post('username');
		if($userclave == NULL)
			$userclave = $this->input->post('userclave');

		if ( $action == 'login' )
		{
			$this->config->load('auth');
			
			$this->load->model('usersmodel');
			
			$ap_access = $this->usersmodel->loginapi($username, $userclave);
			
			$rs_access = $this->usersmodel->logindb($username, $userclave);
			
			$authmode = config_item('auth_type');
			
			$authmode = FALSE;
			if ($rs_access AND $ap_access)
				$authmode = TRUE;

			if($authmode == 'dummy' AND (ENVIRONMENT !== 'production'))
				$authmode = TRUE;
		}

		$data = array();
		if($authmode)
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

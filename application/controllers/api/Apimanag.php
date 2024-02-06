<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** an api index that manage the insertion of information into the database */
class Apimanag extends CP_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->checksession();
		$this->load->library('form_validation');
		$this->load->helper('backguardphp');
	}

	/**	http://127.0.0.1/~/general/codeigniter-applicants/index.php/api/Apimanag/index */
	public function index()
	{
		$data['status'] = 405;
		$data['response'] = "no valid auth token, and no api call valid";
		$this->outputresults($data);
	}

	/**
	 * entry point for insertion request to the database, check documentation:
	 *   * usernew(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *      added the new user to the internal DB as regular user, not as guest viewer
	 *   * userprofile(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *      added or modify information over the user already registered
	 *   * inapplyjob(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *      apply itselft to the job pointed in cod_vacancies
	 *   * deapplyjob(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *      remove itselft from the job where is involved as applicant
	 *   * deljob(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *      remove an unpublised job
	 *   * addjob(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *      added a new vacancy job but still not published
	 *   * setjob(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *      make public and valid the new job fresh made not publised yet
	 *   * modjob(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *      alter or modify the already created job
	 * @name: infocalls
	 * @return void
	 */
	public function managcalls()
	{
		$parameters = NULL;
		$apimethod = $this->input->get_post('method');
		$apiuserkey = $this->input->post('api_token');
		$apistatus = 405;
		$apimessage = "no method received";
		$apidata = "";

		if ( $apimethod == 'usernew' )
		{
			$cod_user = $this->input->post('cod_user');
			$this->load->model('usersmodel');
			$apistatus = 200;
			$apimessage = $this->usersmodel->usernew($cod_user, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'userprofile' )
		{
			$cod_user = $this->input->post('cod_user');
			$this->load->model('usersmodel');
			$apistatus = 200;
			$apimessage = $this->usersmodel->userprofile($cod_user, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'inapplyjob' )
		{
			$cod_user = $this->input->post('cod_user');
			$cod_vacancies = $this->input->post('cod_vacancies');
			$this->load->model('jobmodel');
			$apistatus = 200;
			$apimessage = $this->jobmodel->vacancies_inapply($cod_vacancies, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'deapplyjob' )
		{
			$cod_user = $this->input->post('cod_user');
			$cod_vacancies = $this->input->post('cod_vacancies');
			$this->load->model('jobmodel');
			$apistatus = 200;
			$apimessage = $this->jobmodel->vacancies_deapply($cod_vacancies, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'deljob' )
		{
			$cod_user = $this->input->post('cod_user');
			$cod_vacancies = $this->input->post('cod_vacancies');
			$this->load->model('vacancymodel');
			$apistatus = 200;
			$apimessage = $this->vacancymodel->vacancies_del($cod_vacancies, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'addjob' )
		{
			$cod_user = $this->input->post('cod_user');
			$cod_vacancies = $this->input->post('cod_vacancies');
			$this->load->model('vacancymodel');
			$apistatus = 200;
			$apimessage = $this->vacancymodel->vacancies_new($cod_vacancies, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'setjob' )
		{
			$cod_user = $this->input->post('cod_user');
			$cod_vacancies = $this->input->post('cod_vacancies');
			$this->load->model('vacancymodel');
			$apistatus = 200;
			$apimessage = $this->vacancymodel->vacancies_set($cod_vacancies, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'modjob' )
		{
			$cod_user = $this->input->post('cod_user');
			$cod_vacancies = $this->input->post('cod_vacancies');
			$this->load->model('vacancymodel');
			$apistatus = 200;
			$apimessage = $this->vacancymodel->vacancies_mod($cod_user, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		else
		{
			$apimessage = "method requested is not valid";
		}
		$data['status'] = $apistatus;
		$data['response'] = "app";
		$data['message'] = $apimessage;
		$data['api_token'] = $apiuserkey;
		$this->outputresults($data);
		return;
	}


	protected function outputresults($data)
	{
		$this->output->enable_profiler(FALSE);
		$this->output->parse_exec_vars = FALSE;
		$this->output->set_status_header($data['status']);
		$this->output->set_content_type('application/json', 'utf-8');
		echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

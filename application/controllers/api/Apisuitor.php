<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** an api index who can't make up it which of many suitors that apply for vacancies */
class Apisuitor extends CP_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->checksession();
		$this->load->library('form_validation');
		$this->load->library('form_validation');
		$this->load->helper('backguardphp');
	}

	/**	http://127.0.0.1/~/general/codeigniter-applicants/index.php/api/Apisuitor/index */
	public function index()
	{
		$data['status'] = 405;
		$data['response'] = "no valid auth token";
		$this->outputresults($data);
	}

	/**
	 * entry point for information request from the database, check documentation:
	 *   * profileuser(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *   * vacancies_jobs(POST(cod_vacancies),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *   * vacancies_applicants(POST(cod_vacancies),POST(method),POST(api_token),POST(parameters(json/optional)))
	 *   * applicants_vacancies(POST(cod_user),POST(method),POST(api_token),POST(parameters(json/optional)))
	 * @name: infocalls
	 * @return void
	 */
	public function infocalls()
	{
		$parameters = NULL;
		$apimethod = $this->input->get_post('method');
		$apiuserkey = $this->input->post('api_token');
		$apistatus = 405;
		$apimessage = "no method received";
		$apidata = "";

		if ( $apimethod == 'profileuser' )
		{
			$cod_user = $this->input->post('cod_user');
			$this->load->model('usersmodel');
			$apistatus = 200;
			$apimessage = $this->usersmodel->profileuser($cod_user, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'vacancies_jobs' )
		{
			$cod_vacancies = $this->input->post('cod_vacancies');
			$this->load->model('vacancymodel');
			$apistatus = 200;
			$apimessage = $this->vacancymodel->vacancies_jobs($cod_vacancies, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'vacancies_applicants' )
		{
			$cod_vacancies = $this->input->post('cod_vacancies');
			$this->load->model('vacancymodel');
			$apistatus = 200;
			$apimessage = $this->vacancymodel->vacancies_applicants($cod_vacancies, $parameters);
			if($apimessage == FALSE)
			{
				$apistatus = 506;
				$apimessage = "no data possible to retrieve, parameters may have and error";
			}
		}
		if ( $apimethod == 'applicants_vacancies' )
		{
			$cod_user = $this->input->post('cod_user');
			$this->load->model('vacancymodel');
			$apistatus = 200;
			$apimessage = $this->vacancymodel->applicants_vacancies($cod_user, $parameters);
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

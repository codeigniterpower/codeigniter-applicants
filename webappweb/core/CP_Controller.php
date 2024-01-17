<?php

/**
 * webappweb Application Controller Class
 *
 * @author    PICCORO lenz McKAY <mckaygerhard>
 * @copyright Copyright (c) 2016, 2019
 * @version ac - 1.1
 */
class CP_Controller extends CI_Controller
{

	private $sessobj;

	public function __construct()
	{
		parent::__construct();

		if(ENVIRONMENT !== 'production')
			$this->output->enable_profiler(TRUE);

		$this->load->helper(array('form', 'url','html'));
		$this->load->library('table');
		$this->load->library('session');

	}

    /** revision de session, si invalidad redirige a login */
    public function checksession()
    {
		$this->sessobj = $this->session->userdata('userdata');

		if($this->sessobj == NULL)
		{
			redirect('Indexauth');
			return;
		}
    }

}


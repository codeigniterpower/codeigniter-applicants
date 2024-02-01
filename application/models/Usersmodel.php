<?php
/*
 * Usersmodel.php
 * 
 * Copyright 2024 MCKAYGERHARD
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */
 
 
/**
 * Usersmodel class auth model
 */
class Usersmodel extends CI_Model 
{
	/** last amount from last query, event fails or success, if fails will be 0*/
	public $last_count = 0;

	/**
	 * default constructor
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('backguardphp');
	}

	/**
	 * try to check authentication agains external api
	 * @name: loginapi
	 * @param $username (STRING), $password (STRING)
	 * @return BOOL true if success
	 */
	public function loginapi($username, $password)
	{
		log_message('info', __METHOD__ .' begin ');

		$validu = $this->form_validation->required($username);
		$validu = $this->form_validation->alpha_dash($username);
		$validu = $this->form_validation->max_length($username,40);
		$valids = $this->form_validation->required($password);
		$valids = $this->form_validation->alpha($password);

		if($validu == FALSE AND $valids == FALSE) return FALSE;

		$config = array('plain'=> TRUE, 'username' => $username, 'userpass' => $password);
		//$this->load->library('Imap', $config);
		if(is_countable($config))
			$this->last_count = count($config);
		$valid  = TRUE; // still not ready.. we are working on that

		log_message('info', __METHOD__ .' ended with '.print_r($valid,TRUE));
		return $valid;
	}

	/**
	 * no again check authentication agains internal db, but only for check api key and pass
	 * @name: logindb
	 * @param $username (STRING), $password (STRING)
	 * @return BOOL true if success
	 */
	public function logindb($username, $password)
	{
		log_message('info', __METHOD__ .' begin ');

		$validu = $this->form_validation->required($username);
		$validu = $this->form_validation->alpha_dash($username);
		$validu = $this->form_validation->max_length($username,40);
		$valids = $this->form_validation->required($password);
		$valids = $this->form_validation->alpha($password);

		if($validu == FALSE AND $valids == FALSE) return FALSE;

		$this->load->database();
		$query = $this->db->get_where('nom_user_registers', array('email'=>$username, 'userpass'=>$password));
		$array_result = $query->row_array();

		if(is_countable($array_result))
			$this->last_count = count($array_result);
		log_message('info', __METHOD__ .' ended with '.print_r($array_result,TRUE));
		return $array_result;
	}

	/**
	 * try to check authentication agains external imap mail account
	 * @name: loginimap
	 * @param $username (STRING), $password (STRING)
	 * @return BOOL true if success
	 */
	public function loginimap($username, $password)
	{
		log_message('info', __METHOD__ .' begin ');

		$validu = $this->form_validation->required($username);
		$validu = $this->form_validation->alpha_dash($username);
		$validu = $this->form_validation->max_length($username,40);
		$valids = $this->form_validation->required($password);
		$valids = $this->form_validation->alpha($password);

		if($validu == FALSE AND $valids == FALSE) return FALSE;

		$config = array('plain'=> TRUE, 'username' => $username, 'password' => $password);
		$this->load->library('Imap', $config);
		$valid  = $this->imap->connect($config);

		if($valid)
			$this->last_count = 1;
		log_message('info', __METHOD__ .' ended with '.print_r($valid,TRUE));
		return $valid;
	}

	/**
	 * complete profile and user data
	 * @name: profileuser
	 * @param $cod_user (STRING), $parameters (ARRAY(MIXED))
	 * @return ARRAY (1->(col:value,col:value...), 2->.. 3->...)
	 */
	public function profileuser($cod_user = NULL, $parameters = NULL)
	{
		$validu = TRUE;

		if($cod_user !== NULL)
		{
			$validu = $this->form_validation->required($username);
			$validu = $this->form_validation->alpha_dash($username);
			$validu = $this->form_validation->max_length($username,60);
		}

		if($validu == FALSE) return FALSE;

		if(!is_array($parameters))
			$parameters = array();

		if($validu)
			$filters = " AND cod_user='".$cod_user."'";

		$querycommand = "
			SELECT p.cod_user,
				u.email,
				u.userpass,
				u.api_token,
				u.userlevel,
				u.created_at AS user_created_at,
				u.updated_at AS user_updated_at,
				p.first_name,
				p.second_name,
				p.last_name,
				p.second_surname,
				p.presentation,
				p.education_level,
				p.address_born,
				p.address_living,
				p.first_phone,
				p.second_phone,
				p.picture_face,
				p.picture_body,
				p.created_at AS profile_created_at,
				p.updated_at AS profile_updated_at
			FROM 
					nom_user_registers AS u
				LEFT JOIN 
					nom_applicantsdb.nom_user_profile AS p
				ON u.cod_user = p.cod_user
			WHERE
				1=1
			";
		$queryfilter = "
			".$filters."
			";

		$this->load->database();
		$queryresults = $this->db->query($querycommand);
		$array_result = $queryresults->result_array();

		if(is_countable($array_result))
			$this->last_count = count($array_result);
		log_message('info', __METHOD__ .' ended with '.print_r($array_result,TRUE));
		return $array_result;
	}

}

?>

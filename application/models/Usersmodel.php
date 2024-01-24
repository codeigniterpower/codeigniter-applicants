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
	/**
	 * default constructor
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
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

		$config = array('plain'=> TRUE, 'username' => $username, 'password' => $password);
		//$this->load->library('Imap', $config);
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
		$query = $this->db->get_where('nom_user_registers', array('email'=>$username, 'password'=>$password));
		$array_result = $query->row_array();

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

		log_message('info', __METHOD__ .' ended with '.print_r($valid,TRUE));
		return $valid;
	}

}

?>

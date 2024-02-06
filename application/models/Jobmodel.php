<?php
/*
 * Jobmodel.php
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
 * Jobmodel class employee vacancy model
 */
class Jobmodel extends CI_Model 
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
	}

	/**
	 * using a employee: de-apply the current user from the current job code
	 * @name: vacancies_new
	 * @param $cod_user (STRING), $cod_vacancies (STRING), $parameters (ARRAY(MIXED))
	 * @return ARRAY (1->(col:value,col:value...), 2->.. 3->...) vacancy props new created but only one element
	 */
	public function vacancies_deapply($cod_user = NULL, $cod_vacancies = NULL, $parameters = NULL)
	{
		$validu = FALSE;
		$this->last_count = 0;

		if($cod_vacancies !== NULL)
		{
			$validu = $this->form_validation->required($cod_user);
			$validu = $this->form_validation->alpha_dash($cod_user);
			$validu = $this->form_validation->max_length($cod_user,60);
		}

		if($validu == FALSE) return FALSE;
// TODO
		return array();
	}

	/**
	 * using a employee: in-apply the current user for the current job code
	 * @name: vacancies_new
	 * @param $cod_user (STRING), $cod_vacancies (STRING), $parameters (ARRAY(MIXED))
	 * @return ARRAY (1->(col:value,col:value...), 2->.. 3->...) vacancy props new created but only one element
	 */
	public function vacancies_inapply($cod_user = NULL, $cod_vacancies = NULL, $parameters = NULL)
	{
		$validu = FALSE;
		$this->last_count = 0;

		if($cod_vacancies !== NULL)
		{
			$validu = $this->form_validation->required($cod_user);
			$validu = $this->form_validation->alpha_dash($cod_user);
			$validu = $this->form_validation->max_length($cod_user,60);
		}

		if($validu == FALSE) return FALSE;
// TODO
		return array();
	}


}

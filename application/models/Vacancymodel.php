<?php
/*
 * Vacancymodel.php
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
 * Vacancymodel class employee vacancy model
 */
class Vacancymodel extends CI_Model 
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
	 * complete vacancies data of jobs proposals
	 * @name: vacancies_jobs
	 * @param $cod_vacancies (STRING), $parameters (ARRAY(MIXED))
	 * @return ARRAY (1->(col:value,col:value...), 2->.. 3->...)
	 */
	public function vacancies_jobs($cod_vacancies = NULL, $parameters = NULL)
	{
		$validu = TRUE;
		$this->last_count = 0;

		if($cod_vacancies !== NULL)
		{
			$validu = $this->form_validation->required($cod_vacancies);
			$validu = $this->form_validation->alpha_dash($cod_vacancies);
			$validu = $this->form_validation->max_length($cod_vacancies,60);
		}

		if($validu == FALSE) return FALSE;

		if(!is_array($parameters))
			$parameters = array();

		if($validu)
			$filters = " AND cod_vacancies='".$cod_vacancies."'";

		$querycommand = "
			SELECT 
				v.cod_vacancies,
				v.cod_vacancies_tag,
				t.des_vacancies_tag,
				d.is_permanent,
				v.vacancies_title,
				d.vacancies_name,
				d.vacancies_description,
				d.vacancies_direction,
				d.vacancies_start,
				d.vacancies_end,
				v.created_at, -- MUST BE SAME IN BOTH TABLES
				v.updated_at -- MUST BE SAME IN BOTH TABLES
			FROM
				nom_vacancies AS v
				LEFT JOIN
					nom_vacancies_details AS d
				ON d.cod_vacancies = v.cod_vacancies
				LEFT JOIN
					nom_vacancies_tag AS t
				ON t.cod_vacancies_tag = v.cod_vacancies_tag
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

	/**
	 * using a job vacancy: list of prospects who applied for a job vacancy
	 * @name: vacancies_applicants
	 * @param $cod_vacancies (STRING), $parameters (ARRAY(MIXED))
	 * @return ARRAY (1->(col:value,col:value...), 2->.. 3->...)
	 */
	public function vacancies_applicants($cod_vacancies = NULL, $parameters = NULL)
	{
		$validu = FALSE;
		$this->last_count = 0;

		if($cod_vacancies !== NULL)
		{
			$validu = $this->form_validation->required($cod_vacancies);
			$validu = $this->form_validation->alpha_dash($cod_vacancies);
			$validu = $this->form_validation->max_length($cod_vacancies,60);
		}

		if($validu == FALSE) return FALSE;

		if(!is_array($parameters))
			$parameters = array();

		if($validu)
			$filters = " AND cod_vacancies='".$cod_vacancies."'";

		$querycommand = "
			SELECT 
				a.cod_vacancies,
				a.apply_at,
				u.email,
				u.created_at AS user_created_at,
				p.created_at AS user_updated_at,
				CONCAT(p.first_name,',',p.second_name,' ',p.last_name,' ',p.second_surname) AS user_name,
				p.address_living,
				p.first_phone,
				p.picture_face,
				a.created_at,
				a.updated_at
			FROM 
				nom_vacancies_applicants AS a
				LEFT JOIN
				nom_user_registers AS u
				ON u.cod_user = a.cod_user
				LEFT JOIN
				nom_user_profile AS p
				ON p.cod_user = a.cod_user
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

	/**
	 * using a employee: list of vacancies who applied the current prospect
	 * @name: applicants_vacancies
	 * @param $cod_user (STRING), $parameters (ARRAY(MIXED))
	 * @return ARRAY (1->(col:value,col:value...), 2->.. 3->...)
	 */
	public function applicants_vacancies($cod_user = NULL, $parameters = NULL)
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

		if(!is_array($parameters))
			$parameters = array();

		if($validu)
			$filters = " AND cod_user='".$cod_user."'";

		$querycommand = "
			SELECT 
				a.cod_user,
				a.apply_at,
				v.cod_vacancies,
				d.vacancies_start,
				d.vacancies_end,
				CONCAT(v.cod_vacancies_tag,':',t.des_vacancies_tag) AS vacancies_tags,
				v.vacancies_title,
				d.is_permanent,
				d.vacancies_name,
				d.created_at, -- MUST BE SAME IN BOTH TABLES
				d.updated_at -- MUST BE SAME IN BOTH TABLES
			FROM 
				nom_vacancies_applicants AS a
				LEFT JOIN
				nom_vacancies AS v
				ON v.cod_vacancies = a.cod_vacancies
				LEFT JOIN
				nom_vacancies_details AS d
				ON d.cod_vacancies = a.cod_vacancies
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

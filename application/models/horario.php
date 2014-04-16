<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Horario extends CI_model {

	public function insertNew($data){

		

		$this->db->insert('horariotb', $data); 

		


	}

	public function index($data){

	}

	

}
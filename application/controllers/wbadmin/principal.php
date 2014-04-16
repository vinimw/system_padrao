<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Principal extends CI_controller {


	public function index() {


		$this->layout = 'dashboard';

		$this->load->view('5530/page/coluna');



	}



}
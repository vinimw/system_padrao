<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sair extends CI_Controller {
	

	function __construct()	{
		
		parent::__construct();

			
		define('PAGINATUAL', 'sair');
		
	}

	public function index()	{
			
		$this->session->unset_userdata('USER_ID');
		$this->session->unset_userdata('USER_NAME');
		$this->session->unset_userdata('USER_EMAIL');
		$this->session->unset_userdata('USER_TIPO');

		redirect('wbadmin/login');
		
	}


}
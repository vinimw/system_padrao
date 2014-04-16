<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Erro_404 extends CI_Controller {
	

	function __construct()	{
		
		parent::__construct();

		
		
		define('PAGINATUAL', 'erro');
		
		$this->template->set('navigator', 'erro');
	}

	public function index()	{
		

		

		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/index');

	}

	

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	

	function __construct()	{
		
		parent::__construct();

		
		
		define('PAGINATUAL', 'home');
		
		$this->template->set('navigator', 'home');
	}

	public function index()	{
		

		

		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/index');

	}

	

}
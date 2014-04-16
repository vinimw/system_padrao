<?php
class Templates extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->template->set('navigator', 'home');
		$this->template->load('template/wbadmin', 'padrao/tabelas');
		
	}


	function usuario()
	{

		$this->template->load('template/index', 'padrao/tabelas');
		
	}

	function colunas()
	{

		$this->template->load('template/index', 'padrao/colunas');
		
	}

	function galeria()
	{

		$this->template->load('template/index', 'padrao/galeria');
		
	}

	
	

}
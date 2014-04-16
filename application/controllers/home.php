<?php
class Home extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{

		$this->template->load('template/index', 'padrao/index');
		
	}


	function tabelas()
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
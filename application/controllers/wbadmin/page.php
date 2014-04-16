<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Page extends CI_controller {

	public function __construct(){

		parent::__construct();

		$this->layout = LAYOUT_DASHBOARD;

	}

	public function index() {

		$this->load->view(MENU_PAGES_VIEW.'coluna');

	}

	public function coluna() {

		$this->load->view(MENU_PAGES_VIEW.'coluna');

	}

	public function formulario() {


		$this->load->view(MENU_PAGES_VIEW.'formulario');


	}

	public function tabela() {


		$this->load->view(MENU_PAGES_VIEW.'tabela');


	}



}
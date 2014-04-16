<?php

/**
 * Classe (model) customisada
 * Extends CI_Model
 * @author Rodrigo TT <rodrigo@encinterativa.com.br>
 * @author Rainer Lopez <rainer@encinterativa.com.br>
 * 
 * @see CI_Model
 * 
 * @copyright 2013 ENC Interativa
 */
class ENC_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// if(!$this->session->userdata('usuario')) redirect('wbadmin');
		
	}

}

?>
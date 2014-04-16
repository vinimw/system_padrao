<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	

	function __construct()	{
		
		parent::__construct();

		$this->load->model('Usuario_Model','UsuarioM');
		
		define('PAGINATUAL', 'login');
		
	}

	public function index()	{
			
		$VER_userid 	= $this->session->userdata('USER_ID');
		$VER_username 	= $this->session->userdata('USER_NAME');
		$VER_useremail 	= $this->session->userdata('USER_EMAIL');
		$VER_usertipo 	= $this->session->userdata('USER_TIPO');

		if( ($VER_userid != FALSE) and ($VER_username != FALSE) and ($VER_useremail != FALSE) and ($VER_usertipo != FALSE)  ){

			redirect('wbadmin/home');
		}else{

			$this->template->load('template/login', '5530/'.PAGINATUAL.'/index');
		}

	}

	public function logar()	{

		$email 		= ($this->input->post('email'));
		$pass		= $this->input->post('pass');
		
		$itens = array(

				"email" 		=> $email,
				"pass" 			=> $this->encrypt->sha1($pass),

				);


		$logado = $this->UsuarioM->get($itens, TRUE, 0);

		if($logado){
			
			
			$this->session->set_userdata('USER_ID', $logado->iduser);
			$this->session->set_userdata('USER_NAME', $logado->nome);
			$this->session->set_userdata('USER_EMAIL', $logado->email);
			$this->session->set_userdata('USER_TIPO', $logado->tipo);
			redirect('wbadmin/home');

		}else{
			$this->session->unset_userdata('USER_ID');
			$this->session->unset_userdata('USER_NAME');
			$this->session->unset_userdata('USER_EMAIL');
			$this->session->unset_userdata('USER_TIPO');
			
			$this->session->set_userdata('Mensagem', "Login ou senha incorreto, tente novamente");
			redirect('wbadmin/login');
		}

	}

}
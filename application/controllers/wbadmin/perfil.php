<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Perfil extends CI_controller {

	public function __construct(){

		parent::__construct();

		$this->load->model('Usuario_Model', 'UsuarioM');

		$this->template->set('navigator', 'perfil');

		
	}

	public function index() {

		
		$userid 	= $this->session->userdata('USER_ID');

		$where = array("iduser" => $userid);

		$res 	= $this->UsuarioM->get($where, TRUE, 0);

		$data['TITULOINTERNO'] 		= 'Perfil';
		$data['SUBTITULO'] 			= 'Editar';
		$data['IDALTERA'] 			= $userid;
		$data['NOME'] 				= $res->nome;
		$data['EMAIL'] 				= $res->email;
		
		$this->template->load('template/wbadmin', '5530/perfil/index', $data);

	}

	
	public function alterar(){

		$userid 	= $this->session->userdata('USER_ID');

		$nome 			= $this->input->post('nome');
		$email 			= $this->input->post('email');

		if($this->input->post('pass') != ''){
			$pass 			= $this->encrypt->sha1($this->input->post('pass'));

			$itens = array(

				"nome" 				=> $nome,
				"email" 			=> $email,
				"pass" 				=> $pass,

				);
		}else{
			$itens = array(

				"nome" 				=> $nome,
				"email" 			=> $email,

				);
		}
		


		

		$idaltera = $this->UsuarioM->update($itens,$userid);

		if($idaltera){
			$this->session->set_userdata('Mensagem', "Alterado com sucesso");	
			$this->session->set_userdata('USER_NAME', $nome);
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao alterar, tente novamente");
		}
		
		redirect('wbadmin/perfil');
	}

	



}
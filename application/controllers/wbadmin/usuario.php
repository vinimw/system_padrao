<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Usuario extends CI_controller {

	public function __construct(){

		parent::__construct();

		

		$this->load->model('Usuario_Model', 'UsuarioM');

		$this->template->set('navigator', 'user');
	}

	public function index() {

		

		$data = array();
		$data['TITULOINTERNO'] 		= 'Usuários';
		$data['SUBTITULO'] 			= 'Gerenciar';
		$data['BLC_DADOS'] 			= array();
		
		$res 	= $this->UsuarioM->get(array(), FALSE, 0); // false utilizado para falar que não quero pegar só primeira linha

		if($res){
			
			foreach ($res as $r) {
				$data['BLC_DADOS'][] = array(

					"NOME" 			=> $r->nome,
					"EMAIL" 		=> $r->email,
					"URLEDITAR"		=> site_url('wbadmin/usuario/editar/'.$r->iduser),
					"URLEXCLUIR"	=> site_url('wbadmin/usuario/excluir/'.$r->iduser)


					);	
			}
			


		}else{
			$data['BLC_SEMDADOS'][] = array();
		}


		$this->template->load('template/wbadmin', '5530/usuario/gerenciar', $data);

	}

	public function adicionar(){

		$data = array();
		$data['TITULOINTERNO'] 		= 'Usuários';
		$data['SUBTITULO'] 			= 'Adicionar';

		$this->template->load('template/wbadmin', '5530/usuario/adicionar', $data);
		

	}

	public function editar($id){

		$where = array("iduser" => $id);

		$res 	= $this->UsuarioM->get($where, TRUE, 0);

		$data['TITULOINTERNO'] 		= 'Usuários';
		$data['SUBTITULO'] 			= 'Editar';
		$data['IDALTERA'] 			= $id;
		$data['NOME'] 				= $res->nome;
		$data['EMAIL'] 				= $res->email;

		

		if($res->tipo == 1){
			$option[] = '<option selected="selected" value="1">Comum</option>';
		}else{
			$option[] = '<option value="1">Comum</option>';
		}

		if($res->tipo == 2){
			$option[] = '<option selected="selected" value="2">Administrador</option>';
		}else{
			$option[] = '<option value="2">Administrador</option>';
		}
		
		

		$data['TIPO'] = $option[0].$option[1];
		
		$this->template->load('template/wbadmin', '5530/usuario/editar', $data);
		

	}

	public function add(){

		$nome 			= $this->input->post('nome');
		$email 			= $this->input->post('email');
		$pass 			= $this->encrypt->sha1($this->input->post('pass'));
		$tipo 			= $this->input->post('tipo');
		$data_criado 	= date("Y-m-d H:i:s");

			
		$itens = array(

				"nome" 				=> $nome,
				"email" 			=> $email,
				"pass" 				=> $pass,
				"tipo" 				=> $tipo,
				"data_criado" 		=> $data_criado,

				);


		$idpagamento = $this->UsuarioM->cadastra($itens);

		if($idpagamento){
			$this->session->set_userdata('Mensagem', "Cadastrado com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao cadastrar, tente novamente");
		}
		
		redirect('wbadmin/usuario');
	}

	public function alterar($id){

		$nome 			= $this->input->post('nome');
		$email 			= $this->input->post('email');
		$tipo 			= $this->input->post('tipo');

		if($this->input->post('pass') != ''){
			$pass 			= $this->encrypt->sha1($this->input->post('pass'));

			$itens = array(

				"nome" 				=> $nome,
				"email" 			=> $email,
				"pass" 				=> $pass,
				"tipo" 				=> $tipo,

				);
		}else{
			$itens = array(

				"nome" 				=> $nome,
				"email" 			=> $email,
				"tipo" 				=> $tipo,

				);
		}
		


		

		$idaltera = $this->UsuarioM->update($itens,$id);

		if($idaltera){
			$this->session->set_userdata('Mensagem', "Alterado com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao alterar, tente novamente");
		}
		
		redirect('wbadmin/usuario/editar/'.$idaltera);
	}

	public function excluir($id){

		$excluir = $this->UsuarioM->delete($id);

		

		if($excluir){
			$this->session->set_userdata('Mensagem', "Excluido com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao excluir, tente novamente");
		}

		redirect('wbadmin/usuario');

	}



}
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Noticia extends CI_controller {

	public function __construct(){

		parent::__construct();



		$this->template->set('navigator', 'notice');

		$this->load->model('Noticia_Model', 'NoticiaM');

		define('PAGINATUAL', 'noticia');
		define('IDCOLUNA', 'noticia_id');
		define('LINKPAINEL', 'wbadmin/');


	}

	public function index() {

		

		$data = array();
		$data['TITULOINTERNO']		= ('Notícias');
		$data['SUBTITULO'] 			= 'Gerenciar';
		$data['BLC_DADOS'] 			= array();
		
		$res 	= $this->NoticiaM->get(array(), FALSE, 0); // false utilizado para falar que não quero pegar só primeira linha

		if($res){
			
			foreach ($res as $r) {
				$data['BLC_DADOS'][] = array(

					"TITULONOTICIA" => $r->noticia_titulo,
					"NOTICIATEMP" 	=> word_limiter($r->noticia_temp, 24),
					"NOTICIADATA" 	=> $this->Padrao_Model->arrumaSomenteData($r->noticia_data),
					"URLEDITAR"		=> site_url(LINKPAINEL.PAGINATUAL.'/editar/'.$r->noticia_id),
					"URLEXCLUIR"	=> site_url(LINKPAINEL.PAGINATUAL.'/excluir/'.$r->noticia_id)

					);	
			}
			


		}else{
			$data['BLC_SEMDADOS'][] = array();
		}

		
		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/gerenciar', $data);

		



	}

	public function adicionar(){

		$data['TITULOINTERNO']		= 'Notícias';
		$data['SUBTITULO'] 			= 'Adicionar';


		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/adicionar', $data);

	}

	public function editar($id){

		$where = array(IDCOLUNA => $id);

		$res 	= $this->NoticiaM->get($where, TRUE, 0);

		$data['TITULOINTERNO']			= 'Notícias';
		$data['SUBTITULO'] 			= 'Editar';
		$data['IDALTERA'] 			= $id;
		$data['TITULONOTICIA'] 		= $res->noticia_titulo;
		$data['IMAGEMATUAL'] 		= $res->noticia_imagem;
		$data['NOTICIATEMP'] 		= $res->noticia_temp;
		$data['NOTICIADATA'] 		= $this->Padrao_Model->arrumaSomenteData($res->noticia_data);
		$data['NOTICIADESC'] 		= $res->noticia_descricao;

		
		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/editar', $data);

	}

	public function add(){

		$noticia_titulo 	= ($this->input->post('noticia_titulo'));
		$noticia_temp		= $this->input->post('noticia_temp');
		$noticia_descricao	= $this->input->post('noticia_descricao');
		$noticia_data		= $this->Padrao_Model->cadastraSomenteData($this->input->post('noticia_data'));
		$noticia_datatime 	= date("Y-m-d H:i:s");
		$noticia_link 		= $this->Padrao_Model->cadastraTitulo(utf8_decode($noticia_titulo));

		//virifica se ja exista url
		$retonaUrl = $this->Padrao_Model->verificaUrl($noticia_link,'wb_noticia','noticia_link');

		$addPagina = 2;
		while($retonaUrl > 0){
			
			if($addPagina > 2){
				
				$noticia_link = substr($noticia_link, 0, -2);
			}
			$noticia_link = $noticia_link.'-'.$addPagina;

			$retonaUrl = $this->Padrao_Model->verificaUrl($noticia_link,'wb_noticia','noticia_link');

			$addPagina++;
		}
		//fim verifica

		$itens = array(

				"noticia_titulo" 		=> $noticia_titulo,
				"noticia_link" 			=> $noticia_link,
				"noticia_temp" 			=> $noticia_temp,
				"noticia_descricao" 	=> $noticia_descricao,
				"noticia_data" 			=> $noticia_data,
				"noticia_datatime" 		=> $noticia_datatime,
				

				);
		
		
		$idcadastra = $this->NoticiaM->cadastra($itens);

		if($idcadastra){
			$this->session->set_userdata('Mensagem', "Cadastrado com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao cadastrar, tente novamente");
		}
		
		redirect('wbadmin/'.PAGINATUAL);
	}

	public function alterar($id){

		$noticia_titulo 	= ($this->input->post('noticia_titulo'));
		$noticia_temp		= $this->input->post('noticia_temp');
		$noticia_descricao	= $this->input->post('noticia_descricao');
		$noticia_descricao	= $this->input->post('noticia_descricao');
		$imagem_antiga		= $this->input->post('imagem_antiga');
		$userfile			= $this->input->post('userfile');

		$noticia_data		= $this->Padrao_Model->cadastraSomenteData($this->input->post('noticia_data'));

		
			$itens = array(

				"noticia_titulo" 		=> $noticia_titulo,
				"noticia_temp" 			=> $noticia_temp,
				"noticia_descricao" 	=> $noticia_descricao,
				"noticia_data" 			=> $noticia_data,
				"imagem_antiga" 		=> $imagem_antiga,

				);
		
		


		$idaltera = $this->NoticiaM->update($itens,$id);

		if($idaltera){
			$this->session->set_userdata('Mensagem', "Alterado com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao alterar, tente novamente");
		}
		
		redirect(LINKPAINEL.PAGINATUAL.'/editar/'.$idaltera);
	}

	public function excluir($id){

		$excluir = $this->NoticiaM->delete($id);

		

		if($excluir){
			$this->session->set_userdata('Mensagem', "Excluido com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao excluir, tente novamente");
		}

		redirect(LINKPAINEL.PAGINATUAL);

	}



}
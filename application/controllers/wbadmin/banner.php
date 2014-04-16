<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Banner extends CI_controller {

	public function __construct(){

		parent::__construct();

		$this->template->set('navigator', 'banner');

		$this->load->model('Banner_Model', 'BannerM');

		define('PAGINATUAL', 'banner');
		define('IDCOLUNA', 'banner_id');
		define('LINKPAINEL', 'wbadmin/');
		define('TITULOPAGINA', 'Banners');

	}

	public function index() {

		$data = array();
		$data['TITULOINTERNO']		= TITULOPAGINA;
		$data['SUBTITULO'] 			= 'Gerenciar';
		$data['BLC_DADOS'] 			= array();
		
		$res 	= $this->BannerM->get(array(), FALSE, 0); // false utilizado para falar que não quero pegar só primeira linha


		if($res){
			
			foreach ($res as $r) {

				$ativoBanner = $this->Padrao_Model->ativoData($r->banner_dataEntra,$r->banner_dataSai);

				$data['BLC_DADOS'][] = array(

					"banner_nome" 		=> $r->banner_nome,
					"banner_titulo" 	=> $r->banner_titulo,
					"banner_dataEntra" 	=> $ativoBanner,
					"banner_ordem" 		=> $r->banner_ordem,
					"URLEDITAR"			=> site_url(LINKPAINEL.PAGINATUAL.'/editar/'.$r->banner_id),
					"URLEXCLUIR"		=> site_url(LINKPAINEL.PAGINATUAL.'/excluir/'.$r->banner_id)

					);	
			}
			
		}else{
			$data['BLC_SEMDADOS'][] = array();
		}

		
		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/gerenciar', $data);

	}

	public function adicionar(){

		$data['TITULOINTERNO']		= TITULOPAGINA;
		$data['SUBTITULO'] 			= 'Adicionar';



		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/adicionar', $data);

	}

	public function editar($id){

		$where = array(IDCOLUNA => $id);

		$res 	= $this->BannerM->get($where, TRUE, 0);

		$data['TITULOINTERNO']			= TITULOPAGINA;
		$data['SUBTITULO'] 			= 'Editar';
		$data['IDALTERA'] 			= $id;
		$data['banner_nome'] 		= $res->banner_nome;
		$data['banner_titulo'] 		= $res->banner_titulo;
		$data['banner_descricao'] 	= $res->banner_descricao;
		$data['banner_dataEntra'] 	= $this->Padrao_Model->arrumaSomenteData($res->banner_dataEntra);
		$data['banner_dataSai'] 	= $this->Padrao_Model->arrumaSomenteData($res->banner_dataSai);
		$data['banner_imagem'] 		= $res->banner_imagem;
		$data['banner_ordem'] 		= $res->banner_ordem;

		
		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/editar', $data);

	}

	public function add(){

		$banner_nome 		= $this->input->post('banner_nome');
		$banner_titulo		= $this->input->post('banner_titulo');
		$banner_dataEntra	= $this->input->post('banner_dataEntra');
		$banner_dataSai		= $this->input->post('banner_dataSai');
		$banner_descricao	= $this->input->post('banner_descricao');
		$banner_ordem		= $this->input->post('banner_ordem');


		$itens = array(

				"banner_nome" 			=> $banner_nome,
				"banner_titulo" 		=> $banner_titulo,
				"banner_dataEntra" 		=> $this->Padrao_Model->cadastraSomenteData($banner_dataEntra),
				"banner_dataSai" 		=> $this->Padrao_Model->cadastraSomenteData($banner_dataSai),
				"banner_descricao" 		=> $banner_descricao,
				"banner_ordem" 			=> $banner_ordem,

				);
		
		$idcadastra = $this->BannerM->cadastra($itens);

		if($idcadastra){
			$this->session->set_userdata('Mensagem', "Cadastrado com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao cadastrar, tente novamente");
		}
		
		redirect('wbadmin/'.PAGINATUAL);
	}

	public function alterar($id){

		$banner_nome 		= $this->input->post('banner_nome');
		$banner_titulo		= $this->input->post('banner_titulo');
		$banner_dataEntra	= $this->input->post('banner_dataEntra');
		$banner_dataSai		= $this->input->post('banner_dataSai');
		$banner_descricao	= $this->input->post('banner_descricao');
		$imagem_antiga		= $this->input->post('imagem_antiga');
		$banner_ordem		= $this->input->post('banner_ordem');

		

		$itens = array(

				"banner_nome" 			=> $banner_nome,
				"banner_titulo" 		=> $banner_titulo,
				"banner_dataEntra" 		=> $this->Padrao_Model->cadastraSomenteData($banner_dataEntra),
				"banner_dataSai" 		=> $this->Padrao_Model->cadastraSomenteData($banner_dataSai),
				"banner_descricao" 		=> $banner_descricao,
				"imagem_antiga" 		=> $imagem_antiga,
				"banner_ordem" 			=> $banner_ordem,
				

				);
		

		$idaltera = $this->BannerM->update($itens,$id);

		if($idaltera){
			$this->session->set_userdata('Mensagem', "Alterado com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao alterar, tente novamente");
		}
		
		redirect(LINKPAINEL.PAGINATUAL.'/editar/'.$idaltera);
	}

	public function excluir($id){

		$excluir = $this->BannerM->delete($id);

		

		if($excluir){
			$this->session->set_userdata('Mensagem', "Excluido com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao excluir, tente novamente");
		}

		redirect(LINKPAINEL.PAGINATUAL);

	}

	private function subpagina($id = 0, $idsel = 0){

		$condicao = array('page_id !=' => $id, 'page_sub' => '0');
		$retornar = '';

		$res 	= $this->BannerM->get($condicao, FALSE, 0); // false utilizado para falar que não quero pegar só primeira linha

		foreach ($res as $valores) {
			
			if($valores->page_id == $idsel){
				$retornar .= '<option selected="selected" value="'.$valores->page_id.'">'.$valores->page_titulo.'</option>';
			}else{
				$retornar .= '<option value="'.$valores->page_id.'">'.$valores->page_titulo.'</option>';
			}

		}

		return $retornar;
		//var_dump($valores);
	}



}
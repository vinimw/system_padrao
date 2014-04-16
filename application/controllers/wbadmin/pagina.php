<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pagina extends CI_controller {

	public function __construct(){

		parent::__construct();



		$this->template->set('navigator', 'page');

		$this->load->model('Pagina_Model', 'PaginaM');

		define('PAGINATUAL', 'pagina');
		define('IDCOLUNA', 'page_id');
		define('LINKPAINEL', 'wbadmin/');
		define('TITULOPAGINA', 'Páginas');


	}

	public function index() {

		

		$data = array();
		$data['TITULOINTERNO']		= TITULOPAGINA;
		$data['SUBTITULO'] 			= 'Gerenciar';
		$data['BLC_DADOS'] 			= array();
		
		$res 	= $this->PaginaM->get(array(), FALSE, 0); // false utilizado para falar que não quero pegar só primeira linha

		if($res){
			
			foreach ($res as $r) {

				$paginaNome = 'Principal(Mãe)';
				if($r->page_sub != 0){
					$nomePagina		= $this->PaginaM->get(array('page_id' => $r->page_sub), TRUE, 0);
					$paginaNome = $nomePagina->page_titulo;
				}

				$data['BLC_DADOS'][] = array(

					"TITULOPAGINA" => $r->page_titulo,
					"PAGINAORDEM" 	=> $r->page_ordem,
					"PAGINASUB" 	=> $paginaNome,
					"URLEDITAR"		=> site_url(LINKPAINEL.PAGINATUAL.'/editar/'.$r->page_id),
					"URLEXCLUIR"	=> site_url(LINKPAINEL.PAGINATUAL.'/excluir/'.$r->page_id)

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

		$data['select'] 			= $this->subpagina();


		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/adicionar', $data);

	}

	public function editar($id){

		$where = array(IDCOLUNA => $id);

		$res 	= $this->PaginaM->get($where, TRUE, 0);

		$data['TITULOINTERNO']			= TITULOPAGINA;
		$data['SUBTITULO'] 			= 'Editar';
		$data['IDALTERA'] 			= $id;
		$data['page_titulo'] 		= $res->page_titulo;
		$data['page_ordem'] 		= $res->page_ordem;
		$data['page_sub'] 			= $res->page_sub;
		$data['page_linkfora'] 		= $res->page_linkfora;
		$data['page_html'] 			= $res->page_html;

		$data['select'] 			= $this->subpagina($id,$data['page_sub']);

		
		$this->template->load('template/wbadmin', '5530/'.PAGINATUAL.'/editar', $data);

	}

	public function add(){

		$page_titulo 		= $this->input->post('page_titulo');
		$page_ordem			= $this->input->post('page_ordem');
		$page_sub			= $this->input->post('page_sub');
		$page_linkfora		= $this->input->post('page_linkfora');
		$page_html			= $this->input->post('page_html');

		$page_link 		= $this->Padrao_Model->cadastraTitulo(utf8_decode($page_titulo));

		//virifica se ja exista url
		$retonaUrl = $this->Padrao_Model->verificaUrl($page_link,'wb_page','page_link');

		$addPagina = 2;
		while($retonaUrl > 0){
			
			if($addPagina > 2){
				
				$page_link = substr($page_link, 0, -2);
			}
			$page_link = $page_link.'-'.$addPagina;

			$retonaUrl = $this->Padrao_Model->verificaUrl($page_link,'wb_page','page_link');

			$addPagina++;
		}
		//fim verifica

		$itens = array(

				"page_titulo" 			=> $page_titulo,
				"page_ordem" 			=> $page_ordem,
				"page_sub" 				=> $page_sub,
				"page_linkfora" 		=> $page_linkfora,
				"page_html" 			=> $page_html,
				"page_link" 			=> $page_link,
				

				);
		
		
		$idcadastra = $this->PaginaM->cadastra($itens);

		if($idcadastra){
			$this->session->set_userdata('Mensagem', "Cadastrado com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao cadastrar, tente novamente");
		}
		
		redirect('wbadmin/'.PAGINATUAL);
	}

	public function alterar($id){

		$page_titulo 		= $this->input->post('page_titulo');
		$page_ordem			= $this->input->post('page_ordem');
		$page_sub			= $this->input->post('page_sub');
		$page_linkfora		= $this->input->post('page_linkfora');
		$page_html			= $this->input->post('page_html');

		

		$itens = array(

				"page_titulo" 			=> $page_titulo,
				"page_ordem" 			=> $page_ordem,
				"page_sub" 				=> $page_sub,
				"page_linkfora" 		=> $page_linkfora,
				"page_html" 			=> $page_html,
				

				);
		

		$idaltera = $this->PaginaM->update($itens,$id);

		if($idaltera){
			$this->session->set_userdata('Mensagem', "Alterado com sucesso");	
		}else{
			$this->session->set_userdata('Mensagem', "Erro ao alterar, tente novamente");
		}
		
		redirect(LINKPAINEL.PAGINATUAL.'/editar/'.$idaltera);
	}

	public function excluir($id){

		$excluir = $this->PaginaM->delete($id);

		

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

		$res 	= $this->PaginaM->get($condicao, FALSE, 0); // false utilizado para falar que não quero pegar só primeira linha

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
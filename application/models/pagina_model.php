<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Pagina_Model extends CI_model {

	public function __construct(){

		parent::__construct();

		define('MEXERBANCO', 'wb_page');
		define('IDALTERA', 'page_id');

	}

	public function get ($condicao = array(), $primeiraLinha = FALSE, $pagina = 0){


		$this->db->select('page_id,page_titulo,page_link,page_ordem,page_sub,page_linkfora,page_html');
		$this->db->where($condicao);
		$this->db->from(MEXERBANCO);

		if($primeiraLinha){

			return $this->db->get()->first_row();
		}else{
			$this->db->limit(5000);
			return $this->db->get()->result();
		}

	}

	


	public function cadastra($itens){


		$res = $this->db->insert(MEXERBANCO, $itens);

		if($res){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}

	}

	public function update($itens, $idusuario){

		$this->db->where(IDALTERA, $idusuario, FALSE);

		$res = $this->db->update(MEXERBANCO, $itens);

		if($res){
			return $idusuario;
		}else{
			return FALSE;
		}

	}

	public function delete($itens){


		// $this->db->where('idusuario', $itens);
		// $res = $this->db->delete('usuario');

		return $this->db->delete(MEXERBANCO, array(IDALTERA => $itens)); 


		

	}
	

}
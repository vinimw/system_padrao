<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Horas_Model extends CI_model {

	public function get ($condicao = array(), $primeiraLinha = FALSE){


		$this->db->select('idpagamento,data,valor,titulo ');
		$this->db->where($condicao);
		$this->db->from('pagamento');

		if($primeiraLinha){

			return $this->db->get()->first_row();
		}else{
			$this->db->limit(LINHAS_SYSTEM);
			return $this->db->get()->result();
		}

	}


	public function post($itens){


		$res = $this->db->insert('pagamento', $itens);

		if($res){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}

	}

	public function update($itens,$idedita){


		$this->db->where('idpagamento', $idedita, FALSE);

		$res = $this->db->update('pagamento', $itens);

		if($res){
			return $idedita;
		}else{
			return FALSE;
		}

	}

	public function delete($itens){


		// $this->db->where('idusuario', $itens);
		// $res = $this->db->delete('usuario');


		// este debaixo é o que funciona atualmente
		return $this->db->delete('pagamento', array('idpagamento' => $itens)); 


		

	}
	

}
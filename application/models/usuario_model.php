<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Usuario_Model extends CI_model {

	public function get ($condicao = array(), $primeiraLinha = FALSE, $pagina = 0){


		$this->db->select('iduser,nome,email,tipo');
		$this->db->where($condicao);
		$this->db->from('u_ser');

		if($primeiraLinha){

			return $this->db->get()->first_row();
		}else{
			$this->db->limit(5000);
			return $this->db->get()->result();
		}

	}


	public function cadastra($itens){


		$res = $this->db->insert('u_ser', $itens);

		if($res){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}

	}

	public function update($itens, $idusuario){


		$this->db->where('iduser', $idusuario, FALSE);

		$res = $this->db->update('u_ser', $itens);

		if($res){
			return $idusuario;
		}else{
			return FALSE;
		}

	}

	public function delete($itens){


		// $this->db->where('idusuario', $itens);
		// $res = $this->db->delete('usuario');

		return $this->db->delete('u_ser', array('iduser' => $itens)); 


		

	}
	

}
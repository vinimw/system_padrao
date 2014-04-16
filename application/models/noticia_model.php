<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Noticia_Model extends CI_model {

	public function __construct(){

		parent::__construct();

		define('MEXERBANCO', 'wb_noticia');
		define('IDALTERA', 'noticia_id');

	}

	public function get ($condicao = array(), $primeiraLinha = FALSE, $pagina = 0){


		$this->db->select('noticia_id,noticia_titulo,noticia_temp,noticia_data,noticia_descricao,noticia_imagem');
		$this->db->where($condicao);
		$this->db->from(MEXERBANCO);

		if($primeiraLinha){

			return $this->db->get()->first_row();
		}else{
			$this->db->limit(5000);
			return $this->db->get()->result();
		}

	}

	function do_resize($data) {
        ////[ THUMB IMAGE ]
        $configs['image_library'] = 'gd2';
        $configs['source_image'] = $data['source_image'];
        if (isset($data['new_image'])) {
            $configs['new_image'] = $data['new_image'];
        }
        $configs['maintain_ratio'] = TRUE;
        if (isset($data['create_thumb'])) {
            $configs['create_thumb'] = $data['create_thumb'];
        }
        $configs['overwrite'] = TRUE;
        if (isset($data['thumb_marker'])) {
            $configs['thumb_marker'] = $data['thumb_marker'];
        }

        if (isset($data['width'])) {
            $configs['width'] = $data['width'];
        }

        if (isset($data['height'])) {
            $configs['height'] = $data['height'];
        }

        $this->image_lib->clear();
        $this->image_lib->initialize($configs);
        $resize = $this->image_lib->resize();

//        $this->load->library('image_lib', $configs);
//
//        $resize = $this->image_lib->resize();

        if (!$resize) {
            var_dump($this->image_lib->display_errors('', ''));
            return FALSE;
        }

        var_dump($resize);
        return TRUE;
    }

	function do_upload($nomeImagem) {

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['max_size'] = '6000';

        
        $config['file_name'] = $nomeImagem;

        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            return $error;
        } else {
            
            chmod($this->upload->upload_path . $this->upload->file_name, 0777);

            $file_name = strtolower($this->upload->file_name);
            
            //$image_data = $this->upload->data();
            ////[ THUMB IMAGE ]
            $config2['source_image'] = $this->upload->upload_path . $file_name;
            $config2['new_image'] = 'assets/uploads/thumbs/';
            $config2['create_thumb'] = TRUE;
            $config2['thumb_marker'] = '';
            $config2['width'] = 400;
            $config2['height'] = 400;

            $thumb = $this->do_resize($config2);

            //[ MAIN IMAGE ]
            $config['source_image'] = $this->upload->upload_path . $file_name;
            $config['create_thumb'] = FALSE;
            $config['width'] = 800;
            $config['height'] = 600;


            $img_resize = $this->do_resize($config);

            $data = $this->upload->data();
            return $data;
        }
    }




	public function cadastra($itens){

		$add_foto = $this->do_upload($itens['noticia_link']);
		if ($add_foto) {
                $itens['noticia_imagem'] = $add_foto['file_name'];
            } else {
                $this->session->set_flashdata(
                        'msg', $error
                );
                return FALSE;
            }

		$res = $this->db->insert(MEXERBANCO, $itens);

		if($res){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}

	}

	public function update($itens, $idusuario){

        

        $nameImagem = explode('.', $itens['imagem_antiga']);
        $nameImagem = $nameImagem[0];
        $itens['nameImagem'] = $nameImagem;
        

        $add_foto = $this->do_upload($itens['nameImagem']);

        if ($add_foto) {
            if(isset($add_foto['file_name'])){
                $itens['noticia_imagem'] = $add_foto['file_name'];
            }else{
                $itens['noticia_imagem'] =  $itens['imagem_antiga'];
            }
        }

        unset($itens['imagem_antiga'],$itens['nameImagem']);


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
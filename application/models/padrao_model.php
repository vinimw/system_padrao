<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Padrao_Model extends CI_model {

	function cadastraSomenteData($data){
    
    
	    $quebra = explode("/", $data);
	    $formatado = $quebra[2]."-".$quebra[1]."-".$quebra[0];
	    return $formatado;
    
	}



	function valorCadastra($var){

	    $var = str_replace(".", "", $var);
	    $var = str_replace(",", ".", $var);
	    return $var;
	}

	

	function arrumaSomenteData($data){
    
	    $separaQuebra = explode(" ", $data);
	    $quebraData = explode("-",$separaQuebra[0]);
	    $arrumaData = $quebraData[2]."/".$quebraData[1]."/".$quebraData[0];
	    
	    return $arrumaData;
	    
    
	}

	function ativoData($dataEntra,$dataSai) {
		
		$dataAtual = date("Y-m-d");
							
		if(($dataSai >= $dataAtual) and ($dataEntra <= $dataAtual)){
			return 'Ativo';
		}else{
			return 'Não ativo';
		}
	}


	function formataNumero($numero){

		return number_format($numero, 2, ',', ' ');
	}

	function cadastraTitulo($titulo){

		$slug = false;
		$string = strtolower($titulo);

		// Código ASCII das vogais
		$ascii['a'] = range(224, 230);
		$ascii['e'] = range(232, 235);
		$ascii['i'] = range(236, 239);
		$ascii['o'] = array_merge(range(242, 246), array(240, 248));
		$ascii['u'] = range(249, 252);

		// Código ASCII dos outros caracteres
		$ascii['b'] = array(223);
		$ascii['c'] = array(231);
		$ascii['d'] = array(208);
		$ascii['n'] = array(241);
		$ascii['y'] = array(253, 255);

		foreach ($ascii as $key=>$item) {
			$acentos = '';
			foreach ($item AS $codigo) $acentos .= chr($codigo);
			$troca[$key] = '/['.$acentos.']/i';
		}

		$string = preg_replace(array_values($troca), array_keys($troca), $string);

		// Slug?
		if ($slug) {
			// Troca tudo que não for letra ou número por um caractere ($slug)
			$string = preg_replace('/[^a-z0-9]/i', $slug, $string);
			// Tira os caracteres ($slug) repetidos
			$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
			$string = trim($string, $slug);
		}

	

		$table = array(
	        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z',
	        'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
	        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
	        'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
	        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
	        'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
	        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
	        'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
	        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
	        'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
	        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
	        'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
	        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
	        'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
	        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
	    );
	    // Traduz os caracteres em $string, baseado no vetor $table
	    $string = strtr($string, $table);
	    // converte para minúsculo
	    $string = strtolower($string);
	    // remove caracteres indesejáveis (que não estão no padrão)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    // Remove múltiplas ocorrências de hífens ou espaços
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    // Transforma espaços e underscores em hífens
	    $string = preg_replace("/[\s_]/", "-", $string);
	    // retorna a string
	    return $string;
	}


	function verificaUrl($url,$tabela,$campoTabela){

		$condicao = array($campoTabela => $url);

		$query = $this->db->select($campoTabela);
		$this->db->where($condicao);
		$this->db->from($tabela);

		return $this->db->get()->num_rows();
		
    	
	}
	
	

}
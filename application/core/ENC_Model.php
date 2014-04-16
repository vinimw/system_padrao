<?php

/**
 * Classe (model) customisada
 * Extends CI_Model
 * @author Rodrigo TT <rodrigo@encinterativa.com.br>
 * @author Rainer Lopez <rainer@encinterativa.com.br>
 * 
 * @see CI_Model
 * 
 * @copyright 2013 ENC Interativa
 */
class ENC_Model extends CI_Model {

	var $_table_name	= null;
	var $_name 			= null;
	var $_primary_key 	= 'id';
	var $_rule_validate = array();
	var $_validation	= array();
	var $_nao_tratar	= array('senha','email');

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	function insert_id(){
		return $this->db->insert_id();
	}

	function invalidFields()
	{
		return  $this->_validation;
	}

	function invalidFieldsToString()
	{
		
		$validation = null;
		if($this->_validation){
			foreach ($this->_validation as $val)
				$validation .= implode("", $val);
		}

		return $validation;
	}

	function invalidate($field,$text)
	{
		$this->_validation[$field][] = "<p>{$text}</p>";
	}

	function incluir($data)
	{
		if($this->_rule_validate){
			$this->form_validation->set_rule($this->_rule_validate);
			if(!$this->form_validation->run())return false;
		}

		array_walk($data, array($this, '_trata_txt'));
		
		unset($data[$this->_primary_key]);
		return $this->db->insert($this->_table_name, $data);
	}

	function _trata_txt(&$var,$field) {
		
		if(!in_array($field, $this->_nao_tratar)){
			$acentos = array(
				'À', 'Á', 'Ã', 'Â', 'à', 'á', 'ã', 'â',
				'Ê', 'É',
				'Í', 'í',
				'Ó', 'Õ', 'Ô', 'ó', 'õ', 'ô',
				'Ú', 'Ü',
				'Ç', 'ç',
				'é', 'ê',
				'ú', 'ü',
			);
			$remove_acentos = array(
				'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
				'e', 'e',
				'i', 'i',
				'o', 'o', 'o', 'o', 'o', 'o',
				'u', 'u',
				'c', 'c',
				'e', 'e',
				'u', 'u',
			);
			$var = str_replace($acentos, $remove_acentos, urldecode($var));
			$var = strtoupper($var);		
		}
	}

	function atualizar($data)
	{
		if($this->_rule_validate){
			$this->form_validation->set_rule($this->_rule_validate);
			if(!$this->form_validation->run())return false;
		}

		if(!isset($data[$this->_primary_key]) && $data[$this->_primary_key]) return false;

		$primary_key = $data[$this->_primary_key];
		unset($data[$this->_primary_key]);
		return $this->db->update($this->_table_name, $data, array($this->_primary_key => $primary_key));
	}

	function excluir($primary_key)
	{
		return $this->db->delete($primary_key);
	}

	function carregar($where)
	{
		$this->db->limit(1);
		if(is_array($where))
			$this->db->where($where);
		else
			$this->db->where($this->_primary_key,$where);
		
		$query = $this->db->get($this->_table_name);
		
		return $query->first_row();
	}

	function count($where)
	{
		$this->db->limit(1);
		$this->db->where($where);
		$this->db->select('count(1) AS total');
		$query = $this->db->get($this->_table_name);
		
		return $query->row(0)->total;
	}

	function limit($limit,$offset = null)
	{
		$this->db->limit($limit,$offset);
	}

	function listar($where)
	{
		$this->db->where($where);
		$query = $this->db->get($this->_table_name);

		return $query->result();
	}

	function fields($fields)
	{
		$this->db->select($fields);
	}

	function order($order)
	{
		$this->db->order_by($order);
	}

	function join($table_name,$where,$type = 'INNER')
	{
		$this->db->join($table_name,$where,$type);
	}

	function joinModel($model,$foreing_key,$type = 'INNER',$normal = TRUE)
	{
		$this->load->model($model);
		
		if($normal){
			$where = "{$this->{$model}->_table_name}.{$this->{$model}->_primary_key} = {$this->_table_name}.{$foreing_key}";
		} else {
			$where = "{$this->{$model}->_table_name}.{$foreing_key} = {$this->_table_name}.{$this->_primary_key}";
		}
		$this->db->join($this->{$model}->_table_name,$where,$type);
	}

	function group($group)
	{
		$this->db->group_by($group);
	}

	function query($sql)
	{
		$query = $this->db->query($sql);
		if(is_bool($query)) return $query;
		return $query->result();
	}

	function begin_transaction($tables = null){
		$this->db->trans_begin();
		$this->lock($tables);
	}

	function commit(){
		$this->db->trans_commit();
		$this->unlock();
	}

	function rollback(){
		$this->db->trans_rollback();
		$this->unlock();
	}

	function unlock(){
		$this->db->query('UNLOCK TABLES');
	}

	function lock($tables = null){
		if($tables){
			if(is_array($tables)){
				foreach ($tables as &$tb) $tb = "{$tb} WRITE";
				$lock_table = implode(', ', $tables);
			} else {
				$lock_table = "{$tables} WRITE";	
			}
		} else {
			$lock_table = "{$this->_table_name} WRITE";
		}

		$this->db->query("LOCK TABLES {$lock_table}");
	}

	function status_transaction(){
		return $this->db->trans_status();
	}
}

?>
<?php
$config = array(

	//LOGIN DE USUARIO
	'login/index' => array(
		array(
			'field' => 'apelido',
			'label' => 'Login',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'senha',
			'label' => 'Senha',
			'rules' => 'trim|required'
		),
	),

	//UPLOAD DE IMAGEM
	'fotos/upload' => array(
		array(
			'field' => 'loja_id',
			'label' => 'Loja',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'titulo',
			'label' => 'Titulo',
			'rules' => 'trim|required'
		),
	),

	//ATUALIZAR IMAGEM
	'fotos/atualizar' => array(
		array(
			'field' => 'titulo',
			'label' => 'Titulo',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'status',
			'label' => 'Situação',
			'rules' => 'trim|required'
		),
	),

	//RELATORIOS
	'relatorios/participantes' => array(
		array(
			'field' => 'data_inicial',
			'label' => 'Data Inicial',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'data_final',
			'label' => 'Data Final',
			'rules' => 'trim|required'
		),
	),
	'relatorios/vendedores' => array(
		array(
			'field' => 'data_inicial',
			'label' => 'Data Inicial',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'data_final',
			'label' => 'Data Final',
			'rules' => 'trim|required'
		),
	),
	'relatorios/semanal_visita_servico' => array(
		array(
			'field' => 'data_inicial',
			'label' => 'Data Inicial',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'data_final',
			'label' => 'Data Final',
			'rules' => 'trim|required'
		),
	),
	'relatorios/semanal_compra' => array(
		array(
			'field' => 'data_inicial',
			'label' => 'Data Inicial',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'data_final',
			'label' => 'Data Final',
			'rules' => 'trim|required'
		),
	),
	'relatorios/final_compra' => array(
		array(
			'field' => 'data_inicial',
			'label' => 'Data Inicial',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'data_final',
			'label' => 'Data Final',
			'rules' => 'trim|required'
		),
	),
	'relatorios/sorteio_vendedor' => array(
		array(
			'field' => 'data_inicial',
			'label' => 'Data Inicial',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'data_final',
			'label' => 'Data Final',
			'rules' => 'trim|required'
		),
	),

 );
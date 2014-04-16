<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->library('template');

$CI->template->set('title', 'Painel administrativo');
$CI->template->set('description', '');
$CI->template->set('keywords', '');

$CI->template->set('menu_lateral', array(

	'0' => array(
		'titulo' => 'Home',
		'icone' => 'home.png',
		'tipo' => '0',
		'link' => 'wbadmin',
		'sub_menu' => array()
		),

	'1' => array(
		'titulo' => 'Usuários',
		'nome' => 'user',
		'icone' => 'users.png',
		'tipo' => '1',
		'link' => '',
		'sub_menu' => array(

			array('titulo' => 'Adicionar', 'icone' => 'add.png', 'link' => 'wbadmin/usuario/adicionar'),
			array('titulo' => 'Gerenciar', 'icone' => 'manager.png', 'link' => 'wbadmin/usuario/')

			)
		),

	'2' => array(
		'titulo' => 'Notícias',
		'nome' => 'notice',
		'icone' => 'news.png',
		'tipo' => '1',
		'link' => '',
		'sub_menu' => array(

			array('titulo' => 'Adicionar', 'icone' => 'add.png', 'link' => 'wbadmin/noticia/adicionar'),
			array('titulo' => 'Gerenciar', 'icone' => 'manager.png', 'link' => 'wbadmin/noticia/')

			)
		),

	'3' => array(
		'titulo' => 'Páginas',
		'nome' => 'page',
		'icone' => 'pages.png',
		'tipo' => '1',
		'link' => '',
		'sub_menu' => array(

			array('titulo' => 'Adicionar', 'icone' => 'add.png', 'link' => 'wbadmin/pagina/adicionar'),
			array('titulo' => 'Gerenciar', 'icone' => 'manager.png', 'link' => 'wbadmin/pagina/')

			)
		),

	'4' => array(
		'titulo' => 'Banners',
		'nome' => 'banner',
		'icone' => 'icon-gallery.png',
		'tipo' => '1',
		'link' => '',
		'sub_menu' => array(

			array('titulo' => 'Adicionar', 'icone' => 'add.png', 'link' => 'wbadmin/banner/adicionar'),
			array('titulo' => 'Gerenciar', 'icone' => 'manager.png', 'link' => 'wbadmin/banner/')

			)
		)

	
	
	

	));


/* End of file template_sets_helper.php */
/* Location: ./system/helpers/template_sets_helper.php */

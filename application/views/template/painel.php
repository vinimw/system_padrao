<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="robots" content="noindex">
        <title><?php echo $title ?></title>
        <link href="<?php echo base_url('assets/images/favicon.ico'); ?>" rel="shortcut icon" type="image/ico" />
        
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url('assets/js/plugins.js'); ?>"  type="text/javascript"></script>
<script src="http://www.google.com/jsapi"  ></script>
<script src="<?php echo base_url('assets/js/jquery.uniform.min.js'); ?>"  ></script>



<!--[if lt IE 9]>
<link href="<?php echo base_url('assets/css/style-min.css'); ?>" rel="stylesheet" type="text/css" />
<![endif]-->

<link href="<?php echo base_url('assets/css/style-min.css'); ?>" rel="stylesheet" type="text/css" />

<!--<link rel="stylesheet/less" type="text/css" href="<?php echo base_url('assets/css/style.less'); ?>" />
<script src="<?php echo base_url('assets/js/less.js'); ?>"  type="text/javascript"></script>-->
<link rel="stylesheet" href="<?php echo base_url('assets/themes/aristo/css/uniform.aristo.min.css'); ?>" media="screen" />



<script type="text/javascript"  src="<?php echo base_url('assets/js/jquery-ui-1.9.2.custom.js'); ?>"></script>
<script type="text/javascript"  src="<?php echo base_url('assets/js/jquery.maskedinput.min.js'); ?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui-1.9.2.custom.css'); ?>">

<meta name="viewport" content="width=device-width"/>

<script type="text/javascript">

	var WB_setaDown = "<img style='margin-top:3px;' src='<?php echo base_url('assets/images/arrow-down.png');?>' />";
	var WB_setaLeft = "<img src='<?php echo base_url('assets/images/arrow-left.png');?>' />";
	var WB_setaLeft2 = "<img style='margin-top:0px;' src='<?php echo base_url('assets/images/arrow-left.png');?>' />";

</script>
        
    </head>
    <body>

<div class="form-aviso">Preencha todos os campos obrigatórios</div>
<div class="top-logado">
	<div class="top-logo"><img src="<?php echo base_url('assets/images/logo.png');?>"> Honda</div>

	<div class="top-link"></div>
	<a class="top-link" href="<?php echo base_url('logout');?>"><img src="<?php echo base_url('assets/images/logout.png');?>" /></a>
	<a class="top-link no-mobile" href="#"><img src="<?php echo base_url('assets/images/gear.png');?>" /></a>
	
	<div class="top-user no-mobile"><img src="<?php echo base_url('assets/images/user.png');?>"> <?php echo $usuario->apelido ?></div>
</div>

<div class="enquadraAlinha">

<ul class="menu">

	<li><a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/images/home.png'); ?>" /><span>Home</span></a></li>
	
	<?php if(isset($usuario->perfil_id) && $usuario->perfil_id != 3): ?>
	<li class="menu-sub" alt="1">
		<a><img src="<?php echo base_url('assets/images/product.png'); ?>" /><span>Fotos</span> <div class="menu-arrow"><img src="<?php echo base_url('assets/images/arrow-left.png'); ?>"></div></a>
		<ul>
			<li><a href="<?php echo base_url('fotos/upload'); ?>"><img src="<?php echo base_url('assets/images/add.png'); ?>" />Upload</a></li>
			<li><a href="<?php echo base_url('fotos/pendentes'); ?>"><img src="<?php echo base_url('assets/images/manager.png'); ?>" />Pendentes</a></li>
			<li><a href="<?php echo base_url('fotos/aprovadas'); ?>"><img src="<?php echo base_url('assets/images/manager.png'); ?>" />Aprovadas</a></li>
			<li><a href="<?php echo base_url('fotos/reprovadas'); ?>"><img src="<?php echo base_url('assets/images/manager.png'); ?>" />Reprovadas</a></li>
		</ul>
	</li>
	<?php endif; ?>
	
	<li class="menu-sub" alt="1">
		<a><img src="<?php echo base_url('assets/images/pages.png'); ?>" /><span>Relatorios</span> <div class="menu-arrow"><img src="<?php echo base_url('assets/images/arrow-left.png'); ?>"></div></a>
		<ul>
			<li><a href="<?php echo base_url('relatorios/participantes'); ?>">Cad Participantes</a></li>
			<li><a href="<?php echo base_url('relatorios/vendedores'); ?>">Cad Vendedores</a></li>
			<li><a href="<?php echo base_url('relatorios/semanal_visita_servico'); ?>">Sort Visitas e Serviços</a></li>
			<li><a href="<?php echo base_url('relatorios/semanal_compra'); ?>">Sort Compras Semanal</a></li>
			<li><a href="<?php echo base_url('relatorios/final_compra'); ?>">Sort Compras Final</a></li>
			<li><a href="<?php echo base_url('relatorios/sorteio_vendedor'); ?>">Sort Vendedores</a></li>
		</ul>
	</li>
</ul>



<div class="container">
	<?php echo $contents ?>
</div> <!-- container -->




</div>


<!-- jquery Table -->
<script type="text/javascript"  language="javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript"  language="javascript" src="<?php echo base_url('assets/js/table-managed.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/acoes.js'); ?>"  type="text/javascript"></script>

	<?php $mensagem = $this->session->flashdata('msg') ?>
	<?php $mensagem = isset($validation)?$validation:$mensagem ?>

<?php if($mensagem != '') { ?>	 
<script type="text/javascript">

$(document).ready(function(e) {

	var tempoModal = 2000;
	$(".form-aviso").html("<?php echo preg_replace('/[\r\n]+/', "", $mensagem) ?>");
	$(".form-aviso").animate({top: 0}, 500 );
	tempo = setTimeout ("someModal()", tempoModal);


});

</script>
<?php }?>
	 
    </body>
</html>
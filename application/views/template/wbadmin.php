<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>

<?php

$VER_userid 	= $this->session->userdata('USER_ID');
$VER_username 	= $this->session->userdata('USER_NAME');
$VER_useremail 	= $this->session->userdata('USER_EMAIL');
$VER_usertipo 	= $this->session->userdata('USER_TIPO');

if( ($VER_userid == FALSE) and ($VER_username == FALSE) and ($VER_useremail == FALSE) and ($VER_usertipo == FALSE)  ){

	redirect('wbadmin/login'); die();
}

?>

<link href="<?php echo base_url('assets/images/favicon.ico'); ?>" rel="shortcut icon" type="image/ico" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url('assets/js/plugins.js'); ?>" type="text/javascript"></script>
<script src="http://www.google.com/jsapi" ></script>
<script src="<?php echo base_url('assets/js/jquery.uniform.min.js'); ?>" ></script>

<!--[if lt IE 9]>
<link href="css/style-min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link rel="stylesheet/less" type="text/css" href="<?php echo base_url('assets/css/style.less'); ?>" />
<script src="<?php echo base_url('assets/js/less.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/themes/aristo/css/uniform.aristo.min.css'); ?>" media="screen" />



<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui-1.8.20.custom.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.maskedinput.min.js'); ?>"></script>
<!-- ckeditor -->
<script type="text/javascript" src="<?php echo base_url('assets/ck/ckeditor.js'); ?>"></script>

<!-- progresso -->
<script type="text/javascript" src="<?php echo base_url('assets/js/progress_bar.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/acoes.js'); ?>"></script>

<!-- datepicker -->
<link href="<?php echo base_url('assets/css/jquery.ui.datepicker.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('assets/js/jquery.ui.datepicker.js'); ?>"  ></script>

<!-- jquery Table -->
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/table-managed.min.js'); ?>"></script>

<meta name="viewport" content="width=device-width"/>

<script type="text/javascript">

  var WB_setaDown = "<img style='margin-top:3px;' src='<?php echo base_url('assets/images/arrow-down.png'); ?>' />";
  var WB_setaLeft = "<img src='<?php echo base_url('assets/images/arrow-left.png'); ?>' />";
  var WB_setaLeft2 = "<img style='margin-top:0px;' src='<?php echo base_url('assets/images/arrow-left.png'); ?>' />";

</script>

        
    </head>
    <body>

<div class="form-aviso">Preencha todos os campos obrigatórios</div>
<div class="top-logado">
	<div class="top-logo"><img src="<?php echo base_url('assets/images/logo.png'); ?>"> <?php echo NAME_CLIENT; ?></div>

	<div class="top-link"></div>
	<a class="top-link" href="<?php echo base_url('wbadmin/sair'); ?>"><img src="<?php echo base_url('assets/images/logout.png'); ?>" /></a>
	<a class="top-link no-mobile" href="#"><img src="<?php echo base_url('assets/images/gear.png'); ?>" /></a>

	<div class="top-user no-mobile"><img src="<?php echo base_url('assets/images/user.png'); ?>"> <?php echo $this->session->userdata('USER_NAME'); ?></div>
</div>  


<div class="enquadraAlinha">
	<ul class="menu">
		<?php
	
	foreach ($menu_lateral as $menuSeta) {
		
		if($menuSeta['tipo'] == 1){
			if($navigator == $menuSeta['nome']){
				echo '<li class="menu-sub" alt="1">';
			}else{
				echo '<li class="menu-sub" alt="0">';	
			}
			echo '<a><img src="'.base_url('assets/images/'.$menuSeta['icone']).'" /><span>'.$menuSeta['titulo'].'</span><div class="menu-arrow"><img src="'.base_url('assets/images/arrow-left.png').'"></div></a>';
		}else{
			echo '<li><a href="'.base_url($menuSeta['link']).'"><img src="'.base_url('assets/images/'.$menuSeta['icone']).'" /><span>'.$menuSeta['titulo'].'</span></a></li>';
		}
		
		if($menuSeta['tipo'] == 1){
			//array do submenu
			echo '<ul>';
			foreach ($menuSeta['sub_menu'] as $sub_menu) {
				echo '<li><a href="'.base_url($sub_menu['link']).'">';
				if($sub_menu['icone']){
					echo '<img src="'.base_url('assets/images/'.$sub_menu['icone']).'" />';
				}
				echo $sub_menu['titulo'].'</a></li>';
			}
			echo '</ul>';
		}
		echo '</li>';
	}

?>
	</ul>

<div class="container">


	<?php echo $contents ?>
</div> <!-- container -->




</div>



<?php if(($this->session->userdata('Mensagem'))){
  
 ?>
<script type="text/javascript">



$(document).ready(function(e) {




  var tempoModal = 2000;
  $(".form-aviso").html("<?php echo $this->session->userdata('Mensagem'); ?>");
  $(".form-aviso").animate({top: 0}, 500 );
  tempo = setTimeout ("someModal()", tempoModal);


});

</script>



<?php  $this->session->unset_userdata('Mensagem'); } ?>
	 
    </body>
</html>
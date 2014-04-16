<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="robots" content="noindex">
        <title><?php echo $title ?></title>
        <link href="<?php echo base_url('assets/images/favicon.ico'); ?>" rel="shortcut icon" type="image/ico" />
        <meta name="description" content="<?php echo $description ?>" />
        <meta name="keywords" content="<?php echo $keywords ?>" />
        
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url('assets/js/plugins.js'); ?>"  type="text/javascript"></script>
<script src="http://www.google.com/jsapi"  ></script>
<script src="<?php echo base_url('assets/js/jquery.uniform.min.js'); ?>"  ></script>

<!--[if lt IE 9]>
<link href="<?php echo base_url('assets/css/style-min.css'); ?>" rel="stylesheet" type="text/css" />
<![endif]-->

<link rel="stylesheet/less" type="text/css" href="<?php echo base_url('assets/css/style.less'); ?>" />
<script src="<?php echo base_url('assets/js/less.js'); ?>"  type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/themes/aristo/css/uniform.aristo.min.css'); ?>" media="screen" />


<script type="text/javascript"  src="<?php echo base_url('assets/js/jquery-ui-1.8.20.custom.min.js'); ?>"></script>
<script type="text/javascript"  src="<?php echo base_url('assets/js/jquery.maskedinput.min.js'); ?>"></script>


<meta name="viewport" content="width=device-width"/>

<script type="text/javascript">

	var WB_setaDown = "<img style='margin-top:3px;' src='images/arrow-down.png' />";
	var WB_setaLeft = "<img src='images/arrow-left.png' />";
	var WB_setaLeft2 = "<img style='margin-top:0px;' src='images/arrow-left.png' />";

</script>
        
    </head>
    <body  class="bg-home">

<div class="form-aviso">Preencha todos os campos obrigatórios</div>

<?php echo $contents ?>


<script src="<?php echo base_url('assets/js/acoes.js'); ?>"  type="text/javascript"></script>
	 
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
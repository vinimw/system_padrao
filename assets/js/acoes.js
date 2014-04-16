// JavaScript Document
$(document).ready(function(e) {

	// oTable = $('#example').dataTable({
 //        "bJQueryUI": true,
 //        "sPaginationType": "full_numbers"
 //    });

   $(".dateVal").mask("99/99/9999");
   $(".telVal").mask("(99) 99999-999?9");
   $(".cpfVal").mask("999.999.999-99");

	/*========= NiceScroll ========= */
          // var seq = 0;
          //   $("body").niceScroll({
          //     styler:"fb",cursorcolor:"#000",
          //     cursoropacitymin: 1,
          //     cursorcolor:"#333", 
          //     autohidemode: false,
          //     cursorwidth: 10,
          //     cursorborderradius: 100,
          //     railpadding: { top: 0, right: 0, left: 0, bottom: 0 },
          //     background: "#f2f2f2",
          //     zindex: 999,
          //     sensitiverail: true,
          //     scrollspeed: 100


          //   });

    $(".input-radio, .input-file, .input-check").uniform();

    //acoes para menu
    var GB_tamanhoDocumento 		= WB_tamanhoTipo(1);
	var GB_tamanhoMenu 				= WB_tamanhoTipo(2);
	var GB_tamanhoheight 			= WB_tamanhoTipo(3) - 84;
	var GB_tamanhoConteudoH			= WB_tamanhoTipo(4);
	
	
	if(GB_tamanhoConteudoH < GB_tamanhoheight){

		$(".container").css('min-height', GB_tamanhoheight);
	}

	
	if(GB_tamanhoDocumento < 939){
		$(".menu li ul").css('left', GB_tamanhoMenu);
		
	}

	if(GB_tamanhoDocumento > 938){
		$(".menu li ul").css('left', 0);
		$(".menu-sub[alt=1]").children("ul").fadeIn(50);
		$(".menu-sub[alt=1]").addClass("menu-select");
		$(".menu-sub[alt=1]").find(".menu-arrow").html(WB_setaDown);
	}


//	alert($(window).width());
   
	
	// define menu
	var tamanhoTop = $(".top-logado").height() + 3;
	var tamanhoCont = $(".container").height();
	var tamanhoMenu = $(".menu").width() - 0;
	var tamanhoWidth = $(window).width() - tamanhoMenu;
	var tamanhoHeight = $(window).height() - tamanhoTop;
	
	
	
	//validacao form
	
	


});

$(function() {
	 $(".menu .menu-sub").on('click', function() {
		var sub = $(this).attr("alt");
		
		if(sub == 0){
			$(".menu-select").children("ul").slideToggle(200);
			$(".menu-select").attr("alt","0");
			$(".menu-select").find(".menu-arrow").html(WB_setaLeft);
			$(".menu-select").removeClass("menu-select");
			
			
			$(this).attr("alt","1");
			$(this).children("ul").slideToggle(200);
			$(this).addClass("menu-select");
			$(this).find(".menu-arrow").html(WB_setaDown);
		}
		
		if(sub == 1){
			$(this).attr("alt","0");
			$(this).children("ul").slideToggle(200);
			$(this).removeClass("menu-select");
			$(this).find(".menu-arrow").html(WB_setaLeft);
		}
    });


	$( ".datepicker" ).datepicker({

		dateFormat: 'dd/mm/yy',
	    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
	    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
	    nextText: 'Próximo',
	    prevText: 'Anterior'

	});
});

function someModal(){  

	$(".form-aviso").animate({top: "-130px"}, 300 );
	
}

function validar(formulario){

	var tempoModal = 1500;
	
	var cont = 0;
	$(".required").each(function(){
		if($(this).val() == ""){
			cont = 1;
		}
	});
	
	if(cont != 0){
		$(".form-aviso").html('Preencha todos os campos obrigatórios');	
		$(".form-aviso").animate({top: 0}, 300 );
		tempo = setTimeout ("someModal()", tempoModal);
		return false;
	}else{
		return true;
	}
    

}

$(window).resize(function(e) {
	
	var GB_tamanhoDocumento 		= WB_tamanhoTipo(1);
	var GB_tamanhoMenu 				= WB_tamanhoTipo(2);
	var GB_tamanhoheight 			= WB_tamanhoTipo(3) - 83;
	var GB_tamanhoConteudoH			= WB_tamanhoTipo(4);
	
	if(GB_tamanhoDocumento < 939){
		$(".menu li ul").css('left', GB_tamanhoMenu);
		$(".menu-sub[alt=1]").children("ul").slideToggle(0);
		$(".menu-sub[alt=1]").children("ul").fadeOut(0);
		$(".menu-sub[alt=1]").removeClass("menu-select");
		$(".menu-sub[alt=1]").find(".menu-arrow").html(WB_setaLeft2);
		$(".menu-sub[alt=1]").attr('alt', 0);
	}

	//tamanho normal
	if(GB_tamanhoDocumento > 938){
		$(".menu li ul").css('left', 0);
		$(".menu-sub[alt=1]").children("ul").fadeIn(50);
		$(".menu-sub[alt=1]").addClass("menu-select");
		$(".menu-sub[alt=1]").find(".menu-arrow").html(WB_setaDown);
	}


	if(GB_tamanhoConteudoH < GB_tamanhoheight){

		$(".container").css('min-height', GB_tamanhoheight);
	}else{

		$(".container").css('min-height', GB_tamanhoConteudoH);
	}

	

   
});

function WB_tamanhoTipo(tipo){

	if(tipo == 1){
		return($(document).width());
	}
	if(tipo == 2){
		return($(".menu").width());

	}

	if(tipo == 3){
		return($(window).height());

	}

	if(tipo == 4){
		return($(".enquadraAlinhascroll").height());

	}

	if(tipo == 5){
		return($(".menu").height());

	}
	
	
}

function WB_tamanhoTela(){


	alert($(document).width());
	
	
}
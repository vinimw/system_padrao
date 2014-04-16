$(document).ready(function() {


var valorEstadoCom =  $("select[name=estado]").val();


     $("select[name=estado]").change(function(){
            
            $("select[name=cidade]").html('<option value="">Carregando...</option>');
            $("select[name=loja_id]").html('<option value="">Selecione a cidade</option>');
            // Exibimos no campo marca antes de selecionamos a marca, serve também em caso
            // do usuario ja ter selecionado o tipo e resolveu trocar, com isso limpamos a
            // seleção antiga caso tenha feito.
            
            // Passando tipo por parametro para a pagina ajax-marca.php
            var valorSel = $(this).val();
            
            $.get( baseUrl+"lojas/listar_cidades/"+valorSel+' ', function( data ) {
            
				$("select[name=cidade]").html(data);
			});

            

});


     $("select[name=cidade]").change(function(){
            
            $("select[name=loja_id]").html('<option value="">Carregando...</option>');

            var valorEstado = $("select[name=estado]").val();
            
            // Exibimos no campo marca antes de selecionamos a marca, serve também em caso
            // do usuario ja ter selecionado o tipo e resolveu trocar, com isso limpamos a
            // seleção antiga caso tenha feito.
            
            // Passando tipo por parametro para a pagina ajax-marca.php
            var valorSel = $(this).val();
            
            $.get( baseUrl+'lojas/listar_lojas/'+valorEstado+'/'+valorSel+' ', function( data ) {
            
				$("select[name=loja_id]").html(data);
			});

            

});
     
});
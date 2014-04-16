$(function() {
    $(document).on('click','a.bt_status',function() {
        var bt_status = $(this);
        $.ajax({
            url: bt_status.attr('href'),
            success: function(retorno) {
            	if(retorno)
                	alert(retorno);
                else	
                	bt_status.parents('div.gallery-image').remove();
            },
            error: function() {
                alert("Erro!");
            }
        });

        return false;
    });

    fotos_ajax($("#bt_atualizar"));

    $("#bt_atualizar").click(function(){
		fotos_ajax($("#bt_atualizar"));    	
    });

    function fotos_ajax(bt_element){
    	var content 	= $("#ajax");
    	var bt_element 	= $(bt_element);

    	$.ajax({
            url: bt_element.attr('href'),
            success: function(retorno) {
            	content.html(retorno);
            },
            error: function() {
                alert("Erro!");
            }
        });
    }
});



$(document).ready(function() {
	$('.debito').hide();
	$('.credito').hide();
	$('.efectivo').hide();
   
   $('.radio input').on('change',function(){
		//alert($('input[name=metodoPago]:checked','.radio').val());
		
		if(document.getElementById('Debito').checked){
		   	$('.debito').show();
		   	$('.credito').hide();
			$('.efectivo').hide();
		}

	    if(document.getElementById('Credito').checked){
	   		$('.debito').hide();
		   	$('.credito').show();
			$('.efectivo').hide();
	    }

	    if(document.getElementById('DepTransf').checked){
	   		$('.debito').hide();
		   	$('.credito').hide();
			$('.efectivo').show();
	    }
	});	
});
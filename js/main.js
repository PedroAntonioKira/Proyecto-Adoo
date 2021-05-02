$(document).ready(function(){
	//alert('funciono')

	var imgItems=$('.slider li').length;
	var imgPOS=1;
	//console.log(imgItems);

	for(i=1;i<=imgItems;i++){
		$('.pagination').append('<li><span class="fa fa-circle"></span></li>');
	}
	$('.slider li').hide();//ocultamos todas los li pertenencientes a la clase slider
	$('.slider li:first').show();//mostramo el primer elemento li de la clase slider
	$('.pagination li:first').css({'color':'#007580'});//le da color a los iconos de circulo


	//Ejecucion de funciones
	$('.pagination li').click(pagination);
	$('.right span').click(nextSlider);
	$('.left span').click(prevSlider);

	setInterval(function(){
		nextSlider();
	},4000);

	//Funciones

	function pagination(){
		var paginationPOS=$(this).index()+1;

		$('.slider li').hide();
		$('.slider li:nth-child('+ paginationPOS + ')').fadeIn();
		$('.pagination li').css({'color':'#536162'});
		$(this).css({'color':'#007580'});
	}

	function nextSlider(){
		if(imgPOS>=imgItems){imgPOS=1;}
		else{imgPOS++;}
		//console.log(imgPOS);

		$('.slider li').hide();
		$('.slider li:nth-child('+imgPOS+')').fadeIn();
		$('.pagination li').css({'color':'#536162'});
		$('.pagination li:nth-child('+imgPOS+')').css({'color':'#007580'});
	}

	function prevSlider(){
		if(imgPOS<=1){
			imgPOS=imgItems;
		}
		else{
			imgPOS--;
		}
		//console.log(imgPOS);

		$('.slider li').hide();
		$('.slider li:nth-child('+imgPOS+')').fadeIn();
		$('.pagination li').css({'color':'#536162'});
		$('.pagination li:nth-child('+imgPOS+')').css({'color':'#007580'});
	}

});

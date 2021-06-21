var aux1=0;
var aux2=1;
function agregarmetodo(){
	var prueba = document.getElementById("caja" + aux1);
	prueba.innerHTML =  
		"<label>Metodo de pago"+ aux2 +"</label>"+
		"<br>"+
  "<label>Nombre del titular</label><br>"+
  "<input type='text' name='Nombre"    + aux2 + "' class='formulario_input' id='Nombre"    + aux2 +"' value='<?php echo $_SESSION['nombre'] ?>'>"+
  "<input type='text' name='ApellidoP" + aux2 + "' class='formulario_input' id='ApellidoP" + aux2 +"' value='<?php echo $_SESSION['apellidop'] ?>'>"+
  "<input type='text' name='ApellidoM" + aux2 + "' class='formulario_input' id='ApellidoM" + aux2 +"' value='<?php echo $_SESSION['apellidom'] ?>'>"+

  "<label>Numero de Tarjeta</label><br>"
  "<input type='text' name='tipo "       + aux2 + "' class='formulario_input' id='tipo "       + aux2 + "' placeholder='Debito/Credito'>"
  "<input type='text' name='num_tarjeta" + aux2 + "' class='formulario_input' id='num_tarjeta" + aux2 + "' placeholder='XXXX-XXXX-XXXX-XXXX'>"
  "<input type='text' name='fecha_exp"   + aux2 + "' class='formulario_input' id='fecha_exp"   + aux2 + "' placeholder='MM/AA'>"
  "<input type='text' name='cvc"         + aux2 + "' class='formulario_input' id='cvc"         + aux2 + "' placeholder='XXX'>"
  "<input type='text' name='correo"      + aux2 + "' class='formulario_input' id='correo"      + aux2 + "' placeholder='correo@dominio.com'><br>"+
  "<button class='agregar' onclick='agregarmetodo()' style='background-color:rgb(51, 122, 255); border-radius: 5px; color:white; width: 200px; right: 80px; font-family: 'calibri';''><i class='fas fa-plus'></i> Agregar punto de entrega</button>"+
  "<div id='caja" + aux2 + "'></div>";
	                    
	// $(document).ready(function(){
	// 	recargarform();
	// });
	
	if (aux1<=1) {
		aux1++;
		aux2++;
	}
}
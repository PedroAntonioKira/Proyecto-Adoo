<?php 
	
	$conexion=mysqli_connect('localhost','root','','ceg');
	
	$trans=$_POST['trans'];

	$sql="SELECT id,
			 id_tipotrans,
			 linea_ESC 
		from punto_e 
		where id_tipotrans='$trans'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>Lineas/Intitucion</label><br> 
			<select id='lista2' name='list2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>
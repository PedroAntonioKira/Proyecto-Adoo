<?php 
$conexion=mysqli_connect('localhost','root','','ceg');
$continente=$_POST['continente'];

	$sql="SELECT id,
			 id_tipotrans,
			 linea_ESC 
		from punto_e 
		where id_tipotrans='$transporte'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>SELECT 2 (paises)</label> 
			<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>
<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}

	$nombre=$_SESSION['nombre'];
	
	$cantidad=$_COOKIE['cantidad'];
	$carrito=$_COOKIE['carrito'];
	$id=$_COOKIE['vendedor'];
	

	 $jsoncar=json_decode($carrito);
	 $jsoncan=json_decode($cantidad);


?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	    <title>Cuenta | Registro</title>
		<meta charset="utf-8">

		<!--Estilos del formulario-->
		<link rel="stylesheet" href="../css/formMultiStep.css">
		<link rel="stylesheet" href="../css/formularioRegistro.css">

		<script src="../js/jquery-3.6.0.js"></script>
		<script src="../js/main.js"></script>

		<!-- HEADER AND FOOTER -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
		<link rel="stylesheet" href="../css/navbar.css">
	</head>
<body>
<?php
    if($_SESSION == NULL){
        header('location:./login.php'); 
        //require '../assets/navs/headerBase.php';
    }
    elseif($_SESSION['privilegio'] == 'Comprador'){
        require '../assets/navs/headerComprador.php';
    }
?>
	<main class="contenedor">
		<div class="prin">
			<div style="float:left;" class="formregister">
		    <h4>Datos del comprador o de quien recibe</h4>
		    <input type="text" class="formulario__input1" value="<?php echo $_SESSION['nombre']?>">
	    	<input type="text" class="formulario__input1" value="<?php echo $_SESSION['apellidop']?>">
	    	<input type="text" class="formulario__input1" value="<?php echo $_SESSION['apellidom']?>">
		    <br>
		    <h5>Comentarios para la compra</h5>
		    <textarea class="formulario__input2" name="comentarios" rows="4" cols="30" placeholder="Aqui introduzca el lugar y/o la referencias del punto de encuentro, o algun comentario"></textarea>
		    <br>
		    <button class="controls" style="background:#007580; width:50%; margin-left: 80px; margin-top: 10px; background:#2E86C1:hover;" role="link" onclick="window.location='index.php'" >Cancelar</button>
	    </div>
	         
	    <div style="float:right;"; class="formregister">
	     	<h4>Resumen del pedido</h4> 

	     	<?php 
		
				// CONSULTA ANTERIOR 
				// SELECT producto.id, producto.nombre, descripcion.precio, descripcion.imagen1 
				// FROM `producto`, descripcion WHERE producto.descripcion_id = descripcion.id ORDER BY producto.id DESC LIMIT 0, 12;
					
				for ($i=0; $i < count($jsoncan) ; $i++){

					$idprod=$jsoncan[$i]->id;



				$comprobar = "SELECT imagen1,descripcion.precio,vendedor_id FROM catalogodeproductos inner join producto on producto.id=catalogodeproductos.producto_id inner JOIN descripcion on descripcion.id=producto.descripcion_id WHERE vendedor_id=$id AND producto_id = $idprod";
				$ejecutar = $con->query($comprobar);
			
				if($datos = $ejecutar->fetch_assoc())
				{ 
					
					//echo "fetch ".$idprod."<br>dato  ".$datos['vendedor_id'];

					for ($j=0; $j < count($jsoncar) ; $j++) { 
						// code...
					
					
						if($idprod==$jsoncar[$j]->id)
						{
							//echo "entre".$idprod;

							$jsoncar[$j]->cantidad=$jsoncan[$i]->cantidad;

							 $carro=json_encode($jsoncar);
							
							

	
				 ?>

	     	<img src="../img/imagenesProductos/<?php echo $datos['imagen1'] ?>" width="100" height="100"><br>
	      <FONT SIZE=3>Nombre del producto:&nbsp</FONT>
	      <FONT SIZE=1><?php echo $jsoncar[$j]->nombre; ?></FONT><br>
	      <FONT SIZE=3>Cantidad: &nbsp</FONT>
	      <FONT SIZE=1><?php echo $jsoncar[$j]->cantidad; ?></FONT><br>
	      <FONT SIZE=3>Precio: &nbsp</FONT>
	      <FONT SIZE=1><?php echo $datos['precio']; ?></FONT><br>
	      <FONT SIZE=3>Total: &nbsp </FONT>
	      <FONT SIZE=1><?php echo $datos['precio']*$jsoncan[$i]->cantidad; ?> </FONT><br> <?php 	} } } } ?>
	      <form action="inserciondecompra.php" method="post">
	      	<input type="hidden" name="carrito" value='<?php echo $carro ?>'>
	      	<input type="hidden" name="idv" value='<?php echo $id ?>'>
	      	      <button type="submit" class="controls" style="background:#007580; width:50%; margin-left: 80px; margin-top: 10px; background:#2E86C1:hover;" >Pagar</button></form>
  	</div>
	</main>
	
	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/menuPrincipal01.js"></script>

  <?php require '../assets/navs/footer.php'; ?>
</body>
	
</html>

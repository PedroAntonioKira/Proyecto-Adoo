<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	    <title>Cuenta | Registro</title>
		<meta charset="utf-8">

		<!--Estilos del formulario-->
		<link rel="stylesheet" href="../css/formMultiStep.css">

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
			require '../assets/navs/headerBase.php';

		}elseif($_SESSION['privilegio'] == 'Comprador'){
			require '../assets/navs/headerComprador.php';

		}elseif($_SESSION['privilegio'] == 'Vendedor'){
			require '../assets/navs/headerVendedor.php';
		}
	?>

	<main class="contenedor">
		<div class="prin">
			<div style="float:left;"; class="formregister">
	      <h4>Datos del comprador o de quien recibe</h4>
	      <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre">
	      <input class="controls" type="text" name="apellidoPat" id="apellidoPat" placeholder="Ingrese su Apellido Paterno">
				<input class="controls" type="text" name="apellidoMat" id="apellidoMat" placeholder="Ingrese su Apellido Materno">
	      <input class="controls" type="tel" name="tel" id="tel" placeholder="Ingrese su teléfono">
	      <textarea class="controls" name="comentarios" rows="5" cols="50" placeholder="Aqui introduzca el lugar y/o la referencias del punto de encuentro" ></textarea>
	      <a class="controls" href="../index.php" style="color: #fff; text-decoration:none; padding: 5px 138px 5px 138px; color:#000:hover;">Cancelar</a>
	    </div>
	         
	    <div style="float:right;"; class="formregister">
	     	<h4>Resumen del pedido</h4> 
	     	<img src="../img/computadora-galeria01.jpeg" width="200" height="150">
	      <h5>Nombre del producto</h5>
	      <h5>Cantidad</h5>
	      <h5>Precio</h5>
	      <h4>Total</h4>
	      <a class="controls" href="pagartotal.html" style="color: #fff; text-decoration:none; padding: 5px 100px 5px 100px; color:#000:hover;">Realizar Compra</a>
	    </div>
  	</div>
	</main>
	
	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/menuPrincipal01.js"></script>

  <?php require '../assets/navs/footer.php'; ?>
</body>
	
</html>

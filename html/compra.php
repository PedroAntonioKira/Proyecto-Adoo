<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}

	$nombre=$_SESSION['nombre'];
	//print_r($_SESSION);
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
			    <input type="text" class="formulario__input1" value="<?php echo "Nombre"//$_SESSION['nombre']?>">
		    	<input type="text" class="formulario__input1" value="<?php echo "ApellidoP"//$_SESSION['apellidop']?>">
		    	<input type="text" class="formulario__input1" value="<?php echo "ApellidoM"//$_SESSION['apellidom']?>">
			    <br>
			    <h5 style="color:#007580;">Comentarios para la compra</h5>
			    <textarea class="formulario__input2" name="comentarios" rows="4" cols="30" placeholder="Aqui introduzca el lugar y/o la referencias del punto de encuentro, o algun comentario"></textarea>
			    <br>
			    <button class="controls" style="background:#007580; width:50%; margin-left: 80px; margin-top: 10px; background:#2E86C1:hover;" role="link" onclick="window.location='index.php'" >Cancelar</button>
	    	</div>
	         
		    <div style="float:right;"; class="formregister">
		    	<h4>Resumen del pedido</h4> 
		     	<img src="../img/<?php echo "compu_prueba.png"//$img ?>" width="200" height="150">
				<h5 >Nombre del producto</h5>
				<?php echo "Nombre del producto"//$nombre_producto ?>
				<h5>Cantidad</h5>
				<?php echo "Cant"//$nombre_producto ?>
				<h5>Precio</h5>
				<?php echo "$$$"//$precio ?>
				<h4>Total</h4>
				<?php echo "<p>$$$</p>"//$Total?>
				<button class="controls" style="background:#007580; width:50%; margin-left: 80px; margin-top: 10px; background:#2E86C1:hover;" role="link" onclick="window.location='pagartotal.php'" >Pagar</button>
	  		</div>
	  	</div>
	</main>
	
	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/menuPrincipal01.js"></script>

  <?php require '../assets/navs/footer.php'; ?>
</body>
	
</html>

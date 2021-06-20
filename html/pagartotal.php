<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}

	$nombre=$_SESSION['nombre'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	    <title>Pagar compra</title>
		<meta charset="utf-8">

		<!--Estilos del formulario-->
		<link rel="stylesheet" href="../css/formMultiStep.css">
		<link rel="stylesheet" href="../css/formularioRegistro.css">

		<script src="../js/jquery-3.6.0.js"></script>
		<script src="../js/main.js"></script>

		<!--Estilos del menu superior-->
		<!-- <link rel="stylesheet" href="../css/menuPrincipal01.css"> -->
		<!-- <link rel="stylesheet" href="../css/Cuerpo01.css"> -->

		<!--Estilos del slider-->
		<link rel="stylesheet" href="../css/all.min.css">
		<link rel="stylesheet" href="../css/recompra.css">

		<script src="../js/jquery-3.6.0.js"></script>
		<script src="../js/main.js"></script>
		<script src="../js/habilitarPagarTotal.js"></script>

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
		<div id=prin>

			<div class="" style="border: solid; width:600px; height: 600px; border-radius:25px; border-color:#007580; margin:30px;">
        <form action="" class="" style="margin-left: 50px;">
          <h4>Metodos de pago</h4>
	        <div class="radio">
		      	<input type="radio" id="Debito" name="metodoPago" value="debito" class="icono">
		  			<label for="Debito"><i class="fas fa-circle" style="margin-right: 10px; color:#007580; size:3px;"></i>Tarjeta de debito</label><br>
		  			<br>
		  			<div class="debito">
				  		<input class="formulario_input2" type="text" name="TitularD" id="Titular" placeholder="Titular de la Tarjeta">
				  		<input class="formulario_input2" type="text" name="instBancariaD" id="instBancaria" placeholder="Institución Bancaria">
				      <input class="formulario_input2" type="text" name="numTarjetaD" id="numTarjeta" placeholder="Numero de Tarjeta">
							<input class="formulario_input2" type="text" name="fechaExpiracionD" id="fechaExpiracion" placeholder="Fecha de expiracion">
				      <input class="formulario_input2" type="tel" name="CVV" id="CVVD" placeholder="CVV">
		  			</div>

		  			<input type="radio" id="Credito" name="metodoPago" value="credito" class="icono">
		  			<label for="Credito"><i class="fas fa-circle" style="margin-right: 10px; color:#007580; size:3px;"></i>Tarjeta de credito</label><br>
		  			<br>
		  			<div class="credito">
				  		<input class="formulario_input2" type="text" name="TitularC" id="Titular" placeholder="Titular de la Tarjeta">
				  		<input class="formulario__input" type="text" name="instBancariaC" id="instBancaria" placeholder="Institución Bancaria">
				      <input class="formulario_input2" type="text" name="numTarjetaC" id="numTarjeta" placeholder="Numero de Tarjeta">
							<input class="formulario__input" type="text" name="fechaExpiracionC" id="fechaExpiracion" placeholder="Fecha de expiracion">
				      <input class="formulario_input2" type="tel" name="CVV" id="CVVC" placeholder="CVV">
		  			</div>
		  			
		  			<input type="radio" id="DepTransf" name="metodoPago" value="DepositoTransferencia" class="icono">
		  			<label for="DepTransf"><i class="fas fa-circle" style="margin-right: 10px; color:#007580; size:3px;"></i>Deposito o transferencia</label><br>
			  		<br>
			  		<div class="efectivo">
			  			<label id="efectivo" name="efectivo"  >
				  			<h1 style="color:#1F618D;">Compu Electro Guys</h1>
				  			<h2>CLABE INTERBANCARIA:
				  			<br>XXXXXXXXXXXXXX</h2>
				  			<h2>CUENTA BANCARIA:<br>XXXX-XXXX-XXXXX-XXXX</h2>
				  			<br>
				  		</label>
	  				</div>
	  			</div>
  				<a class="formulario__input" href="compra.php" style="color: #fff; text-decoration:none; padding: 5px 138px 5px 138px; color:#000:hover;">Cancelar</a>
      	</form>
    	</div>
         
	    <div class="" style="border: solid; width:600px; height: 600px; border-radius:25px; border-color:#007580; margin-top:100px float:left; margin-left: 900px;">
	      <h4>Resumen del pedido</h4> 
	      <img src="../img/computadora-galeria01.jpeg" width="200" height="150">
	      <h4>Nombre del producto</h4>
	      <h4>Cantidad</h4>
	      <h4>Precio</h4>
	      <h3>Total</h3>
	      <br>
	      <a class="controls" href="compraexitosa.html" style="color: #fff; text-decoration:none; padding: 5px 120px 5px 120px; color:#000:hover;">Realizar Pago</a>
	    </div>
  	</div>
	</main>
	
	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/menuPrincipal01.js"></script>

  <?php require '../assets/navs/footer.php'; ?>
	</body>
	
</html>
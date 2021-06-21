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
		<div class="prin">
			<div style="float:left;" class="formregister">
			    <!-- <h4>Datos del comprador o de quien recibe</h4>
			    <input type="text" class="formulario__input1" value="<?php echo "Nombre"//$_SESSION['nombre']?>">
		    	<input type="text" class="formulario__input1" value="<?php echo "ApellidoP"//$_SESSION['apellidop']?>">
		    	<input type="text" class="formulario__input1" value="<?php echo "ApellidoM"//$_SESSION['apellidom']?>">
			    <br>
			    <h5 style="color:#007580;">Comentarios para la compra</h5>
			    <textarea class="formulario__input2" name="comentarios" rows="4" cols="30" placeholder="Aqui introduzca el lugar y/o la referencias del punto de encuentro, o algun comentario"></textarea>
			    <br>
			    <button class="controls" style="background:#007580; width:50%; margin-left: 80px; margin-top: 10px; background:#2E86C1:hover;" role="link" onclick="window.location='index.php'" >Cancelar</button> -->
			    <!-- <form action="" class="" style="margin-left: 30px; border-radius: 20px;"> -->
			    	<h5 style="color:#007580">Metodos de pago</h5>
			    	
				 		<?php
				 		$id_comprador=$_SESSION['id_comprador'];

				 			$aux1="SELECT infotarjeta.id,infotarjeta.num,infotarjeta.exp FROM infotarjeta INNER JOIN infobancaria ON infobancaria.infotarjeta_id=infotarjeta.id INNER JOIN info ON infobancaria.info_id=info.id INNER JOIN comprador ON comprador.info_id=info.id WHERE comprador.id=$id_comprador";
				 			$ejecutar= $con->query($aux1);
				 			echo "<select class='form-control'>";
							while($resul= $ejecutar->fetch_assoc()){
								
								if ($resul!=NULL) {
									$id_tar=$resul['id'];
									$num_tar=$resul['num'];
									$exp_tar=$resul['exp'];
									
									
									echo"<option value='$id_tar'>Tarjeta: $num_tar</option>";	

									}
									
							}
							echo "</select>";

				 		 ?>
			    	<div class="radio">
			    		<br>
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
					  		<input class="formulario_input2" type="text" name="instBancariaC" id="instBancaria" placeholder="Institución Bancaria">
					      	<input class="formulario_input2" type="text" name="numTarjetaC" id="numTarjeta" placeholder="Numero de Tarjeta">
							<input class="formulario_input2" type="text" name="fechaExpiracionC" id="fechaExpiracion" placeholder="Fecha de expiracion">
					      	<input class="formulario_input2" type="tel" name="CVV" id="CVVC" placeholder="CVV">
						</div>
						
						<input type="radio" id="DepTransf" name="metodoPago" value="DepositoTransferencia" class="icono">
						<label for="DepTransf"><i class="fas fa-circle" style="margin-right: 10px; color:#007580; size:3px;"></i>Deposito o transferencia</label><br>
			  			<br>
			  			<div class="efectivo">
				  			<label id="efectivo" name="efectivo"  >
					  			<h1 style="color:rgb(0 117 128);">Compu Electro Guys</h1>
					  			<h2>CLABE INTERBANCARIA:
					  			<br>XXXXXXXXXXXXXX</h2>
					  			<h2>CUENTA BANCARIA:<br>XXXX-XXXX-XXXXX-XXXX</h2>
					  			<br>
					  		</label>
						</div>
					</div>
					<a class="formulario__input" id="cancelar" href="compra.php" style="color: #fff; text-decoration:none; padding: 5px 50px 5px 50px; margin-left: 60px;">Cancelar</a>
			  	<!-- </form> -->
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
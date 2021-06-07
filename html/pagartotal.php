<?php
  session_start();
  require '../assets/connections/database.php';
  require '../clases/Productos.php';

  if(isset($_SESSION['correo'])){
    $privilegio = $_SESSION['privilegio'];
  }

  $json=json_decode($_POST['carrito']);

 echo $json[0]->id;


  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagar Total</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!--Estilos del menu superior-->
	<link rel="stylesheet" href="../css/menuPrincipal01.css">
	<link rel="stylesheet" href="../css/Cuerpo01.css">

	<!--Estilos del slider-->
	<link rel="stylesheet" href="../css/all.min.css">
	<link rel="stylesheet" href="../css/recompra.css">

	<script src="../js/jquery-3.6.0.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/habilitarPagarTotal.js"></script>


</head>
<body>

			<header>

		<div class="centrar_menu">
				
			<div class="cabecera_izquierda logo">
				<img src="../img/logo.png">
			</div>

			<div class="cabecera_derecha">
				<nav class="menu_Navegacion" id="menu_Navegacion">

					<div class="contenedor_grid ">
						<div class="grid " id="grid">
							<div class="categorias">
								<button class="regresar" id="regresar01"> <i class="fas fa-caret-left"> Regresar </i></button>

								<h3 class="subtitulo"> Categorias </h3>

								<div class="conector_Arriba activo"> <i class="fas fa-sort-up"></i> </div>

								<a href="#" data-categoria="equipo-de-computo">Computo <i class="fas fa-caret-right"></i></a>

								<a href="#" data-categoria="equipo-de-telefonia">Telefonia <i class="fas fa-caret-right"></i></a>

								<a href="#" data-categoria="equipo-de-electronica">Electronica <i class="fas fa-caret-right"></i></a>

								<a href="#" data-categoria="equipo-de-medicion">Medición <i class="fas fa-caret-right"></i></a>

								<a href="#" data-categoria="refacciones">Refacciones <i class="fas fa-caret-right"></i></a>

							</div>

							<div class="contenedor-Subcategorias " id="contenedor-Subcategorias">

								<div class="subcategorias activo" data-categoria="equipo-de-computo">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar02"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Computo </h3>
										<a href="#">Lenovo</a>
										<a href="#">Asus</a>
										<a href="#">HP</a>
										<a href="#">Samsung</a>
										<a href="#">MacBook</a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/computadora-banner01.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/computadora-galeria01.jpeg">
										</a>
										<a href="#">
											<img src="../img/computadora-galeria02.jpeg">
										</a>
										<a href="#">
											<img src="../img/computadora-galeria03.png">
										</a>
										<a href="#">
											<img src="../img/computadora-galeria04.jpeg">
										</a>
									</div>

								</div>

								<div class="subcategorias " data-categoria="equipo-de-telefonia">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar03"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Telefonía </h3>
										<a href="#">Apple</a>
										<a href="#">Zte</a>
										<a href="#">Xioami</a>
										<a href="#">Samsung</a>
										<a href="#">Huawei</a>
										<a href="#">Motorola</a>
										<a href="#">Nokia</a>
										<a href="#">Alcatel</a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/celular-banner001.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/celular-galeria04.jpeg">
										</a>
										<a href="#">
											<img src="../img/celular-galeria02.png">
										</a>
										<a href="#">
											<img src="../img/celular-galeria03.jpeg">
										</a>
										<a href="#">
											<img src="../img/celular-galeria01.jpeg">
										</a>
									</div>

								</div>

								<div class="subcategorias " data-categoria="equipo-de-electronica">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar04"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Electronica </h3>
										<a href="#">Cableado</a>
										<a href="#">Resistencias</a>
										<a href="#">Diodos</a>
										<a href="#">Transistores</a>
										<a href="#">Transformadores</a>
										<a href="#">Compuertas</a>
										<a href="#">Protoboard</a>
										<a href="#">Interruptores</a>
										<a href="#">Inductores</a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/circuitos-banner01.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/circuitos-galeria01.jpeg">
										</a>
										<a href="#">
											<img src="../img/circuitos-galeria02.jpeg">
										</a>
										<a href="#">
											<img src="../img/circuitos-galeria03.jpeg">
										</a>
										<a href="#">
											<img src="../img/circuitos-galeria04.jpeg">
										</a>
									</div>

								</div>

								<div class="subcategorias " data-categoria="equipo-de-medicion">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar05"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Medición </h3>
										<a href="#"> Metro </a>
										<a href="#"> Multimetro </a>
										<a href="#"> Osciloscopio </a>
										<a href="#"> Fuentes</a>
										<a href="#"> Generadores</a>
										<a href="#"> Termometros</a>
										<a href="#"> Comprobadores</a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/medicion-banner01.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/medicion-galeria01.jpeg">
										</a>
										<a href="#">
											<img src="../img/medicion-galeria02.jpeg">
										</a>
										<a href="#">
											<img src="../img/medicion-galeria03.jpeg">
										</a>
										<a href="#">
											<img src="../img/medicion-galeria04.jpeg">
										</a>
									</div>

								</div>

								<div class="subcategorias " data-categoria="refacciones">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar06"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Refacciones </h3>
										<a href="#"> De Computo </a>
										<a href="#"> De Telefonia </a>
										<a href="#"> De dispositivo </a>
										<a href="#"> De algun Otro </a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/refaccion-banner01.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/refaccion-galeria01.jpeg">
										</a>
										<a href="#">
											<img src="../img/refaccion-galeria02.jpeg">
										</a>
										<a href="#">
											<img src="../img/refaccion-galeria03.webp">
										</a>
										<a href="#">
											<img src="../img/refaccion-galeria04.jpeg">
										</a>
									</div>

								</div>

							</div>
						</div>
					</div>

					<div class="opciones_menu contenedor02 ">
						<ul>
							<li> <a href="../index.html"> <i class="fas fa-house-user"></i> Inicio  </a> </li>

							<li> <a href="#" class="boton_categorias" id="boton_categorias"> Categorias <i class="fas fa-caret-down"></i> </a> </li>

							<li> <a href="tipoDeCuenta.html"> <i class="fas fa-male"></i> Mi Cuenta </a> </li>

							<li> <a href="carrito.html"> <i class="fas fa-shopping-cart"></i>Carrito </a> </li>

							<li> <a href="search.html"> Buscador <i class="fas fa-search-dollar"></i> </a> </li>
						</ul>

					</div>

					<div class="botones_menu contenedor02">
						
						<button id="btn_menu_barras" class="btn_menu_barras">
							<i class="fas fa-bars"></i> 
						</button>

						<button id="btn_menu_cerrar" class="btn_menu_cerrar">
							<i class="fas fa-times-circle"></i> 
						</button>
					</div>

				</nav>
			</div>

		</div>

		

	</header>

	<main class="contenedor">

        <div id=prin>

		<div style="float:left;"; class="form-register">
            <form action="" class="formulario">
            	<h4>Metodos de pago</h4>
	            <div class="radio">
		            <input type="radio" id="Debito" name="metodoPago" value="debito">
		  			<label for="Debito">Tarjeta de debito</label><br>
		  			<br>
		  			<div class="debito">
			  			<input class="controls" type="text" name="TitularD" id="Titular" placeholder="Titular de la Tarjeta">
			  			<input class="controls" type="text" name="instBancariaD" id="instBancaria" placeholder="Institución Bancaria">
			            <input class="controls" type="text" name="numTarjetaD" id="numTarjeta" placeholder="Numero de Tarjeta">
						<input class="controls" type="text" name="fechaExpiracionD" id="fechaExpiracion" placeholder="Fecha de expiracion">
			            <input class="controls" type="tel" name="CVV" id="CVVD" placeholder="CVV">
		  			</div>

		  			<input type="radio" id="Credito" name="metodoPago" value="credito">
		  			<label for="Credito">Tarjeta de credito</label><br>
		  			<br>
		  			<div class="credito">
			  			<input class="controls" type="text" name="TitularC" id="Titular" placeholder="Titular de la Tarjeta">
			  			<input class="controls" type="text" name="instBancariaC" id="instBancaria" placeholder="Institución Bancaria">
			            <input class="controls" type="text" name="numTarjetaC" id="numTarjeta" placeholder="Numero de Tarjeta">
						<input class="controls" type="text" name="fechaExpiracionC" id="fechaExpiracion" placeholder="Fecha de expiracion">
			            <input class="controls" type="tel" name="CVV" id="CVVC" placeholder="CVV">
		  			</div>
		  			
		  			<input type="radio" id="DepTransf" name="metodoPago" value="DepositoTransferencia">
		  			<label for="DepTransf">Deposito o transferencia</label><br>
		  			<br>
		  			<div class="efectivo">
		  				<label id="efectivo" name="efectivo"  >
			  				<h1>Compu Electro Guys</h1>
			  				<h2>CLABE INTERBANCARIA:
			  				<br>XXXXXXXXXXXXXX</h2>
			  				<h2>CUENTA BANCARIA:<br>XXXX-XXXX-XXXXX-XXXX</h2>
			  				<br>
			  			</label>
	  				</div>
	  			</div>
  				
	            <a class="controls" href="compra.html" style="color: #fff; text-decoration:none; padding: 5px 138px 5px 138px; color:#000:hover;">Cancelar</a>
        	</form>
        </div>
         
          <div style="float:right;"; class="form-register">
           <h4>Resumen del pedido</h4> 
           <img src="../img/computadora-galeria01.jpeg"
     width="200"
     height="150">
            
            <h4>Nombre del producto</h4>
            <h4>Cantidad</h4>
            <h4>Precio</h4>
            <h3>Total</h3>
            <br>
            <a class="controls" href="compraexitosa.html" style="color: #fff; text-decoration:none; padding: 5px 120px 5px 120px; color:#000:hover;">Realizar Pago</a>
          </div>
        </div>

	</main>
	<footer>
		<h3> <a href="#">Av. Luis Enrique Erro S/N, Unidad Profesional Adolfo López Mateos, Zacatenco, Delegación Gustavo A. Madero, C.P. 07738, Ciudad de México </a> </h3>

		<h4> <a href="#"> Terminos y Condiciones </a> <a href="#"> Aviso de Privacidad </a> </h4>

		<h5> @	Derechos reservados 2021.</h5>
		
	</footer>
	
</body>

</html>

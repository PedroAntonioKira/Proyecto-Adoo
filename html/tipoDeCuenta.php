<!DOCTYPE html>
<html>
<head>
	<title>pagina Principal ADOO</title>
	<meta charset="utf-8">

	<!--Estilos del menu superior-->
	<link rel="stylesheet" href="../css/menuPrincipal01.css">
	<link rel="stylesheet" href="../css/Cuerpo01.css">

	<!--Estilos del slider-->
	<link rel="stylesheet" href="../css/all.min.css">
	<link rel="stylesheet" href="../css/estilos.css">

	<script src="../js/jquery-3.6.0.js"></script>
	<script src="../js/main.js"></script>

	<!--Estilos del slider-->
	<link rel="stylesheet" type="text/css" href="../css/tipoDeCuenta.css">


</head>
<body>

	<?php
		require '../assets/navs/headerBaseHtml.php';
	?>

	<main class="contenedor">


		<section class="tipoDeCuenta" id="tipoDeCuenta">

			<div class="sesionComprador">
				<a href="login2.php">
					<button>
						<h1>Comprador</h1>
						<img src="../img/comprador.png" style="height:170px;">
						<h2> Iniciar Sesion</h2>
					</button>

				</a>
			</div>

			<img src="../img/C.png" class="logoIniciarSesion">

			<div class="sesionVendedor">

				<a href="login.php">
					<button>
						<h1>Vendedor</h1>
						 <img src="../img/vendedor002.png" style="height:170px;">
						<h2> Iniciar Sesion</h2>
					</button>

				</a>

			</div>


		</section>


	</main>

	<footer>

		<h3> <a href="#">Av. Luis Enrique Erro S/N, Unidad Profesional Adolfo López Mateos, Zacatenco, Delegación Gustavo A. Madero, C.P. 07738, Ciudad de México </a> </h3>

		<h4> <a href="#"> Terminos y Condiciones </a> <a href="#"> Aviso de Privacidad </a> </h4>

		<h5> @	Derechos reservados 2021.</h5>

	</footer>

	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/menuPrincipal01.js"></script>

</body>

</html>

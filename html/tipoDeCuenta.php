<!DOCTYPE html>
<html>
<head>
	<title>Cuenta | Tipo de cuenta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
	<link rel="stylesheet" href="../css/navbar.css">

	<!--Estilos del Cuenta-->
	<link rel="stylesheet" type="text/css" href="../css/tipoDeCuenta.css">


</head>
<body>

	<?php
		require '../assets/navs/headerBase.php';
	?>

	<main class="contenedor">


		<section class="tipoDeCuenta" style="width: 50%;
			height: 50%;
			margin: 5% 30%;">

			<div class="sesionComprador" style="width: 30%;
			height: 80%;
			margin: 0.5% 1%;">
				<a href="crearCuentaComprador.php">
					<button>
						<h1 style="font-size: 2vw;">Comprador</h1>
						<img src="../img/comprador.png" style="height:100%; width:100%;">
						<h2 style="font-size: 2vw;">Registrarse</h2>
					</button>

				</a>
			</div>

			<img src="../img/C.png" class="logoIniciarSesion">

			<div class="sesionVendedor" style="width: 30%;
			height: 100px;
			margin: 0.5% 1%;">

				<a href="crearCuentaVendedor.php">
					<button>
						<h1 style="font-size: 2vw;">Vendedor</h1>
						 <img src="../img/vendedor002.png" style="height:100%; width:100%">
						<h2 style="font-size: 2vw;">Registrarse</h2>
					</button>

				</a>

			</div>


		</section>


	</main>

	<?php require '../assets/navs/footer.php'; ?>


	<script type="text/javascript" src="../js/menuPrincipal01.js"></script>

</body>

</html>

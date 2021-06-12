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

	<?php require '../assets/navs/footer.php'; ?>


	<script type="text/javascript" src="../js/menuPrincipal01.js"></script>

</body>

</html>

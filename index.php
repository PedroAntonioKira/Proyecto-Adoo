<?php
	session_start();
	require 'assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>pagina Principal ADOO</title>
	<meta charset="utf-8">

	<!--Estilos del menu superior-->
	<link rel="stylesheet" href="css/menuPrincipal01.css">
	<link rel="stylesheet" href="css/Cuerpo01.css">

	<!--Estilos del slider-->
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/estilos.css">

	<script src="js/jquery-3.6.0.js"></script>
	<script src="js/main.js"></script>

</head>
<body>

<?php
	if($_SESSION == NULL){
		require 'assets/navs/headerBase.php';

	}elseif($_SESSION['privilegio'] == 'Comprador'){
		require 'assets/navs/headerComprador.php';

	}elseif($_SESSION['privilegio'] == 'Vendedor'){
		require 'assets/navs/headerVendedor.php';
	}


?>


	<main class="contenedor">


	<div class="slideshow">
		<ul class="slider">
			<li>
				<img src="img/Fondo1.png" alt="">
				<section class="caption">
					<h1>Promocion 1</h1>
					<p>2X1 en aire comprimido</p>
				</section>
			</li>
			<li>
				<img src="img/Fondo2.png" alt="">
				<section class="caption">
					<h1>Promocion 2</h1>
					<p>Procesador Intel Core i5-11400 a solo $5,600.00</p>
				</section>
			</li>
			<li>
				<img src="img/Fondo3.png" alt="">
				<section class="caption">
					<h1>Promocion 3</h1>
					<p>Compra tu pic o arduino con nosotros con un 20% de descuento</p>
				</section>
			</li>
			<li>
				<img src="img/Fondo4.png" alt="">
				<section class="caption">
					<h1>Promocion 4</h1>
					<p>Tarjeta de Video EVGA Nvidia 3060Ti $20,000.00</p>
				</section>
			</li>
			<li>
				<img src="img/Fondo5.png" alt="">
				<section class="caption">
					<h1>Promocion 5</h1>
					<p>Metro de cable UTP Cat. 6 $13.00 por metro</p>
				</section>
			</li>
			<li>
				<img src="img/Fondo6.png" alt="">
				<section class="caption">
					<h1>Promocion 6</h1>
					<p>Con Compu Electro Gus tienes todo a la mano en este Hot Sale</p>
				</section>
			</li>

		</ul>

		<ol class="pagination">

		</ol>
		<div class="left">
			<span class="fa fa-chevron-left"></span>
		</div>

		<div class="right">
			<span class="fa fa-chevron-right"></span>
		</div>
	</div>

	
		<!--<section class="contenedor">

		<h1> Equipo 01 ADOO </h1>

		<div class="d2">#007580</div>
    	<div class="d1">#dbf6e9</div>

    	<div class="d3">#9ddfd3</div>
    	<div class="d4">#536162</div>

		</section>

		<section class="contenedor">

			<h1>
				informacion
			</h1>

		</section>

	</main>-->
	<?php require 'assets/navs/footer.php'; ?>
	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/menuPrincipal01.js"></script>
</body>
</html>

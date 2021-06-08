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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home | CEG</title>
	<meta charset="utf-8">

	<!-- Estilos del menu superior
	<link rel="stylesheet" href="css/menuPrincipal01.css">
	<link rel="stylesheet" href="css/Cuerpo01.css"> -->

	<!--Estilos del slider-->
	<!-- <link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/estilos.css">

	<script src="js/jquery-3.6.0.js"></script>
	<script src="js/main.js"></script> -->

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
	<!-- BOOTSTRAP ICONS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<!-- BOOTSTRAP JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
 
	<!-- NAVBAR -->
	<link rel="stylesheet" href="./css/navbar.css">
	<!-- PRODUCTOS -->
	<link rel="stylesheet" href="./css/cardProducts.css">

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

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      	<img src="./img/Fondo1.png" class="d-block w-100" alt="Promocion 1">
		<div class="carousel-caption d-none d-md-block">
			<h5>Promocion 1</h5>
			<p>Procesador Intel Core i5-11400 a solo $5,600.00</p>
		</div>
    </div>
    <div class="carousel-item">
      	<img src="./img/Fondo2.png" class="d-block w-100" alt="Promocion 2">
		<div class="carousel-caption d-none d-md-block">
			<h5>Promocion 2</h5>
			<p>Compra tu pic o arduino con nosotros con un 20% de descuento.</p>
		</div>
    </div>
    <div class="carousel-item">
      	<img src="./img/Fondo3.png" class="d-block w-100" alt="Promocion 3">
		<div class="carousel-caption d-none d-md-block">
			<h5>Promocion 3</h5>
			<p>2X1 en aire comprimido</p>
		</div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

<div class="container products-cards">
	<div class="row">
		
		<h2>Nuevos productos</h2>
		<div class="card" style="width: 18rem;">
			<img src="https://picsum.photos/500/500?random=1" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Product title</h5>
				<p class="card-text">$1250.65 MXN</p>
				<div class="buttons">
					<a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
					<a href="#" class="btn btn-success"><i class="bi bi-cart-plus"></i></a>
				</div>
			</div>
		</div>
		<div class="card" style="width: 18rem;">
			<img src="https://picsum.photos/500/500?random=2" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Product title</h5>
				<p class="card-text">$1250.65 MXN</p>
				<div class="buttons">
					<a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
					<a href="#" class="btn btn-success"><i class="bi bi-cart-plus"></i></a>
				</div>
			</div>
		</div>
		<div class="card" style="width: 18rem;">
			<img src="https://picsum.photos/500/500?random=3" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Product title</h5>
				<p class="card-text">$1250.65 MXN</p>
				<div class="buttons">
					<a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
					<a href="#" class="btn btn-success"><i class="bi bi-cart-plus"></i></a>
				</div>
			</div>
		</div>
		<div class="card" style="width: 18rem;">
			<img src="https://picsum.photos/500/500?random=4" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Product title</h5>
				<p class="card-text">$1250.65 MXN</p>
				<div class="buttons">
					<a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
					<a href="#" class="btn btn-success"><i class="bi bi-cart-plus"></i></a>
				</div>
			</div>
		</div>
		<div class="card" style="width: 18rem;">
			<img src="https://picsum.photos/500/500?random=5" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Product title</h5>
				<p class="card-text">$1250.65 MXN</p>
				<div class="buttons">
					<a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
					<a href="#" class="btn btn-success"><i class="bi bi-cart-plus"></i></a>
				</div>
			</div>
		</div>
		<div class="card" style="width: 18rem;">
			<img src="https://picsum.photos/500/500?random=6" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Product title</h5>
				<p class="card-text">$1250.65 MXN</p>
				<div class="buttons">
					<a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
					<a href="#" class="btn btn-success"><i class="bi bi-cart-plus"></i></a>
				</div>
			</div>
		</div>
		<div class="card" style="width: 18rem;">
			<img src="https://picsum.photos/500/500?random=7" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Product title</h5>
				<p class="card-text">$1250.65 MXN</p>
				<div class="buttons">
					<a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
					<a href="#" class="btn btn-success"><i class="bi bi-cart-plus"></i></a>
				</div>
			</div>
		</div>
		<div class="card" style="width: 18rem;">
			<img src="https://picsum.photos/500/500?random=8" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Product title</h5>
				<p class="card-text">$1250.65 MXN</p>
				<div class="buttons">
					<a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
					<a href="#" class="btn btn-success"><i class="bi bi-cart-plus"></i></a>
				</div>
			</div>
		</div>

	
	</div>
</div>




<!-- 
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
	</div> -->

	
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
	<!-- <script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/menuPrincipal01.js"></script> -->
</body>
</html>

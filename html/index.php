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
	    <title>CEG | Home</title>
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
		<link rel="stylesheet" href="../css/productos-propuesta.css">
	</head>
	<body>
		<?php
			if($_SESSION == NULL){
				require '../assets/navs/headerBase.php';

			}elseif($_SESSION['privilegio'] == 'Comprador'){
				require '../assets/navs/headerComprador.php';

			}elseif($_SESSION['privilegio'] == 'Vendedor'){
				require '../assets/navs/headerVendedor.php';
			}else{
				require '../assets/navs/headerBase.php';
			}
			// echo $_SESSION['privilegio'];
		?>

		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
		  <div class="carousel-indicators">
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		  </div>

	  	<div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="../img/Fondo1.png" class="d-block w-100" alt="Promocion 1">
					<div class="carousel-caption d-none d-md-block">
						<h5>Promocion 1</h5>
						<p>Procesador Intel Core i5-11400 a solo $5,600.00</p>
					</div>
		    </div>

		    <div class="carousel-item">
		      <img src="../img/Fondo2.png" class="d-block w-100" alt="Promocion 2">
					<div class="carousel-caption d-none d-md-block">
						<h5>Promocion 2</h5>
						<p>Compra tu pic o arduino con nosotros con un 20% de descuento.</p>
					</div>
		    </div>

		    <div class="carousel-item">
		      <img src="../img/Fondo3.png" class="d-block w-100" alt="Promocion 3">
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
					<img src="https://picsum.photos/1000/1000?random=2" class="card-img-top" alt="...">
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
					<img src="https://picsum.photos/300/300?random=4" class="card-img-top" alt="...">
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
					<img src="https://picsum.photos/900/900?random=8" class="card-img-top" alt="...">
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
	</body>

	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/menuPrincipal01.js"></script>
	<?php require '../assets/navs/footer.php'; ?>
		
	
</html>

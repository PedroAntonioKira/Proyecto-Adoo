<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}
	else{
		$privilegio = NULL;
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
			if($privilegio == NULL){
				require '../assets/navs/headerBase.php';
			}					
			elseif($privilegio == 'Comprador'){
				require '../assets/navs/headerComprador.php';

			}elseif($privilegio == 'Vendedor'){
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
		      <img src="../img/Banner04.png" class="d-block w-100" alt="Promocion 1">
					<div class="carousel-caption d-none d-md-block">
						<h5>Promocion 1</h5>
						<p>Procesador Intel Core i5-11400 a solo $5,600.00</p>
					</div>
		    </div>

		    <div class="carousel-item">
		      <img src="../img/Banner02.png" class="d-block w-100" alt="Promocion 2">
					<div class="carousel-caption d-none d-md-block">
						<h5>Promocion 2</h5>
						<p>Compra tu pic o arduino con nosotros con un 20% de descuento.</p>
					</div>
		    </div>

		    <div class="carousel-item">
		      <img src="../img/Banner03.png" class="d-block w-100" alt="Promocion 3">
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
			<!-- MOSTRANDO PRODUCTOS NUEVOS -->
			<?php 
				require '../assets/connections/database.php';
				$selectNuevosProductos = "SELECT producto.id, producto.nombre, descripcion.precio, descripcion.imagen1 
					FROM `producto`, descripcion WHERE producto.descripcion_id = descripcion.id ORDER BY producto.id DESC LIMIT 0, 12;";
				$ejecutar = $con->query($selectNuevosProductos);

				while ($datos = $ejecutar->fetch_assoc()) {
					$id = $datos['id'];
					$nombre = $datos['nombre'];
					$precio = $datos['precio'];
					$imagen = $datos['imagen1'];
					$urlAgregarCarrito = '#';

					if($_SESSION == NULL){
						$urlAgregarCarrito = "./login2.php";		
					}			
												
					ECHO "
						<div class='card' style='width: 18rem;'>
							<img src='../img/imagenesProductos/$imagen' class='card-img-top' alt=''>
							<div class='card-body'>
								<h5 class='card-title'>$nombre</h5>
								<p class='card-text'>$$precio MXN</p>
								<div class='buttons'>
								<a href='verDetalles.php?id_producto=$id' class='btn btn-primary'><i class='bi bi-eye'></i></a>								
						";

						if($privilegio != 'Vendedor'){
							ECHO "
								<a href='$urlAgregarCarrito' class='btn btn-success'><i class='bi bi-cart-plus'></i></a>
							";
						}
					ECHO "
							</div>
						</div>
					</div>						
					";

				}
			?>
			 <!-- = = = = = = = = = = END  = = = = = = = = = = = = -->
		</div>
	</div>



			</div>
		</div>
	</body>

	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/menuPrincipal01.js"></script>
	<?php require '../assets/navs/footer.php'; ?>
		
	
</html>

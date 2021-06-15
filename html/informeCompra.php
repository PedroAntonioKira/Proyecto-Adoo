<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>COMPRA | Informe de compra</title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">  
    <!-- ESTILOS INDIVIDUALES/PERSONALIZADOS   -->
    <link rel="stylesheet" href="../css/informeCompra.css">
	<!-- NAVBAR -->
	<link rel="stylesheet" href="../css/navbar.css">

</head>
<body>
	<!-- = = = = = = = =  NAV-MENU = = = = = = = = -->
	<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-green-ceg">
		<div class="container-fluid">
		  <a class="navbar-brand" href="#">
			  <img src="../img/ceg.png" alt="logo-CEG"> CEG
		  </a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house"></i> Home</a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="bi bi-shop"></i> Categorias
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <li><a class="dropdown-item" href="#">Action</a></li>
				  <li><a class="dropdown-item" href="#">Another action</a></li>
				  <li><a class="dropdown-item" href="#">Something else here</a></li>
				</ul>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#"><i class="bi bi-cart"></i> Carrito</a>
			  </li>

			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="bi bi-tags"></i> Mis Productos
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <li><a class="dropdown-item" href="#"><i class="bi bi-list-ol"></i> Administrar productos</a></li>
				  <li><a class="dropdown-item" href="#"><i class="bi bi-plus-circle"></i> Publicar nuevo Producto</a></li>
				  <li><a class="dropdown-item" href="#"><i class="bi bi-wallet2"></i> Ventas</a></li>
				</ul>
			  </li>

			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="bi bi-person-fill"></i> Cuenta 
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <li><a class="dropdown-item" href="#"><i class="bi bi-door-open"></i> Cerrar sesion</a></li>
				  <li><a class="dropdown-item" href="#"><i class="bi bi-file-person"></i> Mi cuenta</a></li>
				  <li><a class="dropdown-item" href="#"><i class="bi bi-credit-card"></i> Datos bancarios</a></li>
				</ul>
			  </li>

			</ul>
		  </div>
		</div>
	  </nav> -->
	<!-- = = = = = = = = END = = = = = = = = -->
	<?php
	// if($_SESSION == NULL){
	// 	header('location:./login.php'); 
	// 	// require '../assets/navs/headerBase.php';

	// }elseif($_SESSION['privilegio'] == 'Comprador'){
	// 	require '../assets/navs/headerComprador.php';

	// }elseif($_SESSION['privilegio'] == 'Vendedor'){
	// 	require '../assets/navs/headerVendedor.php';
	// }
	?>

	<div class="container details-product">
		<div class="row justify-content-md-center">
		<?php
		require '../assets/connections/database.php';
		if($_GET['id']){ //Busca el id de la compra
			$id_compra = $_GET['id'];
			$sentencia = "
            SELECT CONCAT(info.nombre, ' ', info.apellidop, ' ', info.apellidom) AS 'nombre_comprador',
			CAST(compras.fecha AS DATE) AS fecha, compras.total, compras.estatus FROM compras, comprador, info 
			WHERE (compras.id = $id_compra) AND (compras.id_comprador = comprador.id) AND (comprador.info_id = info.id);
			";
			
			$ejecutar = $con->query($sentencia);
			while ($datos = $ejecutar->fetch_assoc()) {
				$nombre_comprador = $datos['nombre_comprador'];
				$fecha_compra = $datos['fecha'];
				$total = $datos['total'];
				$estado_compra = $datos['estatus'];
			}	
			
			$select_entrega = "SELECT CONCAT(info.nombre, ' ', info.apellidop, ' ', info.apellidom) AS 'nombre_vendedor',
			entregas_compras.fecha_entrega, DATE_FORMAT(entregas_compras.hora_entrega, '%h:%i %p') AS hora_entrega,
			entregas_compras.linea, entregas_compras.estacion FROM compras, vendedor, info, entregas_compras
			WHERE (compras.id = $id_compra) AND (compras.id_vendedor = vendedor.id) AND (vendedor.info_id = info.id) AND 
            (entregas_compras.id_compra = compras.id);";
			
			$ejecutar = $con->query($select_entrega);
			while ($datos = $ejecutar->fetch_assoc()) {
				$nombre_vendedor = $datos['nombre_vendedor'];
				$fecha_entrega = $datos['fecha_entrega'];
				$hora_entrega = $datos['hora_entrega'];
				$linea_entrega = $datos['linea'];
				$estacion_entrega = $datos['estacion'];
			}				
		}
		?>	
			<div class="ticket">
				<div class="ticket-header">
					<h1>Informe de compra</h1>
				</div>
				<div class="ticket-body row">
					<div class="text-center col-6">
						<div class='col-12 name'>Código de la compra</div>
						<?php
						echo "<div class='col-12 text'>$id_compra</div>"
						?>
					</div>
					<div class="text-center col-6">
						<div class="col-12 name">Fecha de compra</div>
						<?php
						echo "<div class='col-12 text'>$fecha_compra</div>"
						?>						
					</div>

					<div class="text-center col-6">
						<div class="col-12 name">Punto de entrega</div>
						<?php
						echo "<div class='col-12 text'>CDMX, Linea $linea_entrega, Estación $estacion_entrega, Torniquetes.</div>"
						?>	
						<!-- <div class="col-12 text">CDMX, Linea Amarilla, Estación Politecnico, Torniquetes.</div> -->
					</div>
					<div class="text-center col-6 row">
						<div class="col-6 name">Fecha de Entrega</div>
						<div class="col-6 name">Hora de Entrega</div>
						<?php
						echo "<div class='col-6 text'>$fecha_entrega</div>";
						echo "<div class='col-6 text'>$hora_entrega</div>";
						?>						
					</div>

					<div class="text-center col-6">
						<div class="col-12 name">Vendedor</div>
						<?php
						echo "<div class='col-12 text'>$nombre_vendedor</div>"
						?>						
						<!-- <div class="col-12 text">Omar Aguirre Alvarez.</div> -->
					</div>
					<div class="text-center col-6">
						<div class="col-12 name">Comprador</div>
						<?php
						echo "<div class='col-12 text'>$nombre_comprador</div>"
						?>
						<!-- <div class="col-12 text">Omar Aguirre Alvarez.</div> -->
					</div>
					<span class="span"></span>
					<span class="span2"></span>
					<!-- PRODUCTOS -->
					<div class="product-list">
						<div class="text-center col-12 row">
							<div class="col-8 name">Producto</div>
							<div class="col-2 name">Cantidad</div>
							<div class="col-2 name">Subtotal</div>
						</div>
		<?php
		// if($_GET['id']){ //Busca el id de la compra
		// 	$id_compra = $_GET['id'];
			$select_productos = "SELECT descripcion.imagen1 AS imagen, producto.nombre, productos_comprados.cantidad, 
				productos_comprados.subtotal FROM productos_comprados, producto, descripcion, compras WHERE (compras.id = $id_compra) 
				AND (productos_comprados.id_compra = compras.id) AND (productos_comprados.id_producto = producto.id)
				AND (producto.descripcion_id = descripcion.id);";
			
			$ejecutar = $con->query($select_productos);
			while ($datos = $ejecutar->fetch_assoc()) {
				$imagen_producto = $datos['imagen'];
				$nombre_producto = $datos['nombre'];
				$cantidad_producto = $datos['cantidad'];
				$subtotal_producto = $datos['subtotal'];					 
			echo "
				<div class='text-center col-12 row'>
					<div class='col-3'><img src='/Proyecto-Adoo/img/imagenesProductos/$imagen_producto' alt='$nombre_producto' class='img-thumbnail-ceg'></img></div>
					<div class='col-5 vertical-middle text-start'>$nombre_producto</div>
					<div class='col-2 vertical-horizontal-middle'>x$cantidad_producto</div>
					<div class='col-2 vertical-horizontal-middle'>$$subtotal_producto MXN</div>
				</div>			
			";
			}

		?>						
						<!-- <div class="text-center col-12 row">
							<div class="col-3">IMAGEN</div>
							<div class="col-5">Nombre un poco largo del producto en cuestion.</div>
							<div class="col-2">x17</div>
							<div class="col-2">$5000.00 MXN</div>
						</div> -->
						<div class="text-center col-12 row total">
							<div class="col-8"></div>
							<div class="col-2 name total">Total</div>
							<?php
								echo "<div class='col-2 text'>$$total MXN</div>"
							?>
							<!-- <div class="col-2 text">$5000.00 MXN</div> -->
						</div>
					</div>
				</div>

				<div class="ticket-footer row">
					<div class="text-center col-6">
						<div class="col-12 name">Pagado</div>
						<?php
						echo "<div class='col-12 text'>$$total MXN</div>"
						?>
						<!-- <div class="col-12 text">$5000.00 MXN</div> -->
					</div>
					<div class="text-center col-6">
						<div class="col-12 name">Estado de la compra</div>	
						<?php
						echo "<div class='col-12 text'>$estado_compra</div>"
						?>
						<!-- <div class="col-12 text">En proceso de entrega</div> -->
					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- = = = = = = = = FOOTER = = = = = = = = -->
	<footer class="row">
			<div class="col col-4">
				<a href="#">Vende tus productos</a>
			</div>
			<div class="col col-4">
				<a href="#">Términos y condiciones</a>
			</div>
			<div class="col col-4">
				<a href="#">Cómo cuidamos tu privacidad</a>
			</div>

			<div class="col-3"></div>
			<div class="col col-6">
				<p>
					Av. Luis Enrique Erro S/N, Unidad Profesional Adolfo López Mateos, Zacatenco, Delegación Gustavo A. Madero, C.P. 07738, Ciudad de México 
				</p>
			</div>
			<div class="col-3"></div>

			<div class="col-3"></div>
			<div class="col col-6">
				<p>
					© 2021 Compu Electro Guys
				</p>
			</div>
			<div class="col-3"></div>
	</footer>
	<!-- = = = = = = = = END = = = = = = = = -->
</body>

</html>
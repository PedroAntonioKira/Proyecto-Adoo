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
  <!-- Nav -->
  <?php
      if($_SESSION == NULL){
        require '../assets/navs/headerBaseIndex.php';

      }elseif($_SESSION['privilegio'] == 'Comprador'){
        require '../assets/navs/headerComprador.php';
      }elseif($_SESSION['privilegio'] == 'Vendedor'){
        require '../assets/navs/headerVendedorIndex.php';
      }else{
        require '../assets/navs/headerBaseIndex.php';
      }
      // echo $_SESSION['privilegio'];
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
			entregas_compras.fecha_entrega, DATE_FORMAT(entregas_compras.hora_entrega, '%h:%i %p') AS hora_entrega, entregas_compras.hora_entrega AS horitaEnt,
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
				$horaEntre=$datos['horitaEnt'];
			}
		}
		?>
			<div class="ticket">
				<div class="ticket-header">
					<h1>Informe de compra</h1>
				</div>
				<div class="ticket-body row">
					<div class="text-center col-6">
						<div class='col-12 name'>C??digo de la compra</div>
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
						echo "<div class='col-12 text'>CDMX, $linea_entrega, Estaci??n $estacion_entrega, Torniquetes.</div>"
						?>
						<!-- <div class="col-12 text">CDMX, Linea Amarilla, Estaci??n Politecnico, Torniquetes.</div> -->
					</div>
					<div class="text-center col-6 row">
						<div class="col-6 name">Fecha de Entrega</div>
						<div class="col-6 name">Hora de Entrega</div>
						<?php
						echo "<div class='col-6 text'>$fecha_entrega</div>";
						echo "<div class='col-6 text'>$horaEntre</div>";
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
		 if($_GET['id']){ //Busca el id de la compra
		 	$id_compra = $_GET['id'];
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
					</div>
					<div class="text-center col-6">
						<div class="col-12 name">Estado de la compra</div>
						<?php
						echo "<div class='col-12 text'>$estado_compra</div>"
						?>
					</div>
				</div>
				<div class="row btns">
					<div class="col"><a class="btn btn-return" href="verCarrito.php">Volver al carrito</a></div>
					<div class="col"><a class="btn btn-return" href="index.php">Ir al inicio</a></div>
					<div class="col"><a class="btn btn-return" href="historialCompras.php">Ver mis compras</a></div>
				</div>
													
			</div>

			<!-- <div class="botones_deretorno">
					<a class="boton_personalizado1" href="verCarrito.php">Volver al carrito</a>
					<a class="boton_personalizado2" href="index.php">Volver al index</a>
					<a class="boton_personalizado3" href="historialCompras.php">Historial</a>
			</div> -->

		</div>
	</div>

	<?php require '../assets/navs/footer.php'; ?>

</body>

</html>

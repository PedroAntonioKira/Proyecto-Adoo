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
      <title>Filtrando Computo</title>
    <meta charset="utf-8">
    <!--Links del filtrador-->
    <link rel="stylesheet" href="../css/estilosFiltrador.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Estilos del formulario-->
    <link rel="stylesheet" href="../css/formMultiStep.css">

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/buscar.js"></script>

    <!-- HEADER AND FOOTER -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
    <link rel="stylesheet" href="../css/navbar.css">
  </head>
<body>
	<?php
    if($_SESSION == NULL){
      require '../assets/navs/headerBase.php';
    }
    elseif($_SESSION['privilegio'] == 'Comprador'){
      require '../assets/navs/headerComprador.php';
    }
  ?>
  <main class="contenedor">
		<div class="container details-product">
	    <div class="row justify-content-md-center">
	        <div class="col col-7">
						<?php
							$id_Producto = $_GET['id_producto'];

							$consulta = "SELECT descripcion.marca,descripcion.fabricante,descripcion.altoprod,descripcion.anchoprod,
							descripcion.bateriasinclu,descripcion.tamañoram,descripcion.tamañodiscoduro,descripcion.sistemaoperativo,
							descripcion.procesador,descripcion.tamañopantalla,descripcion.resolucion,descripcion.numeroprocesadores,
							descripcion.tipodiscoduro,descripcion.imagen1,descripcion.imagen2,descripcion.imagen3,descripcion.color,
							descripcion.precio,producto.nombre AS nombreProd,producto.stock,catalogodeproductos.avgcalificacion,info.nombre,
							info.apellidop,info.apellidom FROM descripcion INNER JOIN producto on producto.descripcion_id = descripcion.id
							INNER JOIN catalogodeproductos ON catalogodeproductos.producto_id = producto.id
							INNER JOIN vendedor ON catalogodeproductos.vendedor_id = vendedor.id
							INNER JOIN info ON vendedor.info_id = info.id WHERE catalogodeproductos.producto_id = '$id_Producto'";

							$ejecutar = $con->query($consulta);
							$datos = $ejecutar->fetch_assoc();
						?>
	            <!-- NOMBRE Y DETALLES -->
				<h1><?php echo($datos['nombreProd']); ?></h1>
				<h3>Price: $<?php echo($datos['precio']); ?> MXN</h3>

	            <table class="table table-striped table-bordered">
	        			<thead class=" thead thead-dark">

									<tr>
										<th scope="col">Caracteristica</th>
										<th scope="col">Descripción</th>
									</tr>
	        			</thead>
								<tbody>
    							<tr>
    								<td>Marca</td>
    								<td><?php echo($datos['marca']) ?></td>
    							</tr>
									<tr>
    								<td>Fabricante</td>
    								<td><?php echo($datos['fabricante']) ?></td>
    							</tr>
									<tr>
    								<td>Alto del producto</td>
    								<td><?php echo($datos['altoprod']) ?> cm</td>
    							</tr>
									<tr>
    								<td>Ancho del producto</td>
    								<td><?php echo($datos['anchoprod']) ?> cm</td>
    							</tr>
									<tr>
    								<td>Batrias incluidas</td>
    								<td><?php echo($datos['bateriasinclu']) ?></td>
    							</tr>
									<tr>
    								<td>Tamaño de la RAM</td>
    								<td><?php echo($datos['tamañoram']) ?> Gb</td>
    							</tr>
									<tr>
    								<td>Tamaño del disco duro</td>
    								<td><?php echo($datos['tamañodiscoduro']) ?> Gb</td>
    							</tr>
									<tr>
    								<td>SO</td>
    								<td><?php echo($datos['sistemaoperativo']) ?></td>
    							</tr>
									<tr>
    								<td>Procesador</td>
    								<td><?php echo($datos['procesador']) ?></td>
    							</tr>
									<tr>
    								<td>Tamaño de la pantalla</td>
    								<td><?php echo($datos['tamañopantalla']) ?> pulgadas</td>
    							</tr>
									<tr>
    								<td>Resolución</td>
    								<td><?php echo($datos['resolucion']) ?></td>
    							</tr>
									<tr>
    								<td>Numero de procesadores</td>
    								<td><?php echo($datos['numeroprocesadores']) ?></td>
    							</tr>
									<tr>
    								<td>Tipo de disco duro</td>
    								<td><?php echo($datos['tipodiscoduro']) ?></td>
    							</tr>
								</tbody>
	            </table>

				<h5>Stock: <?php echo($datos['stock']) ?> Disponibles.</h5>
				<h5>Sold By: <a href="#"><?php echo($datos['nombre']." ".$datos['apellidop']." ".$datos['apellidom']) ?></a></h5>

				<?php
					if($datos['avgcalificacion'] == NULL){
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("</div>");
					}elseif ($datos['avgcalificacion'] == 1) {
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("</div>");
					}elseif($datos['avgcalificacion'] == 2){
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("</div>");
					}elseif($datos['avgcalificacion'] == 3){
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("</div>");
					}elseif($datos['avgcalificacion'] == 4){
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star'></i>");
						echo("</div>");
					}elseif($datos['avgcalificacion'] == 5){
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("<i class='bi bi-star-fill'></i>");
						echo("</div>");
					}
				 ?>
				 <!-- ESTRELLAS CALIFICACIÓN -->

			</div>

	        <div class="col-5">
	        <!-- SLIDER PRODUCT -->
            <div class="container-right">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/imagenesProductos/<?php echo($datos['imagen1']) ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/imagenesProductos/<?php echo($datos['imagen2']) ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/imagenesProductos/<?php echo($datos['imagen3']) ?>" class="d-block w-100" alt="...">
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            <!-- SLIDER PRODUCT END -->
            <!-- BUTTONS -->
                <div class="buttons-container center-all">
                	<a href="mensajeVendedor.html">
                    	<button type="button" class="btn btn-primary" title="Preguntar al vendedor"><i class="bi bi-chat-dots-fill"></i></button>
                    </a>
                    <a href="./carrito.html"  class="btn btn-success" title="Agregar al carrito"><i class="bi bi-cart-plus-fill"></i></a>
                    <!-- <button type="button" class="btn btn-primary">Preguntar</button>
                    <button type="button" class="btn btn-success">Agregar al carrito</button>                 -->
                </div>
            <!-- BUTTONS END -->
            </div>
	        </div>
	    </div>
	</div>
	</main>
	<?php require '../assets/navs/footer.php'; ?>
</body>
  
</html>
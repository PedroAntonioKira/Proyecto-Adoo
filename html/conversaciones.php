<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}




//	INSERT INTO `registrodechat` (`id`, `comprador_id`, `vendedor_id`, `catalogodeproductos_id`) VALUES (NULL, '1', '1', '1')
//	INSERT INTO `chat` (`id`, `idregistroDeChat`, `fecha`, `mensaje`, `correoEnvia`) VALUES (NULL, '1', current_timestamp(), 'Hola', 'joss.alberto.r.m@gmail.com')
?>


<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversaciones</title>
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

    <!-- ESTILOS INDIVIDUALES/PERSONALIZADOS   -->
    <link rel="stylesheet" href="../css/verDetalles.css">
    <link rel="stylesheet" href="../css/adminTables.css">

		<!-- Carro -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="../js/main.js"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/verDetalles.css">

	<!--Estilos del slider-->
	<link rel="stylesheet" href="../css/all.min.css">
	<link rel="stylesheet" href="../css/recompra.css">

	<script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/main.js"></script>

    <script src="../js/admin_messages.js"></script>

</head>
<body>

	<?php
		if($_SESSION == NULL){
			require '../assets/navs/headerBase.php';

		}elseif($_SESSION['privilegio'] == 'Comprador'){
			require '../assets/navs/headerComprador.php';
		}elseif($_SESSION['privilegio'] == 'Vendedor'){
			require '../assets/navs/headerVendedor.php';
		}
	?>


	<main class="contenedor">
		<div class="container details-product">
	        <div class="row justify-content-md-center">
                <h1>Conversaciones</h1>
                <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>

                    <tbody>
											<?php
												$idComp = $_SESSION['id_comprador'];
												$consulta = "SELECT registrodechat.id,producto.nombre,CONCAT(info.nombre,' ',info.apellidop,' ',info.apellidom)as nombreVendedor
												from registrodechat
												INNER JOIN catalogodeproductos on registrodechat.catalogodeproductos_id = catalogodeproductos.id
												INNER JOIN producto ON catalogodeproductos.producto_id = producto.id
												INNER JOIN vendedor ON vendedor.id = catalogodeproductos.vendedor_id
												INNER JOIN info ON info.id = vendedor.info_id WHERE comprador_id = '$idComp'";

												$ejecutar = $con->query($consulta);
												while ($datos = $ejecutar->fetch_assoc()) {
													$id = $datos['id'];
													$nombre = $datos['nombre'];
													$vendedor = $datos['nombreVendedor'];

													echo "<tr>";
													echo "<th scope='row'>$id</th>";
													echo "<td>$nombre</td>";
													echo "<td>$vendedor</td>";
													echo "<td>";
													echo "<a href='mensajeVendedor.php?id_registro=$id' class='btn btn-primary' title='Ver mensaje'><i class='bi bi-eye'></i></a>";
													echo "</td>";
													echo "</tr>";
												}
											?>
                    </tbody>
                </table>

	        </div>
	    </div>
    </main>

	<?php require '../assets/navs/footer.php'; ?>

</body>

</html>

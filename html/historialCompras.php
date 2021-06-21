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
    <title>Historial de compras</title>
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
                <h1>Historial de Compras</h1>
                <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Total</th>
                        <th scope="col">Estatus</th>
						<th scope="col">Fecha</th>
						<th scope="col">Acciones</th>
                      </tr>
                    </thead>

                    <tbody>
					<tr>
						<td>1</td>
						<td>Marco Lg</td>
						<td>1</td>
						<td>Entregado</td>
						<td>21/06/2021</td>
						<td><button class="formulario__btn2" name="devolver" id="devolver" value="devolver">Devolver</button></td>
					</tr>
											<?php
												$idComp = $_SESSION['id_comprador'];
												$consulta = "SELECT compras.id,CONCAT(info.nombre,' ',info.apellidop,' ',info.apellidom) as nombreVendedor,
												compras.total,compras.estatus,compras.fecha
												FROM compras
												INNER JOIN vendedor ON vendedor.id = compras.id_vendedor
												INNER JOIN info ON info.id = vendedor.info_id
												INNER JOIN comprador ON compras.id_comprador = comprador.id
												WHERE comprador.id='$idComp'";

												$ejecutar = $con->query($consulta);
												while ($datos = $ejecutar->fetch_assoc()) {
													$idComp = $datos['id'];
													$nomVend = $datos['nombreVendedor'];
													$total = $datos['total'];
													$estatus = $datos['estatus'];
													$fecha = $datos['fecha'];
													echo "<tr>";
													echo "<th scope='row'>$idComp</th>";
													echo "<td>$nomVend</td>";
													echo "<td>$total</td>";
													echo "<td>$estatus</td>";
													echo "<td>$fecha</td>";
													echo "<td>";
													echo "<a href='informeCompra.php?id=$idComp' class='btn btn-primary' title='Ver mensaje'><i class='bi bi-eye'></i></a>";
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

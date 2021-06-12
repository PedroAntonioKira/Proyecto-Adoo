<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}

	if (isset($_POST['Aceptar'])){
		if (!empty($_POST['texto'])) {
			$mensaje = $_POST['texto'];
			$idRegistro = $_GET['id_registro'];
			$correo = $_SESSION['correo'];

			$consulta3 = "INSERT INTO chat (idregistroDeChat, mensaje, correoEnvia) VALUES ('$idRegistro','$mensaje','$correo')";
			$ejecutar3 = $con->query($consulta3);

			header("mensajeVendedor.php?id_registro=$idRegistro");
		}
	}


//	INSERT INTO `registrodechat` (`id`, `comprador_id`, `vendedor_id`, `catalogodeproductos_id`) VALUES (NULL, '1', '1', '1')
//	INSERT INTO `chat` (`id`, `idregistroDeChat`, `fecha`, `mensaje`, `correoEnvia`) VALUES (NULL, '1', current_timestamp(), 'Hola', 'joss.alberto.r.m@gmail.com')
?>

<!DOCTYPE html>
<html>
<head>
	<title>pagina Principal ADOO</title>
	<meta charset="utf-8">

	<!-- BOOTSTRAP CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<!-- BOOTSTRAP JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP ICONS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<!-- ESTILOS INDIVIDUALES/PERSONALIZADOS   -->
	<link rel="stylesheet" href="../css/verDetalles.css">
	<link rel="stylesheet" href="../css/adminTables.css">
	<!--Estilos del menu superior-->
	<link rel="stylesheet" href="../css/menuPrincipal01.css">
	<link rel="stylesheet" href="../css/Cuerpo01.css">

	<!--Estilos del slider-->
	<link rel="stylesheet" href="../css/all.min.css">
	<link rel="stylesheet" href="../css/estilos.css">

	<script src="../js/jquery-3.6.0.js"></script>
	<script src="../js/main.js"></script>

	<!--Estilos del slider-->
	<link rel="stylesheet" type="text/css" href="../css/mensajeVendedor.css">

	<!--Estilos del chat-->
	<link rel="stylesheet" href="../css/estiloChat.css">


</head>
<body>

	<?php
		if($_SESSION == NULL){
			require '../assets/navs/headerBaseHtml.php';

		}elseif($_SESSION['privilegio'] == 'Comprador'){
			require '../assets/navs/headerCompradorHtml.php';
		}elseif($_SESSION['privilegio'] == 'Vendedor'){
			require '../assets/navs/headerVendedor.php';
		}
	?>

	<main class="contenedor">
		<div class="container">
        <!-- chat box -->
        <div class="chat-box">
            <!-- client -->
            <div class="client">
                <img src="../img/logo.png" alt="logo" />
                <div class="client-info">
                    <h2><?php

											$idRegistro = $_GET['id_registro'];

											$consulta1 = "SELECT CONCAT(info.nombre,' ',info.apellidop,' ',info.apellidom) as nombreVendedor, producto.nombre FROM info
											INNER JOIN vendedor ON vendedor.info_id = info.id
											INNER JOIN catalogodeproductos ON catalogodeproductos.vendedor_id = vendedor.id
											INNER JOIN producto ON producto.id = catalogodeproductos.producto_id
											INNER JOIN registrodechat ON  registrodechat.catalogodeproductos_id = catalogodeproductos.id
											WHERE registrodechat.id = '$idRegistro'";

											$ejecutar1 = $con->query($consulta1);
											$datos1 = $ejecutar1->fetch_assoc();

											echo ($datos1['nombre']."-".$datos1['nombreVendedor']);

										?></h2>
                </div>
            </div>

            <!-- main chat section -->
            <div class="chats">
								<?php
									$consulta2 = "SELECT * FROM chat WHERE chat.idregistroDeChat = '$idRegistro'";
									$ejecutar2 = $con->query($consulta2);

									while ($datos2 = $ejecutar2->fetch_assoc()) {
										$fecha = $datos2['fecha'];
										$mensaje = $datos2['mensaje'];
										$correo = $datos2['correoEnvia'];

										if ($correo == $_SESSION['correo']) {
											echo "<div class='my-chat'>$mensaje</div>";
											echo "<p style='color:black; text-align: right'>$fecha</p>";
										}else{
											echo "<div class='client-chat'>$mensaje</div>";
											echo "<p style='color:black'>$fecha</p>";
										}
									}
								?>
            </div>

            <!-- input field section -->
						<form class="" action="mensajeVendedor.php?id_registro=<?php echo "$idRegistro";?>" method="post">
							<div class="chat-input">
									<input type="text" placeholder="Mensaje" name="texto"/>
	                <button class="send-btn" name="Aceptar"><i class="bi bi-arrow-right-circle-fill"></i></i></button>
	            </div>
						</form>

        </div>
    </div>
	</main>



	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/menuPrincipal01.js"></script>

</body>

</html>

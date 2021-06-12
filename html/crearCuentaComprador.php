<?php
	require '../assets/connections/database.php';

	if(isset($_POST['Aceptar'])){
		if(!empty($_POST['nombre']) && !empty($_POST['apellidop']) && !empty($_POST['apellidom']) && !empty($_POST['institucion']) && !empty($_POST['correo']) && !empty($_POST['contrasena'])){
			$nombre = $_POST['nombre'];
			$apellidop = $_POST['apellidop'];
			$apellidom = $_POST['apellidom'];
			$institucion = $_POST['institucion'];
			$correo = $_POST['correo'];
			$contrasena = $_POST['contrasena'];

			$records = "SELECT * FROM usuario WHERE usuario.correo = '$correo'";
			$ejecutar = $con->query($records);
			$datos = $ejecutar->fetch_assoc();

			if($datos != NULL){
				echo("<script type='text/javascript'>alert('Ese correo ya está en uso'); </script>");
			}else{
				$info = "INSERT INTO info (nombre,apellidop,apellidom,institucion) VALUES ('$nombre', '$apellidop', '$apellidom', '$institucion')";
				$usuario = "INSERT INTO usuario (correo,contrasena,actividad,privilegios_id) VALUES ('$correo', '$contrasena','1','2')";
				$vinculo = "SELECT id FROM info WHERE info.nombre = '$nombre' AND info.apellidop = '$apellidop' AND info.apellidom = '$apellidom' AND info.institucion = '$institucion'";



				if(!$con->query($info) || !$con->query($usuario)){
					echo("Falló: (".$con->errno.") ". $con->error);
				}

				if(!($vinculoDatos = $con->query($vinculo)->fetch_assoc())){
					echo("Falló: (".$con->errno.") ". $con->error);
				}
				$id = $vinculoDatos['id'];
				$comprador = "INSERT INTO comprador (usuario_correo,info_id) VALUES ('$correo', '$id')";

				if(!$con->query($comprador)){
					echo("Falló: (" . $con->errno . ") " . $con->error);
				}
				header('location: login2.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Cuenta | Registro</title>
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

</head>
<body>

		<?php require '../assets/navs/headerBaseHtml.php'; ?>

	<main class="contenedor">
		<div class="container-fluid" id="grad1">
		    <div class="row justify-content-center mt-0">
		        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
		            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
		                <h2><strong>Registro De Comprador</strong></h2>
		                <p>Rellena todos los capos y presiona siguiente</p>
		                <div class="row">
		                    <div class="col-md-12 mx-0">

		                        <form id="msform" action="crearCuentaComprador.php" method="post">
		                            <!-- progressbar -->
		                            <ul id="progressbar">
		                                <li class="active" id="account"><strong>Información</strong></li>
		                                <li id="personal"><strong>Cuenta</strong></li>
		                            </ul>
																<!-- fieldsets -->

		                            <fieldset>
		                                <div class="form-card">
		                                    <h2 class="fs-title">Información De Usuario</h2>
																				<input type="text" name="nombre" placeholder="Nombre(s)" class="form-control" required autocomplete="off">
																				<input type="text" name="apellidop" placeholder="Apellido Paterno" required autocomplete="off">
																				<input type="text" name="apellidom" placeholder="Apellido Materno" required autocomplete="off">
																				<input type="text" name="institucion" placeholder="Institución de procedencia" required autocomplete="off">
		                                </div>
																		<input type="button" name="next" class="next action-button" value="Siguiente" />
		                            </fieldset>

		                            <fieldset>
		                                <div class="form-card">
		                                    <h2 class="fs-title">Información de Cuenta</h2>
																				<input type="email" name="correo" placeholder="Correo Electronico" required autocomplete="off" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
																				<input type="password" name="contrasena" placeholder="Contraseña" required autocomplete="off">
		                                </div>
																		<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
																		<input type="submit" name="Aceptar" class="btn action-button" value="Aceptar" />
		                            </fieldset>
		                        </form>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</main>

	<?php require '../assets/navs/footer.php'; ?>

	<!--Nav Categorias-->
	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/menuPrincipal01.js"></script>

	<!--Formulario-->
	<script src="../js/formMultiStep.js" charset="utf-8"></script>
</body>

</html>

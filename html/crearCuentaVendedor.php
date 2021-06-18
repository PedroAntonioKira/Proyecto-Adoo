<?php
  require '../assets/connections/database.php';

	if(isset($_POST['Aceptar'])){
		if(!empty($_POST['nombre'])
		&& !empty($_POST['apellidop'])
		&& !empty($_POST['apellidom'])
		&& !empty($_POST['institucion'])
		&& !empty($_POST['correo'])
		&& !empty($_POST['contrasena'])
		&& !empty($_POST['num'])
		&& !empty($_POST['exp'])
		&& !empty($_POST['codigo'])
		&& !empty($_POST['lista1'])
		&& !empty($_POST['lista2'])
		&& !empty($_POST['lista3'])){

			$nombre      = $_POST['nombre'];
			$apellidop   = $_POST['apellidop'];
			$apellidom   = $_POST['apellidom'];
			$institucion = $_POST['institucion'];
			$correo      = $_POST['correo'];
			$contrasena  = $_POST['contrasena'];
			$num         = $_POST['num'];
			$exp         = $_POST['exp'];
			$codigo      = $_POST['codigo'];
			$lista1      = $_POST['lista1'];
			$lista2      = $_POST['lista2'];
			$lista2      = $_POST['lista3'];

			$records = "SELECT * FROM usuario WHERE usuario.correo = '$correo'";
			$ejecutar = $con->query($records);
			$datos = $ejecutar->fetch_assoc();

			if($datos != NULL){
				echo("<script type='text/javascript'>alert('Ese correo ya está en uso'); </script>");
			}else{
				$info = "INSERT INTO info (nombre,apellidop,apellidom,institucion) VALUES ('$nombre', '$apellidop', '$apellidom', '$institucion')";
				$usuario = "INSERT INTO `usuario` (`correo`, `contrasena`, `hash`, `estatus`, `privilegios_id`) VALUES ('$correo', '$contrasena', '', 'VERIFICADO1', '3')";
				$infoTarjeta = "INSERT INTO infotarjeta (num,exp,codigo) VALUES ('$num', '$exp', '$codigo')";

				$vinculo = "SELECT id FROM info WHERE info.nombre = '$nombre' AND info.apellidop = '$apellidop' AND info.apellidom = '$apellidom' AND info.institucion = '$institucion'";
				$vinculoTarjeta = "SELECT id FROM infotarjeta WHERE infotarjeta.num = '$num' AND infotarjeta.exp = '$exp' AND infotarjeta.codigo = '$codigo'";


				if(!$con->query($info) || !$con->query($usuario) || !$con->query($infoTarjeta)){
					echo("Falló: (".$con->errno.") ". $con->error);
				}

				if(!($idInfo = $con->query($vinculo)->fetch_assoc()) || !($idTarjeta = $con->query($vinculoTarjeta)->fetch_assoc())){
					echo("Falló: (".$con->errno.") ". $con->error);
				}

				$idInfoid = $idInfo['id'];
				$idTarjetaid = $idTarjeta['id'];

				$infoBancaria = "INSERT INTO infobancaria (info_id, infotarjeta_id) VALUES ('$idInfoid', '$idTarjetaid') ";
				$vendedor = "INSERT INTO vendedor (usuario_correo,info_id) VALUES ('$correo', '$idInfoid')";

				if(!$con->query($vendedor) || !$con->query($infoBancaria)){
					echo("Falló: (" . $con->errno . ") " . $con->error);
				}
				header('location: login2.php');
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Cuenta | Iniciar Sesion</title>
    <meta charset="utf-8">


    <!--bootstrap-->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <script src="../js/productos.js"></script>
    <script src="../js/scriptp.js"></script>

    <!-- ESTILOS INDIVIDUALES/PERSONALIZADOS   -->
    <link rel="stylesheet" href="../css/login.css">

    <!-- <script src="../js/jquery-3.6.0.js"></script> -->
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/formMultiStep.css">
    <script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/menuPrincipal01.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/formMultiStep.css">
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>
<body>
	<?php require '../assets/navs/headerBase.php'; ?>
	<main class="contenedor">
		<div class="container-fluid" id="grad1">
		    <div class="row justify-content-center mt-0">
		        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
		            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
		                <h2><strong>Registro De Vendedor</strong></h2>
		                <p>Rellena todos los capos y presiona siguiente</p>
		                <div class="row">
		                    <div class="col-md-12 mx-0">

		                        <form id="msform" action="crearCuentaVendedor.php" method="post">
		                            <!-- progressbar -->
		                            <ul id="progressbar">
		                                <li class="active" id="account"><strong>Información</strong></li>
		                                <li id="payment"><strong>Datos Bancarios</strong></li>
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
										<button type="button" name="next" class="btn btn-primary next">Siguiente</button>
		                            </fieldset>

																<fieldset>
		                                <div class="form-card">
		                                    <h2 class="fs-title">Datos Bancarios</h2>
																				<input type="text" name="num" placeholder="Numero de tarjeta (xxxx xxxx xxxx xxxx)" required autocomplete="off" pattern="^[0-9]{15,16}|(([0-9]{4}\s){3}[0-9]{3,4})$">
																				<input type="text" name="exp" placeholder="Fecha de caducidad (dd/aa)" required autocomplete="off" pattern="\d\d/\d\d" style="width: 300px; margin-right:10px ;">
																				<input type="text" name="codigo" placeholder="CVC" required autocomplete="off" pattern="^[0-9]{3,4}" style="width: 100px; ">
											                                </div>
																				<button type="button" name="previous" class="btn btn-secondary previous">Regresar</button>
																				<button type="button" name="next" class="btn btn-primary next">Siguiente</button>
		                            </fieldset>

		                            <fieldset>
		                                <div class="form-card">
	                                    <h2 class="fs-title">Información de Cuenta</h2>
	                                    <div id="caja0"></div>
	                                    <button class="agregar" onclick="agregardir()" style="background-color:rgb(51, 122, 255); border-radius: 5px; color:white; width: 200px; right: 80px; font-family: 'calibri';"><i class="fas fa-plus"></i> Agregar punto de entrega</button>
	                                    <br><br>
																			<input type="email" name="correo" placeholder="Correo Electronico" required autocomplete="off" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
																			<input type="password" name="contrasena" placeholder="Contraseña" required autocomplete="off">
											
		                                </div>
																		<button type="button" name="previous" class="btn btn-secondary previous">Regresar</button>
																		<button type="submit" name="Aceptar" class="btn btn-primary">Aceptar</button>
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



<script type="text/javascript">
	var aux1=0;
	var aux2=1;
	function agregardir(){
		var prueba = document.getElementById("caja" + aux1);
		prueba.innerHTML = "<label>Punto de entrega " + aux2 + "</label><br>"+
		                    "<select name='lista" + aux1 + "' id='lista" + aux1 + "'>"+
		                    "<option value='0'>Seleccione un transporte</option>"+
		                    "<option value='1'>Metro</option>"+
		                    "<option value='2'>Metrobus</option>"+
		                    "<option value='3'>Escuela del IPN</option>"+
		                    "</select>"+
		                    "<br>"+
		                    "<div id='select" + aux2 + "lista'></div>"+
		                    "<br>"+
		                    "<input type='text' name='EstacionReferencia' placeholder='Estacion o Referencia'>"+
		                    "<input type='text' name='dia' placeholder='Dia' style='width:200px;'>"+
		                    "<input type='time' name='hora' placeholder='Hora' style='width:200px; margin-left:10px ;' min='00:00' max='23:59'>"+
		                    "<div id='caja" + aux2 + "'></div>";
		$(document).ready(function(){
			$('#lista0').val(0);
			recargarLista();

			$('#lista0').change(function(){
				recargarLista();
			});

			$('#lista1').val(0);
			recargarLista2();

			$('#lista1').change(function(){
				recargarLista2();
			});

			$('#lista2').val(0);
			recargarLista3();

			$('#lista2').change(function(){
				recargarLista3();
			});
		})
		if (aux1<=1) {
			aux1++;
			aux2++;
		}
	}
</script>

<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"puntos.php",
			data:"trans=" + $('#lista0').val(),
			success:function(r){
				$('#select1lista').html(r);
			}
		});
	}

	function recargarLista2(){
		$.ajax({
			type:"POST",
			url:"puntos2.php",
			data:"trans=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}

	function recargarLista3(){
		$.ajax({
			type:"POST",
			url:"puntos3.php",
			data:"trans=" + $('#lista2').val(),
			success:function(r){
				$('#select3lista').html(r);
			}
		});
	}
</script>
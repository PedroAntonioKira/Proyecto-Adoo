
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  require '../assets/connections/database.php';

	if(isset($_POST['Aceptar'])){
		if(!empty($_POST['nombre']) && !empty($_POST['apellidop']) && !empty($_POST['apellidom']) && !empty($_POST['institucion']) && !empty($_POST['correo']) && !empty($_POST['contrasena'])){
			$nombre = $_POST['nombre'];
			$apellidop = $_POST['apellidop'];
			$apellidom = $_POST['apellidom'];
			$institucion = $_POST['institucion'];
			$contrasena = $_POST['contrasena'];
			$correo = $_POST['correo'];
			// Tarjeta
			$numTarjeta = $_POST['num_tarjeta'];
			$fechaExpiracion ='00/00';
			$codigoTarjetaSeguridad ='111';
			$insertTarjeta = "INSERT INTO `infotarjeta` (`id`, `num`, `exp`, `codigo`,`tipoTarjeta`, `correo_usuario`)
				VALUES (NULL, '$numTarjeta', '$fechaExpiracion', '$codigoTarjetaSeguridad','DEBITO' ,'$correo')";
			$con->query($insertTarjeta);			// Insertamos la tarjeta
			// = = = = = = = == = = = = = =
			$records = "SELECT * FROM usuario WHERE usuario.correo = '$correo'";
			$ejecutar = $con->query($records);
			$datos = $ejecutar->fetch_assoc();
			$hash = md5( rand(0,1000)); // Generate random 32 character hash and assign it to a local variable.

			if($datos != NULL){
				echo("<script type='text/javascript'>alert('Ese correo ya está en uso'); </script>");
			}else{
				$info = "INSERT INTO info (nombre,apellidop,apellidom,institucion) VALUES ('$nombre', '$apellidop', '$apellidom', '$institucion')";
				$usuario = "INSERT INTO `usuario` (`correo`, `contrasena`, `hash`, `estatus`, `privilegios_id`) VALUES ('$correo', '$contrasena', '$hash', 'SIN_VERIFICAR', '3')";
				$vinculo = "SELECT id FROM info WHERE info.nombre = '$nombre' AND info.apellidop = '$apellidop' AND info.apellidom = '$apellidom' AND info.institucion = '$institucion'";
				//Captura de puntos de entrega
				if(!empty($_POST['lista0']) && !empty($_POST['list0'])   && !empty($_POST['EstacionReferencia'])
				&& !empty($_POST['dia'])   && !empty($_POST['hora'])){
					$trans1 = $_POST['lista0'];//Esta variable es la que capturara el tipo de transporte del punto 1
					$lin_inst_1 = $_POST['list0'];//Esta variable es la que capturara la linea o la institucion del IPN del punto 1
					$est_ref_1= $_POST['EstacionReferencia'];//Esta variable es la que capturara la estacion o la referencia del punto de entrega del punto 1
					$dia1 = $_POST['dia'];//Esta variable es la que capturara el dia de entrega del punto 1
					$hora1 = $_POST['hora'];//Esta variable es la que capturara la hora de entrega del punto 1
					$insertPunto1="INSERT INTO `puntos_entrega_vendedor` (`id`, `correo_vendedor`, `dia_entrega`, `hora_entrega`, `Transporte`, `linea_o_Institucion`, `estacion_o_referencia`) VALUES (NULL, '$correo', '$dia1', '$hora1', '$trans1', '$lin_inst_1', '$est_ref_1')";
					if(!$con->query($insertPunto1)){
						echo("Falló: (" . $con->errno . ") " . $con->error);
					}
				}

				if(!empty($_POST['lista1']) && !empty($_POST['list1'])   && !empty($_POST['EstacionReferencia2'])
				&& !empty($_POST['dia2'])   && !empty($_POST['hora2'])){
					$trans2 = $_POST['lista1'];//Esta variable es la que capturara el tipo de transporte del punto 2
					$lin_inst_2 = $_POST['list1'];//Esta variable es la que capturara la linea o la institucion del IPN del punto 2
					$est_ref_2= $_POST['EstacionReferencia2'];//Esta variable es la que capturara la estacion o la referencia del punto de entrega del punto 2
					$dia2 = $_POST['dia2'];//Esta variable es la que capturara el dia de entrega del punto 2
					$hora2 = $_POST['hora2'];//Esta variable es la que capturara la hora de entrega del punto 2
					$insertPunto2="INSERT INTO `puntos_entrega_vendedor` (`id`, `correo_vendedor`, `dia_entrega`, `hora_entrega`, `Transporte`, `linea_o_Institucion`, `estacion_o_referencia`) VALUES (NULL, '$correo', '$dia2', '$hora2', '$trans2', '$lin_inst_2', '$est_ref_2')";
					if(!$con->query($insertPunto2)){
						echo("Falló: (" . $con->errno . ") " . $con->error);
					}
				}

				if(!empty($_POST['lista2']) && !empty($_POST['list2'])   && !empty($_POST['EstacionReferencia3'])
				&& !empty($_POST['dia3'])   && !empty($_POST['hora3'])){
					$trans3 = $_POST['lista2'];//Esta variable es la que capturara el tipo de transporte del punto 1
					$lin_inst_3 = $_POST['list2'];//Esta variable es la que capturara la linea o la institucion del IPN del punto 1
					$est_ref_3= $_POST['EstacionReferencia3'];//Esta variable es la que capturara la estacion o la referencia del punto de entrega del punto 1
					$dia3 = $_POST['dia3'];//Esta variable es la que capturara el dia de entrega del punto 1
					$hora3 = $_POST['hora3'];//Esta variable es la que capturara la hora de entrega del punto 1
					$insertPunto3="INSERT INTO `puntos_entrega_vendedor` (`id`, `correo_vendedor`, `dia_entrega`, `hora_entrega`, `Transporte`, `linea_o_Institucion`, `estacion_o_referencia`) VALUES (NULL, '$correo', '$dia3', '$hora3', '$trans3', '$lin_inst_3', '$est_ref_3')";
					if(!$con->query($insertPunto3)){
						echo("Falló: (" . $con->errno . ") " . $con->error);
					}
				}

				if(!$con->query($info) || !$con->query($usuario)){
					echo("Falló: (".$con->errno.") ". $con->error);
				}

				if(!($vinculoDatos = $con->query($vinculo)->fetch_assoc())){
					echo("Falló: (".$con->errno.") ". $con->error);
				}
				$id = $vinculoDatos['id'];
				$vendedor = "INSERT INTO `vendedor` (`id`, `usuario_correo`, `info_id`) VALUES (NULL, '$correo', '$id')";

				if(!$con->query($vendedor)){
					echo("Falló: (" . $con->errno . ") " . $con->error);
				}

				require 'PHPMailer/Exception.php';
				require 'PHPMailer/PHPMailer.php';
				require 'PHPMailer/SMTP.php';


				//Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
					//Server settings
					$mail->SMTPDebug = 0;                      //Enable verbose debug output
					$mail->isSMTP();                                            //Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					$mail->Username   = 'electroguysescomadoo@gmail.com';                     //SMTP username
					$mail->Password   = 'idaliaadoo';                               //SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
					$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

					//Recipients
					$mail->setFrom('electroguysescomadoo@gmail.com', 'ELECTROGUYS');
					$mail->addAddress($correo,$nombre);     //Add a recipient

					//Content
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'Verificacion de Correo';
					$mail->Body    = '


<body style="margin:0;padding:0;">
	<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
		<tr>
			<td align="center" style="padding:0;">
				<table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
					<tr>
						<td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
							<img src="../img/logo.png" alt="" width="600"/>
						</td>
					</tr>
					<tr>
						<td style="padding:36px 30px 42px 30px;">
							<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
								<tr>
									<td style="padding:0 0 36px 0;color:#153643;">
										<h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Verificando Cuenta</h1>
										<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
										<b style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
										Hola '.$nombre.' gracias por realizar el registro para ser vendedor</b>

										<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
										Solo necesitamos verificar su dirección de correo electrónico antes de que pueda acceder.</p>

										<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
										Verifique su dirección de correo electrónico haciendo click en el siguiente enlace:
											http://localhost/Proyecto-Adoo/html/activarcorreo.php?correo='.$correo.'&hash='.$hash.'
										</p>

										<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
										Te recordamos tus credenciales</p>
										<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Username: '.$nombre.' </p>
										<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Password: '.$contrasena.'</p>
										<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">¡Gracias! te da el equipo de CEG</p>

									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="padding:30px;background:#ee4c50;">
							<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
								<tr>
									<td style="padding:0;width:50%;" align="left">
										<p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
											&reg; Someone, Somewhere 2021<br/><a href="http://www.example.com" style="color:#ffffff;text-decoration:underline;">Unsubscribe</a>
										</p>
									</td>
									<td style="padding:0;width:50%;" align="right">
										<table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
											<tr>
												<td style="padding:0 0 0 10px;width:38px;">
													<a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
												</td>
												<td style="padding:0 0 0 10px;width:38px;">
													<a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
					';


					$mail->Subject = 'Bienvenid@ a nuestra pagina';
					$mail->Body    = '
					<b>Siguenos en nuestras redes

					Thanks for signing up!
					Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

					------------------------
					Username: '.$nombre.'
					Password: '.$contrasena.'
					http://localhost/Proyecto-Adoo/html/activarcorreo.php?correo='.$correo.'&hash='.$hash.'
					------------------------
					</b>';

					$mail->send();
					echo 'Mensaje fue enviado';
				} catch (Exception $e) {
					echo "Mensaje no fue enviado hay un error{$mail->ErrorInfo}";
				}
					header('location: login2.php?alert=1');
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


											<input type="text" name="nombre" placeholder="Nombre(s)" class="form-control validar" required autocomplete="off"
                      pattern="^([a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40})$">
                      <p class="Mensajito">El nombre debe tener entre 1 y 40 letras y no puede contener numeros ni simbolos extraños.<br>
							                             Tampoco debe comenzar ni terminar con un espacio en blanco.</p>


											<input type="text" name="apellidop" placeholder="Apellido Paterno" required autocomplete="off" class="validar"
                      pattern="^([a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40})$">
                      <p class="Mensajito">El apellido paterno debe tener entre 1 y 40 letras por palabra y no puede contener numeros ni simbolos extraños.<br>
							                             Tampoco debe comenzar ni terminar con un espacio en blanco.</p>

											<input type="text" name="apellidom" placeholder="Apellido Materno" required autocomplete="off" class="validar"
                      pattern="^([a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40})$">
                      <p class="Mensajito">El apellido materno debe tener entre 4 y 40 letras y no puede contener numeros ni simbolos extraños.<br>
							                             Tampoco debe comenzar ni terminar con un espacio en blanco.</p>

											<input type="text" name="institucion" placeholder="Institución de procedencia" required autocomplete="off" class="validar"
                      pattern="^([a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40})$">
                      <p class="Mensajito">La institución debe contener entre 1 y 40 letras por palabra y no puede contener numeros ni simbolos extraños.<br>
							                             Tampoco debe comenzar ni terminar con un espacio en blanco.</p>
		                                </div>
										<button type="button" name="next" class="btn btn-primary next">Siguiente</button>
		                            </fieldset>

																<fieldset>
									<div class="form-card">
										<h2 class="fs-title">Datos Bancarios</h2>
										<input type="text" name="num_tarjeta" placeholder="Numero de tarjeta (xxxx xxxx xxxx xxxx)" required autocomplete="off" class="validar"
                    pattern="^[0-9]{15,16}|(([0-9]{4}\s){3}[0-9]{3,4})$">
                    <p class="Mensajito">El numero de trajeta debe tener entre 15 y 16 dijitos <br>
                                         puede ser escrito de corrido o seprandolo por espacios <br>
                                         XXXXXXXXXXXXXXXX O XXXX XXXX XXXX XXXX <br>
                                         no puede comenzar ni terminar con un espacio en blanco</p>
										<!-- <input type="text" name="fecha_expiracion" placeholder="Fecha de caducidad (dd/aa)" required autocomplete="off" class="validar"
                    pattern="\d\d/\d\d" style="width: 300px; margin-right:10px ;">
                    <p class="Mensajito">La fecha de caducidad debe contener: <br>
                                          dos digitos seguido de una diagonal seguido de dos dijitos <br>
                                         dd/aa <br>
                                         no puede iniciar ni terminar con espacios</p>
										<input type="text" name="codigo" placeholder="CVC" required autocomplete="off" class="validar"
                    pattern="^[0-9]{3,4}" style="width: 100px; ">
                    <p class="Mensajito">El numero de seguridad debe ser de entre 3 o 4 digitos unicamente <br></p> -->
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
										<input type="email" name="correo" placeholder="Correo Electronico" required autocomplete="off" class="validar"
                    pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
                    <p class="Mensajito">El correo debe ser escrito con minusculas<br>
                                        asegurate que sea tuyo, no debe poseer espacios</p>

										<input type="password" name="contrasena" placeholder="Contraseña" required autocomplete="off" class="validar"
                    pattern="^(?=.*?[A-ZÀ-ÿ])(?=.*?[a-zÀ-ÿ])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{8,16}$">
                    <p class="Mensajito">La contraseña debe tener al entre 8 y 16 caracteres, <br>
                                         al menos un dígito, al menos una minúscula, al menos una mayúscula.<br>
                                         y al menos un caracter especial (#?!@$%^&*-.)</p>
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

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
// comentario de prueba
			$records = "SELECT * FROM usuario WHERE usuario.correo = '$correo'";
			$ejecutar = $con->query($records);
			$datos = $ejecutar->fetch_assoc();

			if($datos != NULL){
				echo("<script type='text/javascript'>alert('Ese correo ya está en uso'); </script>");
			}else{
				$info = "INSERT INTO info (nombre,apellidop,apellidom,institucion) VALUES ('$nombre', '$apellidop', '$apellidom', '$institucion')";
				$usuario = "INSERT INTO `usuario` (`correo`, `contrasena`, `hash`, `estatus`, `privilegios_id`) VALUES ('$correo', '$contrasena', '', 'VERIFICADO1', '2')";
				$vinculo = "SELECT id FROM info WHERE info.nombre = '$nombre' AND info.apellidop = '$apellidop' AND info.apellidom = '$apellidom' AND info.institucion = '$institucion'";



				if(!$con->query($info) || !$con->query($usuario)){
					echo("Falló: (".$con->errno.") ". $con->error);
				}

				if(!($vinculoDatos = $con->query($vinculo)->fetch_assoc())){
					echo("Falló: (".$con->errno.") ". $con->error);
				}
				$id = $vinculoDatos['id'];
				$comprador = "INSERT INTO `comprador` (`id`, `usuario_correo`, `info_id`) VALUES (NULL, '$correo', '$id')";

				if(!$con->query($comprador)){
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



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/navbar.css">

</head>
<body>

  <?php require '../assets/navs/headerBase.php'; ?>

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
                  <input type="button" name="next" class="next action-button" value="Siguiente" />
                              </fieldset>

                              <fieldset>
                                  <div class="form-card">
                                      <h2 class="fs-title">Información de Cuenta</h2>
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

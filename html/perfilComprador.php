<?php
  session_start();
  require '../assets/connections/database.php';

  if(isset($_SESSION['correo'])){
    $privilegio = $_SESSION['privilegio'];
  }

    

  $nombre = $_SESSION['nombre'];
  $apellidop=$_SESSION['apellidop'];
  $apellidom=$_SESSION['apellidom'];
  $correo=$_SESSION['correo'];
  $contrasena=$_SESSION['contrasena'];
  $id_comprador=$_SESSION['id_comprador'];
  

  if(isset($_GET['actualizacion'])){
  	$nombre1 = $_GET['nombre'];
	  $apellidop1=$_GET['apellidoP'];
	  $apellidom1=$_GET['apellidoM'];
	  $correo1=$_GET['correo'];
	  $contrasena1=$_GET['password'];

	 	
	 	$institucion=$_SESSION['institucion'];

	 	$consulta_id="SELECT info_id FROM comprador WHERE comprador.id ='$id_comprador'";
	  $ejecutar = $con->query($consulta_id);
		$aux= $ejecutar->fetch_array();
		$id=$aux['info_id'];

	  $act1="UPDATE `info` SET `nombre` = '$nombre1', `apellidop` = '$apellidop1', `apellidom` = '$apellidom1', `institucion` = '$institucion' WHERE `info`.`id` = '$id'";
	  $act2="DELETE FROM `usuario` WHERE `usuario`.`correo` = '$correo'";
	  $act3="INSERT INTO `usuario` (`correo`, `contrasena`, `hash`, `estatus`, `privilegios_id`) VALUES ('$correo1', '$contrasena1', '', 'VERIFICADO', '2')";
	  $act4="DELETE FROM `comprador` WHERE `comprador`.`id` = $id_comprador";
	  $act5= "INSERT INTO `comprador` (`id`, `usuario_correo`, `info_id`) VALUES ($id_comprador, '$correo1', '$id')";
	  
	  if(!$con->query($act1)||!$con->query($act2)||!$con->query($act3)||!$con->query($act4)||!$con->query($act5)){
					echo("Falló: (".$con->errno.") ". $con->error);
		}

		$_SESSION['nombre']=$nombre1;
	 	$_SESSION['apellidop']=$apellidop1;
	 	$_SESSION['apellidom']=$apellidom1;
	 	$_SESSION['correo']=$correo1;
	 	$_SESSION['contrasena']=$contrasena1;
		  
	  //print_r($_SESSION);
  }
    

  
  /*echo $nombre;
  echo "<br>";
  echo $apellidop;
  echo "<br>";
  echo $apellidom;*/
?>
<!DOCTYPE html>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	      <title>Perfil Comprador</title>
	    <meta charset="utf-8">
	    <!--Links del filtrador-->
	    <link rel="stylesheet" href="../css/estilosFiltrador.css">
	    

	    <!--Estilos del formulario-->
	    
	    <link rel="stylesheet" href="../css/menuPerfil2.css">
	    <link rel="stylesheet" href="../css/formMultiStep.css">
	    <link rel="stylesheet" href="../css/formularioRegistro.css">
	    <script type="text/javascript" src="../js/formularioRegistro.js" ></script>
	    <script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	  	<script src="../js/jquery-3.6.0.js"></script>
			

	    <!-- HEADER AND FOOTER -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
	    <link rel="stylesheet" href="../css/navbar.css">
	</head>
	<body>
	  <?php
			if($privilegio == NULL){
				require '../assets/navs/headerBase.php';
			}					
			else{
				require '../assets/navs/headerComprador.php';
			}
			
			// echo $_SESSION['privilegio'];
		?>

	  <main class="contenedor">
		<div class="principal">
		<div id="menuPerfil" class="menu-collapsed">
			<div id="header">
				<div id="menu-btn" style="width:45px;">
					<div class="btn-hamburger"></div>
					<div class="btn-hamburger"></div>
					<div class="btn-hamburger"></div>
				</div>
				<div id="title">
					<span>Perfil Comprador</span>
				</div>
			</div>	

			<div id="profile">
				<div id="photo">
					<img src="../img/usuario.png">
				</div>

				<div id="name">
					<span>Adrian Castañeda</span>
				</div>
			</div>


			<div id="menu-items">
				<div class="item">
					<a href="#">
						<div class="icon"><i class="fas fa-list-ul"></i></div>
						<div class="title"><span>Compras</span></div>
					</a>
				</div>

				<div class="item separador">
					
				</div>	

				<div class="item">
					<a href="#">
						<div class="icon"><i class="fas fa-comments"></i> </div>
						<div class="title"><span>Conversaciones</span></div>
					</a>
				</div>

				<div class="item separador">
					
				</div>	

				<div class="item">
					<a href="#">
						<div class="icon"><i class="fas fa-question"></i> </div>
						<div class="title"><span>Preguntas a productos</span></div>
					</a>
				</div>

				<div class="item separador">
					
				</div>	

				<div class="item">
					<button id="configurar">
						<div class="icon"><i class="fa fa-gear"></i> </div>
						<div class="title"><span>Configurar Perfil</span></div>
					</button>
				</div>

				<div class="item separador">
					
				</div>	

				

				<div class="item separador">
					
				</div>	

				<div class="item">
					<a href="#">
						<div class="icon"><i class="fa fa-star"></i> </div>
						<div class="title"><span>Puntuacion como comprador</span></div>
					</a>
				</div>

				<div class="item separador">
					
				</div>	

				<div class="item">
					<a href="#" style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; height:50px;">
						<div class="icon"><i class="fa fa-power-off"></i> </div>
						<div class="title"><span>cerrar sesion</span></div>
					</a>
				</div>

			</div>
		</div>

		<div id="contenedor" class="main_container_ocul">
			<section class="configurar_datos" id="datos">
				<h1>Editar Datos</h1>

				<form action="" class="formulario" id="formulario" method="get">

					<!-- Grupo Nombre -->
					<div class="formulario__grupo" id="grupo__nombres">
						<h3 style="color:#50A2C3; margin-left:30px;">Nombre</h3>
						<label for="usuario" class="formulario__label"> Nombre(s) </label><label for="apellidoP" class="formulario__label"> Apellido Paterno </label><br>
						
						<input type="text" name="nombre" class="formulario__input" id="usuario" value="<?php echo $_SESSION['nombre'] ?>"><input type="text" name="apellidoP" class="formulario__input" id="apellidoP" value="<?php echo $_SESSION['apellidop'] ?>">
							
						<label for="apellidoM" class="formulario__label"> Apellido Materno </label><br>
						<input type="text" name="apellidoM" class="formulario__input" id="apellidoM" value="<?php echo $_SESSION['apellidom'] ?>">
					</div>

					<div class="formulario__grupo" id="grupo__telefono">
						<br>
						<h3 style="color:#50A2C3; margin-left:30px;">Datos</h3>
						<label for="correo" class="formulario__label"> Correo </label><label for="password" class="formulario__label"> Contraseña </label><br>
						<input type="text" name="correo" class="formulario__input" id="correo" value="<?php echo $_SESSION['correo'] ?>">
		        <input type="password" id="contrasena" class="formulario_input_pass" name="contrasena" value="<?php echo $_SESSION['contrasena'] ?>" required autocomplete="off" ><button id="contrasena" class="formulario_input_eye" onclick="mostrarPassword()"><span class="fa fa-eye-slash icono"></span></button>
		       </div>

					

					<br>
					<div class="formulario__grupo-btn-enviar">
						<button type="submit" class="formulario__btn2" name="actualizacion" id="actualizacion" value="actualizar"> Actualizar </button>
					</div>

				</form>
			</section>
		</div>
	
		
	</div>
	</main>

	  
	  <?php require '../assets/navs/footer.php'; ?>
	</body>
  
</html>

<script>
	const btn=document.querySelector('#menu-btn');
	const menu=document.querySelector('#menuPerfil');
	const contenedor=document.querySelector('#contenedor');
	btn.addEventListener('click', e =>{
	menu.classList.toggle("menu-collapsed");
	menu.classList.toggle("menu-expanded");
	contenedor.classList.toggle("main_container");
	contenedor.classList.toggle("main_container_ocul");
	
	document,querySelector('body').classList.toggle('body-expanded');
	});
</script>

<script>
  function mostrarPassword(){
    var cambio = document.getElementById("contrasena");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icono').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icono').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
</script>

<!-- <script>
	const config=document.querySelector('#configurar');
	const datos=document.querySelector('#datos');
	config.addEventListener('click', e =>{
	datos.classList.toggle("configurar_datos_ocul");
	datos.classList.toggle("configurar_datos");
	});
</script> -->
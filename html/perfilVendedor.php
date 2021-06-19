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

  if(isset($_POST['actualizar'])){
  	$nombre1 = $_POST['nombre'];
	  $apellidop1=$_POST['apellidop'];
	  $apellidom1=$_POST['apellidom'];
	  $correo1=$_POST['correo'];
	  $contrasena1=$_POST['contrasena'];
	 	$id_comprador=$_SESSION['id_vendedor'];

	  $actualiza="UPDATE `info` SET `id` = '$id_vendedor', `nombre` = '$nombre1', `apellidop` = '$apellidoP', `apellidom` = '$apellidoM', `institucion` = '$nombre1' WHERE `info`.`id` = '$id_vendedor' ";

	  print_r($_SESSION);
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
	      <title>Perfil Vendedor</title>
	    <meta charset="utf-8">
	    <!--Links del filtrador-->
	    <link rel="stylesheet" href="../css/estilosFiltrador.css">
	    

	    <!--Estilos del formulario-->
	    
	    <link rel="stylesheet" href="../css/menuPerfil.css">
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
	    if($_SESSION == NULL){
	      require '../assets/navs/headerBase.php';
	    }
	    elseif($_SESSION['privilegio'] == 'Vendedor'){
	      require '../assets/navs/headerVendedor.php';
	    }
	  ?>

	  <main class="contenedor">
	  	<!--<div class="header" style="border-style:solid;width:20%; right:90%; background:white;">
	  		<div id="title" class="fas fa-bars">
						<span>Perfil Vendedor</span>
						<div class="item">
							<a href="#">
								<div class="icon"><i class="fas fa-plus"></i></div>
								<div class="title"><span>Agregar Producto</span></div>
							</a>
						</div>
				</div>
			</div>	
	  	</div>-->

		<div class="prin">
			<div id="menuPerfil" class="menu-expanded">
				<div id="header">
					<div id="menu-btn">
						<div class="btn-hamburger"></div>
						<div class="btn-hamburger"></div>
						<div class="btn-hamburger"></div>
					</div>
					<div id="title">
						<span>Perfil Vendedor</span>
					</div>
				</div>	

				<div id="profile">
					<div id="photo">
						<img src="../img/vendedor1.png">
					</div>

					<div id="name">
						<span>Eliel Josue Guerra</span>
					</div>
				</div>


				<div id="menu-items">
					<div class="item">
						<a href="#">
							<div class="icon"><i class="fas fa-plus"></i></div>
							<div class="title"><span>Agregar Producto</span></div>
						</a>
					</div>

					<div class="item separador">
						
					</div>	
					<div class="item">
						<a href="#">
							<div class="icon"><i class="fas fa-list-ul"></i></div>
							<div class="title"><span>Ventas</span></div>
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
							<div class="title"><span>Preguntas sobre productos</span></div>
						</a>
					</div>

					<div class="item separador">
						
					</div>	

					<div class="item">
						<a href="#">
							<div class="icon"><i class="fa fa-gear"></i> </div>
							<div class="title"><span>Configurar Perfil</span></div>
						</a>
					</div>

					<div class="item separador">
						
					</div>	

					<div class="item">
						<a href="#">
							<div class="icon"><i class="fa fa-location-arrow"></i> </div>
							<div class="title"><span>Puntos de entregas recurrentes</span></div>
						</a>
					</div>

					<div class="item separador">
						
					</div>	

					<div class="item">
						<a href="#">
							<div class="icon"><i class="fa fa-star"></i> </div>
							<div class="title"><span>Puntuacion como vendedor</span></div>
						</a>
					</div>

					<div class="item separador">
						
					</div>	

					<div class="item">
						<a href="#">
							<div class="icon"><i class="fa fa-power-off"></i> </div>
							<div class="title"><span>cerrar sesion</span></div>
						</a>
					</div>

				</div>
			</div>

			<div id="main-container">
				<section class="">
				<h1>Editar Datos</h1>

				<form action="" class="formulario" id="formulario">

					<!-- Grupo Nombre -->
					<div class="formulario__grupo" id="grupo__nombres">
						<label for="usuario" class="formulario__label"> Nombre(s) </label><label for="apellidoP" class="formulario__label"> Apellido Paterno </label><br>
						
						<input type="text" name="nombre" class="formulario__input" id="usuario" value="<?php echo $_SESSION['nombre'] ?>"><input type="text" name="apellidoP" class="formulario__input" id="apellidoP" value="<?php echo $_SESSION['apellidop'] ?>">
							
						<label for="apellidoM" class="formulario__label"> Apellido Materno </label><br>
						<input type="text" name="apellidoM" class="formulario__input" id="apellidoM" value="<?php echo $_SESSION['apellidom'] ?>">
					</div>

					<div class="formulario__grupo" id="grupo__telefono">
						
						<label for="correo" class="formulario__label"> Correo </label><label for="password" class="formulario__label"> Contraseña </label><br>
						<input type="text" name="correo" class="formulario__input" id="correo" placeholder="<?php echo $_SESSION['correo'] ?>">
						<input type="password" name="password" class="formulario__input" id="password" value="<?php echo $_SESSION['contrasena'] ?>">
					</div>

					<!-- Grupo Contraseña -->
					<div class="formulario__grupo" id="grupo__password">
						
						
					</div>
					<br>
					<div class="formulario__grupo-btn-enviar">
						<button type="submit" class="formulario__btn" name="actualizar"> Actualizar </button>
					</div>

				</form>
			</section>
			
			<script type="text/javascript" src="../js/menuPrincipal01.js"></script>
			</div>
			<div class="item separador">
						
			</div>	
		
			<script>
				const btn=document.querySelector('#menu-btn');
				const menu=document.querySelector('#menuPerfil');
				btn.addEventListener('click', e =>{
					menu.classList.toggle("menu-expanded");
					menu.classList.toggle("menu-collapsed");

					document,querySelector('body').classList.toggle('body-expanded');
				});
			</script>
		</div>
		</main>

	  
	  <?php require '../assets/navs/footer.php'; ?>
	</body>
  
</html>

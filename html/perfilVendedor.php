<?php
  session_start();
  require '../assets/connections/database.php';

  if(isset($_SESSION['correo'])){
    $privilegio = $_SESSION['privilegio'];
  }

  $nombre = $_SESSION['nombre'];
  $apellidop=$_SESSION['apellidop'];
  $apellidom=$_SESSION['apellidom'];

  echo $nombre;
  echo "<br>";
  echo $apellidop;
  echo "<br>";
  echo $apellidom;
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

	    <script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
	  	<script type="text/javascript" src="../js/menuPrincipal01.js"></script>
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
	    elseif($_SESSION['privilegio'] == 'Vendedor'){
	      require '../assets/navs/headerVendedor.php';
	    }
	  ?>

	  <main class="contenedor">
		<div id="prin">
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
				Realiza Tu primer Venta
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

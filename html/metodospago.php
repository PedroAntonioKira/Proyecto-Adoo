<?php
  session_start();
	require '../assets/connections/database.php';
	

	

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}

	$correo=$_SESSION['correo'];
	$id_comprador=$_SESSION['id_comprador'];

	$consulta_id="SELECT info_id FROM comprador WHERE comprador.id ='$id_comprador'";
  $ejecutar = $con->query($consulta_id);
	$aux= $ejecutar->fetch_array();
	$id=$aux['info_id'];

  if(isset($_POST['guardar'])){
  	if(!empty($_POST['Nombre1'])      && !empty($_POST['ApellidoP1']) && !empty($_POST['ApellidoM1']) && !empty($_POST['tipo1'])   
  	&& !empty($_POST['num_tarjeta1']) && !empty($_POST['fecha_exp1']) && !empty($_POST['cvc1'])){
	  	$nombre1=$_POST['Nombre1'];
		  $apellidop1=$_POST['ApellidoP1'];
		  $apellidom1=   $_POST['ApellidoM1'];
		  $tipo1=        $_POST['tipo1'];
		  $num_tarjeta1= $_POST['num_tarjeta1'];
		  $fecha_exp1=   $_POST['fecha_exp1'];
		  $cvc1=         $_POST['cvc1'];

		  
			$guardar1="INSERT INTO `infotarjeta` (`id`, `num`, `exp`, `codigo`, `correo_usuario`, `nombre_titular`, `paterno_titular`, 
      `materno_titular`) VALUES (NULL, '$num_tarjeta1', '$fecha_exp1', '$cvc1', '$correo', '$nombre1', '$apellidop1', '$apellidom1')";
      $ejecutar1 = $con->query($guardar1);

      $consulta="SELECT id FROM infotarjeta WHERE num='$num_tarjeta1' AND exp='$fecha_exp1' AND codigo='$cvc1' AND correo_usuario='$correo' AND nombre_titular='$nombre1'";
      
      //echo $consulta;

			$ejecutar3 = $con->query($consulta);
			$aux1= $ejecutar3->fetch_assoc();
			print_r($ejecutar3);
			print_r($aux1);
			$id_tarjeta=$aux1['id'];
			$guardar2="INSERT INTO `infobancaria` (`idinfobancaria`, `info_id`, `infotarjeta_id`, `tipo_tarjeta`) VALUES (NULL, '$id', '$id_tarjeta', '$tipo1')";

			$ejecutar2 = $con->query($guardar2);
			 header('location:metodospago.php?confirmacion=1');
		}

		

		// if(!empty($_POST['nombre2'])      && !empty($_POST['apellidop2']) && !empty($_POST['apellidom2']) && !empty($_POST['tipo2'])   
  // 	&& !empty($_POST['num_tarjeta2']) && !empty($_POST['fecha_exp2']) && !empty($_POST['cvc2'])){
	 //  	$nombre2 =     $_POST['nombre2'];
		//   $apellidop2=   $_POST['apellidop2'];
		//   $apellidom2=   $_POST['apellidom2'];
		//   $tipo2=        $_POST['tipo2'];
		//   $num_tarjeta2= $_POST['num_tarjeta2'];
		//   $fecha_exp2=   $_POST['fecha_exp2'];
		//   $cvc2=         $_POST['cvc2'];


		// 	$consulta2="SELECT id FROM infotarjeta WHERE infotarjeta.correo_usuario ='$correo'";
		//   $ejecutar2 = $con->query($consulta2);
		// 	$aux2= $ejecutar2->fetch_array();
		// 	$id_tarjeta2=$aux2['id'];


	  
		// 	$guardar3="INSERT INTO `infotarjeta` (`id`, `num`, `exp`, `codigo`, `correo_usuario`, `nombre_titular`, `paterno_titular`, 
  //     `materno_titular`) VALUES (NULL, '$num_tarjeta2', '$fecha_exp2', '$cvc2', '$correo', '$nombre2', '$apellidop2', '$apellidom2')";
  //     $guardar4="INSERT INTO `infobancaria` (`idinfobancaria`, `info_id`, `infotarjeta_id`, `tipo_tarjeta`) VALUES (NULL, '$id', 'id_tarjeta2', '$tipo2')";
		// }
  }

  if(isset($_GET['confirmacion'])){
    $mensaje = "<div class='alert alert-success'>Operacion Exitosa:Se ha registrado metodo de pago</div>";
  }
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
	    if($_SESSION == NULL){
	        header('location:./login.php'); 
	        //require '../assets/navs/headerBase.php';
	    }
	    elseif($_SESSION['privilegio'] == 'Comprador'){
	        require '../assets/navs/headerComprador.php';
	    }
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
					<button id="configurar">
						<div class="icon"><i class="far fa-money-bill-alt"></i></div>
						<div class="title"><span>Metodos de pago</span></div>
					</button>
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
					<a href="perfilComprador.php" id="configurar">
						<div class="icon"><i class="fa fa-gear"></i> </div>
						<div class="title"><span>Configurar Perfil</span></div>
					</a>
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
			<?php 
					if(isset($mensaje)){
						echo($mensaje);
					}

			?>
			<section class="configurar_datos" id="datos">
				<h1 style="color:#007580;">Metodos de pago</h1>
				<form action="metodospago.php" class="formulario" id="formulario" method="post">
					<label style='size:25px; margin-left:60px; color:#2980B9; text-align: center;'><h2>Metodo de pago 1</h2></label><br>
		      <label style='size:15px; margin-left:60px;color:#2C3E50 ;'>Nombre del titular</label><br>
		      <input required type='text' name='Nombre1' class='formulario_input validacion' id='Nombre1' value='<?php echo $_SESSION['nombre'] ?>' pattern="^([a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}|[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40}\s[a-zA-ZÀ-ÿ]{1,40})$" >
		      <p class="mensajerr" style="width:30%;">El nombre debe tener entre 1 y 40 letras y no puede contener numeros ni simbolos extraños.<br>
                                                           Tampoco debe comenzar ni terminar con un espacio en blanco.</p>
		      <input required type='text' name='ApellidoP1' class='formulario_input' id='ApellidoP1' value='<?php echo $_SESSION['apellidop'] ?>'>
		      <input required type='text' name='ApellidoM1' class='formulario_input' id='ApellidoM1' value='<?php echo $_SESSION['apellidom'] ?>'>
		      <label style='size:20px; margin-left:60px;color:#007589 ;'>Datos de Tarjeta</label><br>
		      <label style='size:15px; margin-left:80px;color:#2C3E50 ; width: 30%;'>Tipo</label>
		      <label style='size:15px; margin-left:30px;color:#2C3E50 ; width: 30%;'>Numero de Tarjeta</label>
		      <select class="formulario_input">
		      	<option value="Debito">Debito</option>
		      	<option value="Credito">Credito</option>
		      </select>
		      <input required type='text' name='num_tarjeta1'class='formulario_input' id='num_tarjeta1' placeholder='XXXX-XXXX-XXXX-XXXX'>
		      <br>
		      <label style='size:15px; margin-left:80px;color:#2C3E50 ; width: 30%;'>CVC</label>
		      <label style='size:15px; margin-left:30px;color:#2C3E50 ; width: 30%;'>Fecha de expiracion</label>
		      <input required type='text' name='fecha_exp1'class='formulario_input' id='fecha_exp1' placeholder='MM/AA'>
		      <input required type='text' name='cvc1' class='formulario_input' id='cvc1' placeholder='XXX'>
		      
					<div id="caja1"></div>
					<div>
	        	<!-- <a class="agregar" href="#" role="button" id="agregar" style="margin-top: 50px; margin-left:50px; height: 40px; width: 28%; padding:5px;"><i class="fas fa-plus" style="padding: 3px;" ></i> Agregar punto de entrega</a> -->
	        	<button type="submit" class="guardar_metodo" id="guardar_metodo" name="guardar" value="guardar" style="margin-bottom:20%; margin-left:50px;"><i class="fas fa-save" style="margin:5px;"></i>Guardar Tarjeta(s)</button>
	      	</div>


					<br>
					
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

<!-- <script>
	var aux1=1;
	var aux2=2;
	var btn_agregar=document.getElementById("agregar");

	btn_agregar.onclick=function(e){
		var prueba = document.getElementById("caja" + aux1);
		prueba.innerHTML =  
			"<label style='size:25px; margin-left:60px; color:#2980B9; text-align: center;'><h2>Metodo de pago " + aux2 + "</h2></label><br>"+
      "<label style='size:15px; margin-left:60px;color:#2C3E50 ;'>Nombre del titular</label><br>"+
      "<input type='text' name='Nombre" + aux2 + "' class='formulario_input' id='Nombre" + aux2 + "' value='<?php echo $_SESSION['nombre'] ?>'>"+
      "<input type='text' name='ApellidoP" + aux2 + "' class='formulario_input' id='ApellidoP" + aux2 +"' value='<?php echo $_SESSION['apellidop'] ?>'>"+
      "<input type='text' name='ApellidoM" + aux2 + "' class='formulario_input' id='ApellidoM" + aux2 + "' value='<?php echo $_SESSION['apellidom'] ?>'>"+
      "<label style='size:15px; margin-left:60px;color:#2C3E50 ;'>Numero de Tarjeta</label><br>"+
      "<input type='text' name='tipo" + aux2 + "'class='formulario_input' id='tipo" + aux2 + "' placeholder='Debito/Credito'>"+
      "<input type='text' name='num_tarjeta" + aux2 + "'class='formulario_input' id='num_tarjeta" + aux2 + "' placeholder='XXXX-XXXX-XXXX-XXXX'>"+
      "<input type='text' name='fecha_exp" + aux2 + "'class='formulario_input' id='fecha_exp" + aux2 + "' placeholder='MM/AA'>"+
      "<input type='text' name='cvc" + aux2 + "' class='formulario_input' id='cvc" + aux2 + "' placeholder='XXX'>"+
      "<input type='text' name='correo" + aux2 + "'class='formulario_input' id='correo" + aux2 + "' placeholder='correo@dominio.com'><br>"+"<div id='caja" + aux2 + "'></div>";
     }
</script> -->
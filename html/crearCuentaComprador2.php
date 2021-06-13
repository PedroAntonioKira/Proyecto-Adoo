<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	    <title>Cuenta | Registro</title>
		<meta charset="utf-8">

		<!--Estilos del formulario-->
		

		<script src="../js/jquery-3.6.0.js"></script>
		<script src="../js/main.js"></script>

		<!-- HEADER AND FOOTER -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
		<link rel="stylesheet" href="../css/navbar.css">

		<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">

		<!--Estilos del formulario de registro-->
		<link rel="stylesheet" href="../css/formularioRegistro.css">

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
	<div class="prin">
		<main class="contenedor">
			<section class="form-register">
				<h1>Formulario Registro Comprador</h1>

				<form action="" class="formulario" id="formulario">

					<!-- Grupo Nombre -->
					<div class="formulario__grupo" id="grupo__nombres">
						<label for="usuario" class="formulario__label"> Nombre(s) </label>
						<div class="formulario__grupo-input">
							<input type="text" name="nombres" class="formulario__input" id="usuario" placeholder="Ingrese aqui su(s) nombre(s) por favor">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">
							El nombre debe tener entre 4 y 40 letras y no puede contener numeros ni simbolos extraños. <br>
							Ademas solo se permite hasta un maximo de dos nombres. <br> 
							Tampoco debe comenzar ni terminar con un espacio en blanco.
						</p>
					</div>


					<!-- Grupo Apellido Paterno -->
					<div class="formulario__grupo" id="grupo__apellidoP">
						<label for="apellidoP" class="formulario__label"> Apellido Paterno </label>
						<div class="formulario__grupo-input">
							<input type="text" name="apellidoPat" class="formulario__input" id="apellidoP" placeholder="Ingrese aqui su Apellido Paterno por favor">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">
							El Apellido Paterno debe tener entre 4 y 20 letras y no puede contener numeros ni simbolos extraños. 
						</p>
					</div>


					<!-- Grupo Apellido Materno -->
					<div class="formulario__grupo" id="grupo__apellidoM">
						<label for="apellidoM" class="formulario__label"> Apellido Materno </label>
						<div class="formulario__grupo-input">
							<input type="text" name="apellidoMat" class="formulario__input" id="apellidoM" placeholder="Ingrese aqui su Apellido Materno por favor">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">
							El Apellido Materno debe tener entre 4 y 20 letras y no puede contener numeros ni simbolos extraños. 
						</p>
					</div>

					<!-- Grupo Telefono -->
					<div class="formulario__grupo" id="grupo__telefono">
						<label for="telefono" class="formulario__label"> Telefono</label>
						<div class="formulario__grupo-input">
							<input type="text" name="telefono" class="formulario__input" id="telefono" placeholder="Ejemplo: 4491234567">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">
							Ingrese unicamente los 10 digitos de su telefono. 
						</p>
					</div>


					<!-- Grupo Correo -->
					<div class="formulario__grupo" id="grupo__correo">
						<label for="correo" class="formulario__label"> Correo </label>
						<div class="formulario__grupo-input">
							<input type="email" name="correo" class="formulario__input" id="correo" placeholder="correo@dominio.com">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">
							El correo debe estar bien escrito, como en el ejemplo, debe ser personal. 
						</p>
					</div>


					<!-- Grupo Repetir Correo -->
					<div class="formulario__grupo" id="grupo__repetir-correo">
						<label for="repetir-correo" class="formulario__label"> Repetir Correo</label>
						<div class="formulario__grupo-input">
							<input type="email" name="correo2" class="formulario__input" id="repetir-correo" placeholder="correo@dominio.com">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">
							Ambos correos electronicos deben ser iguales. 
						</p>
					</div>


					<!-- Grupo Contraseña -->
					<div class="formulario__grupo" id="grupo__password">
						<label for="password" class="formulario__label"> Contraseña </label>
						<div class="formulario__grupo-input">
							<input type="password" name="password" class="formulario__input" id="password" >
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">
							La Contraseña debe de ser de 4 a 20 caracteres.
						</p>
					</div>


					<!-- Grupo Repetir Contraseña -->
					<div class="formulario__grupo" id="grupo__repetir-password">
						<label for="repetir-password" class="formulario__label"> Repetir Contraseña </label>
						<div class="formulario__grupo-input">
							<input type="password" name="password2" class="formulario__input" id="repetir-password">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">
							Ambas contraseñas deben de ser iguales. 
						</p>
					</div>

					<!-- Grupo para terminos y condiciones-->
					<div class="formulario__grupo-terminos" id="formulario__grupo-terminos">
						<label class="formulario__label">
							<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
							Acepto los terminos y condiciones.
						</label>
					</div>

					<div class="formulario__mensaje" id="formulario__mensaje">
						<p>
							<i class="fas fa-skull-crossbones"></i>	
							<b> Error: </b> Por Favor Rellene El Formulario Correctamente
						</p>
					</div>

					<!-- Grupo para el boton-->

					<div class="formulario__grupo-btn-enviar">
						<button type="submit" class="formulario__btn"> Registrar </button>
						
						<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">
							¡Ha Completado el registro de manera Exitosa! <br> Felicidades <br>
							Si desea iniciar sesion ahora <a href="inicioVendedor.html"> Presione aqui. </a> <br>
							Si desea ir a la pagina principal ahora <a href="../index.html"> Presione aqui. </a>
							Si desea buscar un producto ahora <a href="crearCuentaVendedor.html"> Presione aqui. </a>
						</p>
					</div>

				</form>
			</section>
			<script type="text/javascript" src="../js/formularioRegistro.js" ></script>
		</main>
	</div>
	
	<script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/menuPrincipal01.js"></script>

  <?php require '../assets/navs/footer.php'; ?>
</body>
	
</html>

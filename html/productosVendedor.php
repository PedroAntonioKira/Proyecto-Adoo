<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	// else
    // {
    //     session_destroy();
    //     session_start(); 
    // }
?>	

<!DOCTYPE html>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Mis Productos</title>
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
	<link rel="stylesheet" href="../css/recompra.css">

	<script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/main.js"></script>

    <script src="../js/admin_messages.js"></script>

</head>
<body>

	<header>

		<div class="centrar_menu">
				
			<div class="cabecera_izquierda logo">
				<img src="../img/logo.png">
			</div>

			<div class="cabecera_derecha">
				<nav class="menu_Navegacion" id="menu_Navegacion">

					<div class="contenedor_grid ">
						<div class="grid " id="grid">
							<div class="categorias">
								<button class="regresar" id="regresar01"> <i class="fas fa-caret-left"> Regresar </i></button>

								<h3 class="subtitulo"> Categorias </h3>

								<div class="conector_Arriba activo"> <i class="fas fa-sort-up"></i> </div>

								<a href="#" data-categoria="equipo-de-computo">Computo <i class="fas fa-caret-right"></i></a>

								<a href="#" data-categoria="equipo-de-telefonia">Telefonia <i class="fas fa-caret-right"></i></a>

								<a href="#" data-categoria="equipo-de-electronica">Electronica <i class="fas fa-caret-right"></i></a>

								<a href="#" data-categoria="equipo-de-medicion">Medición <i class="fas fa-caret-right"></i></a>

								<a href="#" data-categoria="refacciones">Refacciones <i class="fas fa-caret-right"></i></a>

							</div>

							<div class="contenedor-Subcategorias " id="contenedor-Subcategorias">

								<div class="subcategorias activo" data-categoria="equipo-de-computo">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar02"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Computo </h3>
										<a href="#">Lenovo</a>
										<a href="#">Asus</a>
										<a href="#">HP</a>
										<a href="#">Samsung</a>
										<a href="#">MacBook</a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/computadora-banner01.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/computadora-galeria01.jpeg">
										</a>
										<a href="#">
											<img src="../img/computadora-galeria02.jpeg">
										</a>
										<a href="#">
											<img src="../img/computadora-galeria03.png">
										</a>
										<a href="#">
											<img src="../img/computadora-galeria04.jpeg">
										</a>
									</div>

								</div>

								<div class="subcategorias " data-categoria="equipo-de-telefonia">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar03"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Telefonía </h3>
										<a href="#">Apple</a>
										<a href="#">Zte</a>
										<a href="#">Xioami</a>
										<a href="#">Samsung</a>
										<a href="#">Huawei</a>
										<a href="#">Motorola</a>
										<a href="#">Nokia</a>
										<a href="#">Alcatel</a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/celular-banner001.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/celular-galeria04.jpeg">
										</a>
										<a href="#">
											<img src="../img/celular-galeria02.png">
										</a>
										<a href="#">
											<img src="../img/celular-galeria03.jpeg">
										</a>
										<a href="#">
											<img src="../img/celular-galeria01.jpeg">
										</a>
									</div>

								</div>

								<div class="subcategorias " data-categoria="equipo-de-electronica">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar04"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Electronica </h3>
										<a href="#">Cableado</a>
										<a href="#">Resistencias</a>
										<a href="#">Diodos</a>
										<a href="#">Transistores</a>
										<a href="#">Transformadores</a>
										<a href="#">Compuertas</a>
										<a href="#">Protoboard</a>
										<a href="#">Interruptores</a>
										<a href="#">Inductores</a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/circuitos-banner01.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/circuitos-galeria01.jpeg">
										</a>
										<a href="#">
											<img src="../img/circuitos-galeria02.jpeg">
										</a>
										<a href="#">
											<img src="../img/circuitos-galeria03.jpeg">
										</a>
										<a href="#">
											<img src="../img/circuitos-galeria04.jpeg">
										</a>
									</div>

								</div>

								<div class="subcategorias " data-categoria="equipo-de-medicion">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar05"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Medición </h3>
										<a href="#"> Metro </a>
										<a href="#"> Multimetro </a>
										<a href="#"> Osciloscopio </a>
										<a href="#"> Fuentes</a>
										<a href="#"> Generadores</a>
										<a href="#"> Termometros</a>
										<a href="#"> Comprobadores</a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/medicion-banner01.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/medicion-galeria01.jpeg">
										</a>
										<a href="#">
											<img src="../img/medicion-galeria02.jpeg">
										</a>
										<a href="#">
											<img src="../img/medicion-galeria03.jpeg">
										</a>
										<a href="#">
											<img src="../img/medicion-galeria04.jpeg">
										</a>
									</div>

								</div>

								<div class="subcategorias " data-categoria="refacciones">
									<div class="enlaces-categoria">
										<button class="regresar" id="regresar06"> <i class="fas fa-caret-left"> Regresar </i></button>
										<h3 class="subtitulo"> Refacciones </h3>
										<a href="#"> De Computo </a>
										<a href="#"> De Telefonia </a>
										<a href="#"> De dispositivo </a>
										<a href="#"> De algun Otro </a>
									</div>

									<div class="banner-categoria">
										<a href="#">
											<img src="../img/refaccion-banner01.jpeg">
										</a>
									</div>

									<div class="galeria-categoria">
										<a href="#">
											<img src="../img/refaccion-galeria01.jpeg">
										</a>
										<a href="#">
											<img src="../img/refaccion-galeria02.jpeg">
										</a>
										<a href="#">
											<img src="../img/refaccion-galeria03.webp">
										</a>
										<a href="#">
											<img src="../img/refaccion-galeria04.jpeg">
										</a>
									</div>

								</div>

							</div>
						</div>
					</div>

					<div class="opciones_menu contenedor02 ">
						<ul>
							<li> <a href="../index.html"> <i class="fas fa-house-user"></i> Inicio  </a> </li>

							<li> <a href="#" class="boton_categorias" id="boton_categorias"> Categorias <i class="fas fa-caret-down"></i> </a> </li>

							<li> <a href="tipoDeCuenta.html"> <i class="fas fa-male"></i> Mi Cuenta </a> </li>

							<li> <a href="carrito.html"> <i class="fas fa-shopping-cart"></i>Carrito </a> </li>

							<li> <a href="search.html"> Buscador <i class="fas fa-search-dollar"></i> </a> </li>
						</ul>

					</div>

					<div class="botones_menu contenedor02">
						
						<button id="btn_menu_barras" class="btn_menu_barras">
							<i class="fas fa-bars"></i> 
						</button>

						<button id="btn_menu_cerrar" class="btn_menu_cerrar">
							<i class="fas fa-times-circle"></i> 
						</button>
					</div>

				</nav>
			</div>

		</div>

		

	</header>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar el producto "Nombre Producto" con id "ID Producto"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="liveToastBtn" onclick="mostrarToast()" data-bs-dismiss="modal">Eliminar</button>
            </div>
            </div>
        </div>
    </div> 
    <!-- Toast -->
  
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <i class="bi bi-check2-circle ounded me-2"></i>
            <!-- <img src="..." class="rounded me-2" alt="..."> -->
            <strong class="me-auto">Operación exitosa</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" onclick="cerrarToast()"></button>
            </div>
            <div class="toast-body">
            Se elimino el producto correctamente.
            </div>
        </div>
    </div>


	<main class="contenedor">
		<div class="container details-product">
	        <div class="row justify-content-md-center">
                <h1>Revisión de Productos</h1>
                <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php
						// session_start();
						require '../assets/connections/database.php';
						$id_vendedor = $_SESSION['id_vendedor'];
						$sentencia = "SELECT cptos.id, pto.nombre, pto.stock, pto.estado FROM catalogodeproductos cptos, producto pto 
						WHERE cptos.producto_id = pto.id AND vendedor_id = '$id_vendedor'";	
						$ejecutar = $con->query($sentencia);
						// $ejecutar = $con->query($sentencia);
						// $_SESSION['id_vendedor']

						while ($datos = $ejecutar->fetch_assoc()) {
							$id = $datos['id'];
							$nombre = $datos['nombre'];
							$stock = $datos['stock'];
							$estado = $datos['estado'];			
				
							echo "<tr>";
							echo "<th scope='row'>$id</th>";
							echo "<td>$nombre</th>";
							echo "<td>$stock</th>";
							echo "<td>$estado</th>";
							echo "<td>
								<a href='verDetalles.php?id=$id' class='btn btn-primary' title='Vista previa del Producto'><i class='bi bi-eye'></i></a>
								<a href='editarProducto.html?id=$id' type='button' class='btn btn-warning' title='Editar Producto' id='liveToastBtnAprobar'><i class='bi bi-pencil-fill'></i></a>
								<button type='button' class='btn btn-danger' title='Eliminar Producto' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                	<i class='bi bi-trash'></i>
                            	</button> </td>";
							echo "</tr>";							
					
						  }						
						?>	
                      <!-- <tr> -->
                        <!-- <th scope="row">1</th> -->
                        <!-- <td>Producto 01</td> -->
                        <!-- <td>Excepteur ea nostrud</td> -->
                        <!-- <td>Por revisar</td> -->
                        <!-- <td> -->
                            <!-- <a href="verDetalles.html" class="btn btn-primary" title="Ver Detalles del Producto"><i class="bi bi-eye"></i></a> -->
                            <!-- <button type="button" class="btn btn-success" title="Aprobar Producto" id="liveToastBtnAprobar" onclick="mostrarToast()"><i class="bi bi-check-lg"></i></button> -->
                            <!-- Button remove - modal -->
                            <!-- <button type="button" class="btn btn-danger" title="Rechazar Producto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-x-lg"></i>
                            </button> -->
                        <!-- </td> -->
                      <!-- </tr>                                       -->

                    </tbody>
                </table>

	        </div>
	    </div>
    </main>   

	<footer>
		<h3> <a href="#">Av. Luis Enrique Erro S/N, Unidad Profesional Adolfo López Mateos, Zacatenco, Delegación Gustavo A. Madero, C.P. 07738, Ciudad de México </a> </h3>

		<h4> <a href="#"> Terminos y Condiciones </a> <a href="#"> Aviso de Privacidad </a> </h4>

		<h5> @	Derechos reservados 2021.</h5>
		
	</footer>
 
</body>

</html>

<!-- NOTA: Se deben importar los nuevos estilos (copiar y pegar de la linea #2 a la #5):  -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
<link rel="stylesheet" href="../css/navbar.css"> -->
  
  <!-- = = = = = = = =  NAV-MENU = = = = = = = = -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-green-ceg">
		<div class="container-fluid">
		  <a class="navbar-brand" href="../index.php">
			  <img src="../img/ceg.png" alt="logo-CEG"> CEG
		  </a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="../index.php"><i class="bi bi-house"></i> Home</a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="bi bi-shop"></i> Categorias
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <li><a class="dropdown-item" href="#">Action</a></li>
				  <li><a class="dropdown-item" href="#">Another action</a></li>
				  <li><a class="dropdown-item" href="#">Something else here</a></li>
				</ul>
			  </li>

        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./search.php"><i class="bi bi-search"></i> Buscar</a> 
			  </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./login.php"><i class="bi bi-person-fill"></i> Iniciar sesion</a> 
			  </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./tipoDeCuenta.php"><i class="bi bi-person-plus-fill"></i> Registrarse</a> 
			  </li>

			</ul>
		  </div>
		</div>
  </nav>
	<!-- = = = = = = = = END = = = = = = = = -->


<!-- <header>

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
          <li> <a href="../index.php"> <i class="fas fa-house-user"></i> Inicio  </a> </li>

          <li> <a href="#" class="boton_categorias" id="boton_categorias"> Categorias <i class="fas fa-caret-down"></i> </a> </li>

          <li> <a href="tipoDeCuenta.php"> <i class="fas fa-male"></i> Mi Cuenta </a> </li>

          <li> <a href="carrito.html"> <i class="fas fa-shopping-cart"></i>Carrito </a> </li>

          <li> <a href="search.php"> Buscador <i class="fas fa-search-dollar"></i> </a> </li>
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
</header> -->
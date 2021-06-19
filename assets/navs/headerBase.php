<!-- = = = = = = = =  NAV-MENU = = = = = = = = -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-green-ceg">
		<div class="container-fluid">
		  <a class="navbar-brand" href="index.php">
			  <img src="../img/ceg.png" alt="logo-CEG"> CEG
		  </a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">

			<form class="d-flex form-search" METHOD="POST" ACTION="buscarProductos.php">
				<input name="busqueda" class="form-control me-2" type="search"  autocomplete="off" placeholder="Buscar productos..." aria-label="Buscar">
				<button class="btn btn-outline-light" type="submit" name="buscar"><i class="bi bi-search"></i></button>
			</form>			

			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="bi bi-shop"></i> Categorias
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <li><a class="dropdown-item" href="#" onClick="busqueda('Computo')">Computo</a></li>
				  <li><a class="dropdown-item" href="#" onClick="busqueda('Telefonia')">Telefonia</a></li>
				  <li><a class="dropdown-item" href="#" onClick="busqueda('Electronica')">Electronica</a></li>
				  <li><a class="dropdown-item" href="#" onClick="busqueda('Medición')">Medición</a></li>
				  <li><a class="dropdown-item" href="#" onClick="busqueda('Refacciones')">Refacciones</a></li>
				</ul>
			  </li>

			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house"></i> Home</a>
			  </li>	

        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="login2.php"><i class="bi bi-person-fill"></i> Iniciar sesion</a> 
			  </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="tipoDeCuenta.php"><i class="bi bi-person-plus-fill"></i> Registrarse</a> 
			  </li>
	

			</ul>
		  </div>
		</div>
  	</nav>
<!-- = = = = = = = = END = = = = = = = = -->
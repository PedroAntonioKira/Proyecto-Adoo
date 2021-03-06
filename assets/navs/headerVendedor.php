<!-- = = = = = = = =  NAV-MENU = = = = = = = = -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-green-ceg">
		<div class="container-fluid">
		  <a class="navbar-brand" href="./index.php">
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


        
			  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-tags"></i> Mis Productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="productosVendedor.php?registro=0"><i class="bi bi-list-ol"></i> Administrar productos</a></li>
            <li><a class="dropdown-item" href="registrarProductoNuevo.php"><i class="bi bi-plus-circle"></i> Publicar nuevo Producto</a></li>
            <li><a class="dropdown-item" href="historialVentas.html"><i class="bi bi-wallet2"></i> Ventas</a></li>
          </ul>
			  </li>

			  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill"></i> Cuenta 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../assets/connections/terminar.php"><i class="bi bi-door-open"></i> Cerrar sesion</a></li>
            <li><a class="dropdown-item" href="perfilVendedor.php"><i class="bi bi-file-person"></i> Mi cuenta</a></li>
			<li><a class="dropdown-item" href="#"><i class="bi bi-chat-dots"></i> Conversaciones</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-credit-card"></i> Datos bancarios</a></li>
			
          </ul>
			  </li>
	

			</ul>
		  </div>
		</div>
  </nav>
<!-- = = = = = = = = END = = = = = = = = -->
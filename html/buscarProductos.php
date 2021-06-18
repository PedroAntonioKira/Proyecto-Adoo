<?php
  session_start();
  require '../assets/connections/database.php';

  if(isset($_SESSION['correo'])){
    $privilegio = $_SESSION['privilegio'];
  }
  else{
    $privilegio = NULL;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
      <title>Busqueda | Resultados</title>
    <meta charset="utf-8">
    <!--Links del filtrador-->
    <link rel="stylesheet" href="../css/estilosFiltrador.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Estilos del formulario-->
    <link rel="stylesheet" href="../css/formMultiStep.css">

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/buscar.js"></script>

    <!-- HEADER AND FOOTER -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
    <link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/productos-propuesta.css">

    <script src="../js/buscar.js"></script>    
  </head>
<body>
  <?php
    if($privilegio == NULL){
      require '../assets/navs/headerBase.php';
    }
    elseif($privilegio == 'Comprador'){
      require '../assets/navs/headerComprador.php';
    }
    elseif($privilegio == 'Vendedor'){
      require '../assets/navs/headerVendedor.php';
    }
  ?>
  <!-- <div class="wrap"> -->
    <!-- <div class="store-wrapper"> -->
      <!-- <section class="products-list"> -->
      <div class="container products-cards">
			<div class="row">      
      <h1>Productos</h1>

        <?php
          // require '../assets/connections/database.php';
          // $sentencia = "SELECT descripcion.imagen1, descripcion.precio, subcategoria.subcategoria, producto.id, producto.nombre, 
          //     producto.estado, catalogodeproductos.vendedor_id FROM subcategoria INNER JOIN listacategorias 
          //     ON listacategorias.subcategoria_id = subcategoria.id INNER JOIN producto 
          //     ON producto.listacategorias_id = listacategorias.id INNER JOIN catalogodeproductos 
          //     ON catalogodeproductos.producto_id = producto.id INNER JOIN descripcion ON producto.descripcion_id = descripcion.id";
          // $ejecutar = $con->query($sentencia);

          $infoProducto = " descripcion.imagen1, descripcion.precio, subcategoria.subcategoria, producto.id, producto.nombre, 
              producto.estado, catalogodeproductos.vendedor_id ";

          if(isset($_POST['busqueda'])){
            $busquedaUsuario = trim($_POST['busqueda']);
            $selectQuery = "
            SELECT  $infoProducto
            FROM producto, descripcion, subcategoria, categorias, listacategorias, catalogodeproductos
            WHERE (producto.nombre LIKE '%$busquedaUsuario%' OR descripcion.marca LIKE '%$busquedaUsuario%' 
            OR categorias.categoria LIKE '%$busquedaUsuario%' OR subcategoria.subcategoria LIKE '%$busquedaUsuario%')
            AND (producto.descripcion_id = descripcion.id)
            AND (producto.listacategorias_id = listacategorias.id) 
            AND (listacategorias.subcategoria_id = subcategoria.id)
            AND (listacategorias.categorias_id = categorias.id) 
            AND (catalogodeproductos.id = producto.id);             
            ";
            $ejecutar = $con->query($selectQuery);

          while ($datos = $ejecutar->fetch_assoc()) {
            $imagen = $datos['imagen1'];
            $subcategoria = $datos['subcategoria'];
            $id = $datos['id'];
            $nombre = $datos['nombre'];
            $precio = $datos['precio'];
            $estado = $datos['estado'];
            $vendedor_id = $datos['vendedor_id'];

            /*echo "<div class='product-item' category= '$subcategoria'>";
            echo "<img src='../img/imagenesProductos/$imagen1' style:'width:60px; height:30px;'>";
            echo "<div class='Acceso'>";
            echo "<p>$nombre</p>";
            echo "<div class='botones'>";
            echo "<button id='ver' type='button' name='Ver' onclick='redirecVer($id)' class='ver'>";
            echo "<span class='fas fa-eye'></span>";
            echo "</button>";
            echo "<button id='carrito' type='button' name='carrito' onclick='redireCar($id)' class='carrito'>";
            echo "<span class='fas fa-shopping-cart'></span>";
            echo "</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";*/

            // echo"<div class='card' style='width: 18rem;'>";
            // echo"<img src='../img/imagenesProductos/$imagen1'";
            // echo" class='card-img-top' alt='...''>";
            // echo"<div class='card-body'>";
            // echo"<h5 class='card-title'>$nombre</h5>";
            // echo"<p class='card-text'>$$$</p>";
            // echo"<div class='buttons'>";
            // echo"<a href='#'' class='btn btn-primary' onclick='redirecVer($id)'><i class='bi bi-eye'></i></a>";
            // echo"<a href='#' class='btn btn-success' onclick='redireCar($id)'><i class='bi bi-cart-plus'></i></a>";
            // echo"</div>";
            // echo"</div>";
            // echo"</div>";

            ECHO "
						<div class='card' style='width: 18rem;'>
							<img src='../img/imagenesProductos/$imagen' class='card-img-top' alt='$nombre'>
							<div class='card-body'>
								<h5 class='card-title'>$nombre</h5>
								<p class='card-text'>$$precio MXN</p>
								<div class='buttons'>
                ";
            if($privilegio == "Comprador"){
              ECHO "
									<a href='#' class='btn btn-primary' onclick='redirecVer($id)'><i class='bi bi-eye'></i></a>
									<a href='#' class='btn btn-success' onclick='redireCar($id)'><i class='bi bi-cart-plus'></i></a>
                  ";
            }
            elseif($privilegio == "Vendedor"){
              ECHO "
                  <a href='#' class='btn btn-primary' onclick='redirecVer($id)'><i class='bi bi-eye'></i></a>
                  ";
            }
            else{
              ECHO "
                  <a href='#' class='btn btn-primary' onclick='redirecVer($id)'><i class='bi bi-eye'></i></a>
                  <a href='./login2.php' class='btn btn-success'><i class='bi bi-cart-plus'></i></a>
                  ";
            }
            ECHO "
                </div>
							</div>
						</div>					
					  ";            
          }
        } // Cerrando IF medoto POST
        else{
          ECHO "NO RECIBI UNA BUSQUEDA";
        }
        ?>
      <!-- </section> -->
    </div>
  </div>

  <script type="text/javascript">
    function redirecVer(id){
      window.window.location.href='verDetalles.php?id_producto='+id;
    };
  </script>

  <script type="text/javascript">
    function redireCar(number){

      window.window.location.href='carrito.php?id_producto='+number;
    };
  </script>

  <script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/menuPrincipal01.js"></script>
  <?php require '../assets/navs/footer.php'; ?>
</body>
  
</html>
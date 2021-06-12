<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Buscar | Buscar productos</title>
  <!--Links del filtrador-->
  <link rel="stylesheet" href="../css/estilosFiltrador.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="../js/buscar.js"></script>

  <!-- NAV AND FOOTER -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
	<link rel="stylesheet" href="../css/navbar.css">
</head>

<body>

  <?php
    if($_SESSION == NULL){
      require '../assets/navs/headerBaseHtml.php';

    }elseif($_SESSION['privilegio'] == 'Comprador'){
      require '../assets/navs/headerCompradorHtml.php';
    }
    elseif($_SESSION['privilegio'] == 'Vendedor'){
      require '../assets/navs/headerVendedorHtml.php';
    }
  ?>

  <div class="wrap">
    <h1>Productos</h1>
    <div class="store-wrapper">
      <!--  <div class="category_list">
        <a href="#" class="category_item" category="all">Todos</a>
        <a href="#" class="category_item" category="Lenovo">Lenovo</a>
        <a href="#" class="category_item" category="Asus">Asus</a>
        <a href="#" class="category_item" category="HP">HP</a>
        <a href="#" class="category_item" category="Samsung">Samsung</a>
        <a href="#" class="category_item" category="Macbook">Macbook</a>
      </div>-->

      <section class="products-list">


        <?php
          require '../assets/connections/database.php';
          $sentencia = "SELECT descripcion.imagen1,subcategoria.subcategoria,producto.id,producto.nombre,producto.estado,catalogodeproductos.vendedor_id FROM subcategoria INNER JOIN listacategorias ON listacategorias.subcategoria_id = subcategoria.id INNER JOIN producto ON producto.listacategorias_id = listacategorias.id INNER JOIN catalogodeproductos on catalogodeproductos.producto_id = producto.id INNER JOIN descripcion ON producto.descripcion_id = descripcion.id";
          $ejecutar = $con->query($sentencia);


    			while ($datos = $ejecutar->fetch_assoc()) {
            $imagen1 = $datos['imagen1'];
            $subcategoria = $datos['subcategoria'];
            $id = $datos['id'];
            $nombre = $datos['nombre'];
            $estado = $datos['estado'];
            $vendedor_id = $datos['vendedor_id'];


            echo "<div class='product-item' category= '$subcategoria'>";
            echo "<img src='../img/imagenesProductos/$imagen1'>";
            echo "<div class='Acceso'>";
            echo "<a href='#'>$nombre</a>";
            echo "<div class='botones'>";
            echo "<button id='ver' type='button' name='Ver' onclick='redirecVer($id)' class='ver'>";
            echo "<span class='fas fa-eye'></span>";
            echo "</button>";
            echo "<button id='carrito' type='button' name='carrito' onclick='redireCar($id)' class='carrito'>";
            echo "<span class='fas fa-shopping-cart'></span>";
            echo "</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }

        ?>

      </section>
    </div>
  </div>


  <?php require '../assets/navs/footer.php'; ?>

  <script type="text/javascript">
    function redirecVer(number){
      window.window.location.href='verDetalles.html?'+number;
    };
  </script>

  <script type="text/javascript">
    function redireCar(number){
      window.window.location.href='carrito.html?'+number;
    };
  </script>

  <script src="https://kit.fontawesome.com/3c67aef2c2.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/menuPrincipal01.js"></script>
</body>

</html>

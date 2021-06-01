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
  <title>Filtrando Computo</title>
  <!--Links del filtrador-->
  <link rel="stylesheet" href="../css/estilosFiltrador.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Links del menú-->
  <link rel="stylesheet" href="../css/menuPrincipal01.css">
  <link rel="stylesheet" href="../css/Cuerpo01.css">

  <script src="../js/jquery-3.6.0.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/buscar.js"></script>
</head>

<body>

  <?php
    if($_SESSION == NULL){
      require '../assets/navs/headerBaseHtml.php';

    }elseif($_SESSION['privilegio'] == 'Comprador'){
      require '../assets/navs/headerCompradorHtml.php';
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

      <!-- <div class="product-item" category="Lenovo">
          <img src="../img/imagenesFiltro/laptop_hp.jpg" alt="">
          <div class="Acceso">
            <a href="compra.html">Lenovo</a>
            <div class="botones">
              <button id="ver" type="button" name="Ver" onclick="window.location.href='verDetalles.html'" class="ver">
                <span class="fas fa-eye"></span>
              </button>
              <button id="carrito" type="button" name="carrito" onclick="window.location.href='carrito.html'" class="carrito">
                <span class="fas fa-shopping-cart"></span>
              </button>
            </div>
          </div>
        </div>

        <div class="product-item" category="Asus">
          <img src="../img/imagenesFiltro/laptop_toshiba.jpg" alt="">
          <div class="Acceso">
            <a href="compra.html">Asus</a>
            <div class="botones">

              <button id="ver" type="button" name="Ver" onclick="window.location.href='verDetalles.html'" class="ver">
                <span class="fas fa-eye"></span>
              </button>
              <button id="carrito" type="button" name="carrito" onclick="window.location.href='carrito.html'" class="carrito">
                <span class="fas fa-shopping-cart"></span>
              </button>

            </div>
          </div>
        </div>


        <div class="product-item" category="HP">
          <img src="../img/imagenesFiltro/samsung_galaxy.jpg" alt="">
          <div class="Acceso">
            <a href="compra.html">HP</a>
            <div class="botones">
              <button id="ver" type="button" name="Ver" onclick="window.location.href='verDetalles.html'" class="ver">
                <span class="fas fa-eye"></span>
              </button>
              <button id="carrito" type="button" name="carrito" onclick="window.location.href='carrito.html'" class="carrito">
                <span class="fas fa-shopping-cart"></span>
              </button>
            </div>
          </div>
        </div>



        <div class="product-item" category="Samsung">
          <img src="../img/imagenesFiltro/iphone.jpg" alt="">
          <div class="Acceso">
            <a href="compra.html">Samsung</a>
            <div class="botones">
              <button id="ver" type="button" name="Ver" onclick="window.location.href='verDetalles.html'" class="ver">
                <span class="fas fa-eye"></span>
              </button>
              <button id="carrito" type="button" name="carrito" onclick="window.location.href='carrito.html'" class="carrito">
                <span class="fas fa-shopping-cart"></span>
              </button>
            </div>
          </div>
        </div>


        <div class="product-item" category="Macbook">
          <img src="../img/imagenesFiltro/pc_hp.jpg" alt="">
          <div class="Acceso">
            <a href="compra.html">MacBook</a>
            <div class="botones">
              <button id="ver" type="button" name="Ver" onclick="window.location.href='verDetalles.html'" class="ver">
                <span class="fas fa-eye"></span>
              </button>
              <button id="carrito" type="button" name="carrito" onclick="window.location.href='carrito.html'" class="carrito">
                <span class="fas fa-shopping-cart"></span>
              </button>
            </div>
          </div>
        </div>



        <div class="product-item" category="Lenovo">
          <img src="../img/imagenesFiltro/pc_lenovo.jpg" alt="">
          <div class="Acceso">
            <a href="compra.html">Lenovo</a>
            <div class="botones">
              <button id="ver" type="button" name="Ver" onclick="window.location.href='verDetalles.html'" class="ver">
                <span class="fas fa-eye"></span>
              </button>
              <button id="carrito" type="button" name="carrito" onclick="window.location.href='carrito.html'" class="carrito">
                <span class="fas fa-shopping-cart"></span>
              </button>
            </div>
          </div>
        </div>



        <div class="product-item" category="Asus">
          <img src="../img/imagenesFiltro/monitor_asus.jpg" alt="">
          <div class="Acceso">
            <a href="compra.html">Asus</a>
            <div class="botones">
              <button id="ver" type="button" name="Ver" onclick="window.location.href='verDetalles.html'" class="ver">
                <span class="fas fa-eye"></span>
              </button>
              <button id="carrito" type="button" name="carrito" onclick="window.location.href='carrito.html'" class="carrito">
                <span class="fas fa-shopping-cart"></span>
              </button>
            </div>
          </div>
        </div>



        <div class="product-item" category="Macbook">
          <img src="../img/imagenesFiltro/jbl.jpg" alt="">
          <div class="Acceso">
            <a href="compra.html">Lenovo</a>
            <div class="botones">
              <button id="ver" type="button" name="Ver" onclick="window.location.href='verDetalles.html'" class="ver">
                <span class="fas fa-eye"></span>
              </button>
              <button id="carrito" type="button" name="carrito" onclick="window.location.href='carrito.html'" class="carrito">
                <span class="fas fa-shopping-cart"></span>
              </button>
            </div>
          </div>
        </div>-->



      </section>
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
</body>

</html>

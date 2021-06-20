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
      <title>Producto | Detalles de producto</title>
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

	 <!-- Carro -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="../js/main.js"></script>




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/verDetalles.css">
  </head>
<body>

	<?php
    if($_SESSION == NULL){
      require '../assets/navs/headerBase.php';
    }
    elseif($_SESSION['privilegio'] == 'Comprador'){
      require '../assets/navs/headerComprador.php';
    }
    elseif($_SESSION['privilegio'] == 'Vendedor'){
      require '../assets/navs/headerVendedor.php';
    }
  ?>
  <main class="contenedor">
		<div class="container details-product">
	    <div class="row justify-content-md-center">
	        <div class="col col-7">
						<?php

						try{
							$id_Producto = $_GET['id_producto'];

							$consulta = "SELECT marca, fabricante, altoprod, anchoprod, bateriasinclu, tamaram, tamadiscoduro, sistemaoperativo, procesador,
              tamapantalla, resolucion, numeroprocesadores, tipodiscoduro, imagen1, imagen2, imagen3, color, descripcion.precio,descripcion,
                catalogodeproductos.vendedor_id, producto.nombre AS nombreProd, stock, avgcalificacion, info.nombre, info.apellidop,
                info.apellidom,	producto.calificacion, vendedor.id AS id_vendedor
                FROM descripcion
                INNER JOIN producto ON producto.descripcion_id = descripcion.id
                INNER JOIN catalogodeproductos ON catalogodeproductos.producto_id = producto.id
                INNER JOIN vendedor ON catalogodeproductos.vendedor_id = vendedor.id
                INNER JOIN info ON vendedor.info_id = info.id
                WHERE catalogodeproductos.producto_id = '$id_Producto'";

							$ejecutar = $con->query($consulta);
							$datos = $ejecutar->fetch_assoc();
							$imagen1= $datos["imagen1"];
							$imagen2= $datos["imagen2"];
							$imagen3= $datos["imagen3"];
							$nombre=($datos['nombreProd']);
              $idv=$datos['vendedor_id'];
              $precio=($datos['precio']);
              $calificacion=($datos['calificacion']);
              $id=$id_Producto;

              $id_vendedor = $datos["id_vendedor"];


						}catch (Exception $e) {
						    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
						}
												?>
	            <!-- NOMBRE Y DETALLES -->
				<h1><?php echo($datos['nombreProd']); ?></h1>
				<?php

				// $consulta2 = "SELECT avgcalificacion from catalogodeproductos where producto_id=$id_Producto";
				// $ejecutar2 = $con->query($consulta2);
				// $datos = $ejecutar2->fetch_assoc();



					if ($calificacion == 1) {
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("</div>");
					}elseif($calificacion == 2){
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("</div>");
					}elseif($calificacion == 3){
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("</div>");
					}elseif($calificacion == 4){
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("</div>");
					}elseif($calificacion == 5){
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("<i class='bi bi-star-fill'></i> ");
						echo("</div>");
					}
					else{
						echo("<div class='qualification-vendor'>");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("<i class='bi bi-star'></i> ");
						echo("</div>");
          }
				 ?>
				 <!-- ESTRELLAS CALIFICACIÓN -->
				<h3>Price: $<?php echo($datos['precio']); ?> MXN</h3>

        <table class="table table-striped table-bordered">
          <thead>

            <tr>
              <th scope="col">Caracteristica</th>
              <th scope="col">Descripción</th>
            </tr>
          </thead>
          <tbody>
            <?php if(isset($datos['marca'])){?>
            <tr>
              <td>Marca</td>
              <td><?php echo($datos['marca']) ?></td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['fabricante'])){?>
            <tr>
              <td>Fabricante</td>
              <td><?php echo($datos['fabricante']) ?></td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['altoprod'])){?>
            <tr>
              <td>Alto del producto</td>
              <td><?php echo($datos['altoprod']) ?> cm</td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['anchoprod'])){?>
            <tr>
              <td>Ancho del producto</td>
              <td><?php echo($datos['anchoprod']) ?> cm</td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['bateriasinclu'])){?>
            <tr>
              <td>Batrias incluidas</td>
              <td><?php echo($datos['bateriasinclu']) ?></td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['tamaram'])){?>
            <tr>
              <td>Tamaño de la RAM</td>
              <td><?php echo($datos['tamaram']) ?> Gb</td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['tamadiscoduro'])){?>
            <tr>
              <td>Tamaño del disco duro</td>
              <td><?php echo($datos['tamadiscoduro']) ?> Gb</td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['sistemaoperativo'])){?>
            <tr>
              <td>SO</td>
              <td><?php echo($datos['sistemaoperativo']) ?></td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['procesador'])){?>
            <tr>
              <td>Procesador</td>
              <td><?php echo($datos['procesador']) ?></td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['tamapantalla'])){?>
            <tr>
              <td>Tamaño de la pantalla</td>
              <td><?php echo($datos['tamapantalla']) ?> pulgadas</td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['resolucion'])){?>
            <tr>
              <td>Resolución</td>
              <td><?php echo($datos['resolucion']) ?></td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['numeroprocesadores'])){?>
            <tr>
              <td>Numero de procesadores</td>
              <td><?php echo($datos['numeroprocesadores']) ?></td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['tipodiscoduro'])){?>
            <tr>
              <td>Tipo de disco duro</td>
              <td><?php echo($datos['tipodiscoduro']) ?></td>
            </tr>
            <?php }else{} ?>

            <?php if(isset($datos['descripcion'])){?>
            <tr>
              <td>Descripción</td>
              <td><?php echo($datos['descripcion'])?></td>
            </tr>
            <?php }else{} ?>
          </tbody>
        </table>

				<h5>Stock: <?php echo($datos['stock']) ?> Disponibles.</h5>
				<h5>Sold By: <a href="#"><?php echo($datos['nombre']." ".$datos['apellidop']." ".$datos['apellidom']) ?></a></h5>



			</div>

	        <div class="col-5 slider-container">
	        <!-- SLIDER PRODUCT -->
            <div class="container-right">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/imagenesProductos/<?php echo $imagen1 ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/imagenesProductos/<?php echo $imagen2 ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/imagenesProductos/<?php echo $imagen3 ?>" class="d-block w-100" alt="...">
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            <!-- SLIDER PRODUCT END -->
            <?php
                if($privilegio != 'Vendedor'){ //Para que el vendedor no pueda comprar
            ?>
            <!-- BUTTONS -->
                <div class="buttons-container center-all">
                    <?php
                    if($privilegio != NULL){
                    ?>
                    <a href="mensajeVendedor.php?CatalogoId=<?php echo($id); ?>" type="button" class="btn btn-primary" title="Preguntar al vendedor"><i class="bi bi-chat-dots-fill"></i></a>
                    <button onClick="cart.agregar(<?php echo $id ?>, '<?php echo $nombre ?>', <?php echo $id_vendedor ?>);" title="Añadir al carrito" class="btn btn-success" id="btn-cart-<?php echo $id ?>"><i class="bi bi-cart-plus-fill"></i></button>
                    <?php
                    }else{
                      ECHO "
                    	<a href='./login2.php' type='button' class='btn btn-primary' title='Preguntar al vendedor'><i class='bi bi-chat-dots-fill'></i></a>
                      <a href='./login2.php' type='button' class='btn btn-success'><i class='bi bi-cart-plus-fill'></i></a>
                      ";
                    }
                    ?>
                    <!-- <button type="button" class="btn btn-primary">Preguntar</button>
                    <button type="button" class="btn btn-success">Agregar al carrito</button>                 -->
                </div>
            <!-- BUTTONS END -->
            <?php
                }
            ?>
            </div>
	        </div>
	    </div>
	</div>
	</main>
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="pruebavend.php"> <table class="show-cart table"></table>

        <div>Total a pagar:<span class="total-cart"> 0</span></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="enviar btn-primary">Comprar</button>
        </form>
        <button type="button" class="clear-cart btn btn-danger">Limpiar carrito</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>


      </div>
    </div>
  </div>
</div>

    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-8216c69d01441f36c0ea791ae2d4469f0f8ff5326f00ae2d00e4bb7d20e24edb.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script id="rendered-js">
// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = function () {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];

  function Item(id, price, name, count,idv) {


    this.id = id;
    this.price = price;
    this.name = name;
    this.count = count;
    this.idv=idv;


  }

  // Save cart
  function saveCart() {
    localStorage.setItem('shoppingCart', JSON.stringify(cart));
  }

  // Load cart
  function loadCart() {
    cart = JSON.parse(localStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }


  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};

  // Add to cart
  obj.addItemToCart = function (id, price,name ,count,idv) {
    for (var item in cart) {
      if (cart[item].id === id) {
        cart[item].count++;
        saveCart();
        return;
      }
    }
    var item = new Item(id, price, name, count, idv);
    cart.push(item);
    saveCart();
  };
  // Set count from item
  obj.setCountForItem = function (id, count) {
    for (var i in cart) {
      if (cart[i].id === id) {
        cart[i].count = count;
        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function (id) {
    for (var item in cart) {
      if (cart[item].id === id) {
        cart[item].count--;
        if (cart[item].count === 0) {
          cart.splice(item, 1);
        }
        break;
      }
    }
    saveCart();
  };

  // Remove all items from cart
  obj.removeItemFromCartAll = function (id) {
    for (var item in cart) {
      if (cart[item].id === id) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  };

  // Clear cart
  obj.clearCart = function () {
    cart = [];
    saveCart();
  };

  // Count cart
  obj.totalCount = function () {
    var totalCount = 0;
    for (var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  };

  // Total cart
  obj.totalCart = function () {
    var totalCart = 0;
    for (var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  };

  // List cart
  obj.listCart = function () {
    var cartCopy = [];
    for (i in cart) {
      item = cart[i];
      itemCopy = {};
      for (p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy);
    }
    return cartCopy;
  };

  /*obj.ordenar = function (carrito) {

  	var aux=[];
  	var pedidos=[];
  	var flag=false;

  	for (var k = 0; i < carrito.length; i++) {

  		var item=carrito[k];

  		alert("primer item"+item.idv);

	  	var	slot=new Slot(item.idv);

	  	alert(slot.iv);

	  		 if(pedidos.length != 0)
	  		 {alert("if pedidos");
	  		 	for(var j=0; j<pedidos.length; j++)
	  		 	{alert("for j");
	  		 		if(divisor.length===0)
	  		 		{alert("if divisor");

	  		 			pedidos[j].lista.push(item);
	  		 			item=null;

	  		 		}
	  		 		else
	  		 		{
	  		 			flag=true;

	  		 		}

	  		 	}

	  		 }
	  		 else
	  		 {
	  		 	flag=true;
	  		 }

	  if(item!=null)
	  {alert("item "+item);
	  	pedidos.push(item);

	  	if(flag)
	  	{
	  		aux.push(slot);
	  		slot.lista=aux;
	  		divisor.push(slot);
	  		pedidos=[];
	  		$flag=false;

	  	}

	  }

  	}

  	for(var h=0; h<slot.lista.length ; h++){
  	alert(slot.lista[i].name);
    }

  	return slot;

  };*/

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
}();


// *****************************************
// Triggers / Events
// *****************************************
// Add item
$('.add-to-cart').click(function (event) {
  event.preventDefault();
  var name = $(this).data('name');
  var price = Number($(this).data('price'));
  var id = Number($(this).data('id'))
  var idv= Number($(this).data('idv'))
  shoppingCart.addItemToCart(id, price, name, 1, idv);
  displayCart();
});

// Clear items
$('.clear-cart').click(function () {
  shoppingCart.clearCart();
  displayCart();
});




function displayCart() {
  var cartArray = shoppingCart.listCart();

  var data=  JSON.stringify(cartArray);
  var output = " <input type='hidden' value='"+data+"' name='carrito'> <tr>  <th>Nombre</th> <th>Precio</th> <th> Cantidad </th> <th> </th><th> Total </th> </tr>"

  for (var i in cartArray) {
    output += "<tr>" +"<td>" + cartArray[i].name + "</td>" +
    "<td>(" + cartArray[i].price + ")</td>" +
    "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-id=" + cartArray[i].id + ">-</button>" +
    "<input type='number' class='item-count form-control' data-id='" + cartArray[i].id + "' value='" + cartArray[i].count + "'>" +
    "<button class='plus-item btn btn-primary input-group-addon' data-id=" + cartArray[i].id + ">+</button></div></td>" +
    "<td><button class='delete-item btn btn-danger' data-id=" + cartArray[i].id + ">X</button></td>" +
    " = " +
    "<td>" + cartArray[i].total + "</td>" +
    "</tr>";
  }
  $('.show-cart').html(output);
  $('.total-cart').html(shoppingCart.totalCart());
  $('.total-count').html(shoppingCart.totalCount());
}

// Delete item button

$('.show-cart').on("click", ".delete-item", function (event) {
  var id = $(this).data('id');
  shoppingCart.removeItemFromCartAll(id);
  displayCart();
});


// -1
$('.show-cart').on("click", ".minus-item", function (event) {
  var id = $(this).data('id');
  shoppingCart.removeItemFromCart(id);
  displayCart();
});
// +1
$('.show-cart').on("click", ".plus-item", function (event) {
  var id = $(this).data('id');
  shoppingCart.addItemToCart(id);
  displayCart();
});

// Item count input
$('.show-cart').on("change", ".item-count", function (event) {
  var id = $(this).data('id');
  var count = Number($(this).val());
  shoppingCart.setCountForItem(id, count);
  displayCart();
});




displayCart();
//# sourceURL=pen.js
    </script>




	<?php require '../assets/navs/footer.php'; ?>
</body>

</html>

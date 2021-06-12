<?php
	session_start();
	require '../assets/connections/database.php';
  require '../clases/Productos.php';

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
  <link rel="stylesheet" media="all" href="https://cpwebassets.codepen.io/assets/editor/editor-91442cfd352c9551183b41e994cd890ad1abfb22e98f168ed0c17a1a871345d3.css">
  <link rel="stylesheet" media="screen" href="https://cpwebassets.codepen.io/assets/editor/themes/twilight-a5a757de70a8d57373f9bc7c87208806adaa2b69d0f2c3e9fcce79a6f9babd65.css" id="cm-theme">

  <!--Links del menú-->
  <link rel="stylesheet" href="../css/menuPrincipal01.css">
  <link rel="stylesheet" href="../css/Cuerpo01.css">
  <link rel="stylesheet" media="all" href="https://cpwebassets.codepen.io/assets/global/global-42901a11fdeb8e3037fa8592b0daa21b2e7efdc6a736d9164be7857d2a03a34b.css">
  <link rel="stylesheet" media="screen" href="https://cpwebassets.codepen.io/assets/packs/css/everypage-fbfd2350.css">

  <script src="../js/jquery-3.6.0.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/buscar.js"></script>


  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  
  
            

</head>

<body>

  <?php
    if($_SESSION == NULL){
      require '../assets/navs/carrito.php';

    }elseif($_SESSION['privilegio'] == 'Comprador'){
      require '../assets/navs/carrito.html';
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
          $sentencia = "SELECT catalogodeproductos.precio,descripcion.imagen1,subcategoria.subcategoria,producto.id,producto.nombre,producto.estado,catalogodeproductos.vendedor_id FROM subcategoria INNER JOIN listacategorias ON listacategorias.subcategoria_id = subcategoria.id INNER JOIN producto ON producto.listacategorias_id = listacategorias.id INNER JOIN catalogodeproductos on catalogodeproductos.producto_id = producto.id INNER JOIN descripcion ON producto.descripcion_id = descripcion.id";
          $ejecutar = $con->query($sentencia);

          $producto = new Producto; 

    			while ($datos = $ejecutar->fetch_assoc()) {
            $imagen1 = $datos['imagen1'];
            $subcategoria = $datos['subcategoria'];
            $producto->setId($datos['id']);
            $producto->setNombre($datos['nombre']);
            $producto->setPrecio($datos['precio']);
            $estado = $datos['estado'];
            $producto->setIdv($datos['vendedor_id']);
            $array = json_encode($producto);
            $id=$datos['id']; ?>

             <div class="container">
    <div class="row">
      <div class="col">
        <div class="card" style="width: 20rem;">
  <img class="card-img-top" <?php echo "src='../img/imagenesProductos/$imagen1'" ?>  alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title"></h4>
    <p class="card-text"><?php $precio ?></p>
    <a href="#" data-name="<?php $nombre ?>" data-price="<?php $precio ?>" class="add-to-cart btn btn-primary">Add to cart</a>
  </div>
</div>
      
  <?php    }?>

  
 <!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="show-cart table">
          
        </table>
        <div>Total price: $<span class="total-cart"></span></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Order now</button>
      </div>
    </div>
  </div>
</div> 

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
        <form method="post" action="pagartotal.php"> <table class="show-cart table"></table>

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

  // Constructor
  function Item(id, price, name, count) {
    this.id = id;
    this.price = price;
    this.name = name;
    this.count = count;
    
  }

  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
  }

  // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }


  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};

  // Add to cart
  obj.addItemToCart = function (id, price,name ,count) {
    for (var item in cart) {
      if (cart[item].id === id) {
        cart[item].count++;
        saveCart();
        return;
      }
    }
    var item = new Item(id, price, name, count);
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
  shoppingCart.addItemToCart(id, price, name, 1);
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
  var output = " <input type='hidden' value='"+data+"' name='carrito'> <tr>  <th>Nombre</th> <th>Precio</th> <th> Cantidad </th> <th> Total </th> </tr>"
 
  for (var i in cartArray) {
    output += "<tr>" +
    "<td>" + cartArray[i].name + "</td>" +
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
</body>

</html>

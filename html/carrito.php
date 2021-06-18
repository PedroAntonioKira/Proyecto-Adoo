	<?php
  session_start();
  require '../assets/connections/database.php';
  require '../Clases/Producto.php';

  if(isset($_SESSION['correo'])){
    $privilegio = $_SESSION['privilegio'];
  }
?>
<html>
<head>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>  

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="../js/main.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
<link rel="stylesheet" href="../css/navbar.css">
 
  
<style>

.show-cart li {
  display: flex;
}
.card {
  margin-bottom: 20px;
}
.card-img-top {
  width: 200px;
  height: 200px;
  align-self: center;
}
</style>



</head>

<body translate="no">


  <!-- Nav -->
    <?php
      if($_SESSION == NULL){
        require '../assets/navs/headerBaseIndex.php';

      }elseif($_SESSION['privilegio'] == 'Comprador'){
        require '../assets/navs/headerComprador.php';
      }elseif($_SESSION['privilegio'] == 'Vendedor'){
        require '../assets/navs/headerVendedorIndex.php';
      }else{
        require '../assets/navs/headerBaseIndex.php';
      }
      // echo $_SESSION['privilegio'];
    ?>

    <?php
          require '../assets/connections/database.php';
          $sentencia = "SELECT catalogodeproductos.precio,descripcion.imagen1,subcategoria.subcategoria,producto.id,producto.nombre,producto.estado,catalogodeproductos.vendedor_id FROM subcategoria INNER JOIN listacategorias ON listacategorias.subcategoria_id = subcategoria.id INNER JOIN producto ON producto.listacategorias_id = listacategorias.id INNER JOIN catalogodeproductos on catalogodeproductos.producto_id = producto.id INNER JOIN descripcion ON producto.descripcion_id = descripcion.id";
          $ejecutar = $con->query($sentencia);
          $producto = new Producto;  ?>

          



<!-- Main -->
<div class="container">
    <div class="row">
      <?php 

          while ($datos = $ejecutar->fetch_assoc()) {
            $imagen1 = $datos['imagen1'];
            $subcategoria = $datos['subcategoria'];
           //$producto->setId($datos['id']);
            $nombre=($datos['nombre']);
            $idv=$datos['vendedor_id'];
            $precio=($datos['precio']);
            $estado = $datos['estado'];
      
            $id=$datos['id']; ?>

      <div class="col">
        <div class="card" style="width: 20rem;">
  <img class="card-img-top" <?php echo "src='../img/imagenesProductos/$imagen1'" ?> alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title"><?php echo $nombre ?></h4>
    <p class="card-text"><?php echo $precio ?></p>
    <a href="#" data-name="<?php echo $nombre ?>" data-price="<?php echo $precio ?>" data-id="<?php echo $id ?>" data-idv="<?php echo $idv ?>" class="add-to-cart btn btn-primary">Agregar</a>
  </div>
</div>
      </div> <?php }?>
      </div>
    </div>

  
 <!-- Modal -->

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
  var output = " <input type='hidden' value='"+data+"' name='carrito'> <tr>  <th>Nombre</th> <th>Precio</th> <th> Cantidad </th> <th> Total </th> </tr>"
 
  for (var i in cartArray) {
    output += "<tr>" +"<td>" + cartArray[i].name + "</td>" +
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

  




 
</body></html>
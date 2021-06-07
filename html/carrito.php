
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de sesion</title>
    <meta charset="utf-8">


    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!--Estilos del menu superior-->
    <link rel="stylesheet" href="../css/menuPrincipal01.css">
    <link rel="stylesheet" href="../css/Cuerpo01.css">
    <link rel="stylesheet" href="../css/tablas.css">
    <!--Estilos del slider-->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/main.js"></script>
    <script type="text/javascript">

    	

    	document.addEventListener('DOMContentLoaded', function() {
    	
      displayCart();
			}, false);

	var shoppingCart = (function() {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];
  
  // Constructor
  function Item(name, price, count) {
    this.name = name;
    this.price = price;
    this.count = count;
  }
  
  // Save cart
  function saveCart() {
    localStorage.setItem('shoppingCart', JSON.stringify(cart));
  }
  
    // Load cart
  function loadCart() {
    cart = JSON.parse(localStorage.getItem('shoppingCart'));
  }
  if (localStorage.getItem("shoppingCart") != null)   {
    loadCart();
  }
  

  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};
  
  // Add to cart
  obj.addItemToCart = function(name, price, count) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart[item].count ++;
        saveCart();
        return;
      }
    }
    var item = new Item(name, price, count);
    cart.push(item);
    saveCart();
  }
  // Set count from item
  obj.setCountForItem = function(name, count) {
    for(var i in cart) {
      if (cart[i].name === name) {
        cart[i].count = count;
        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function(name) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart[item].count --;
          if(cart[item].count === 0) {
            cart.splice(item, 1);
          }
          break;
        }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function(name) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function() {
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function() {
    var totalCount = 0;
    for(var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function() {
    var totalCart = 0;
    for(var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = {};
      for(p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

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
})();

function displayCart() {
  var cartArray = shoppingCart.listCart();
  alert("cargado");
  var output = "";
  for(var i in cartArray) {
    output += "<tr>"
      + "<td>" + cartArray[i].name + "</td>"
      alert(cartArray[i].name); 
      + "<td>(" + cartArray[i].price + ")</td>"
      + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
      + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
      + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
      + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
      + " = " 
      + "<td>" + cartArray[i].total + "</td>" 
      +  "</tr>";
  }
  $('.show-cart').html(output);
  $('.total-cart').html(shoppingCart.totalCart());
  $('.total-count').html(shoppingCart.totalCount());
}
         
           
             



    </script>

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
    <body>

      <h1> Carrito </h1>

<div class="wrapper">



 <div  id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  role="document">
    <div>
      <div>
        <h5 id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div>
        <table class="show-cart table">
          
        </table>
        <div>Total price: $<span class="total-cart"></span></div>
      </div>
      <div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Order now</button>
      </div>


    
    



 
</div>


</body>
</html>

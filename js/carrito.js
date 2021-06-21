console.log("Soy carrito");

/*
  ____          _____               _ _           _       
 |  _ \        |  __ \             (_) |         | |      
 | |_) |_   _  | |__) |_ _ _ __ _____| |__  _   _| |_ ___ 
 |  _ <| | | | |  ___/ _` | '__|_  / | '_ \| | | | __/ _ \
 | |_) | |_| | | |  | (_| | |   / /| | |_) | |_| | ||  __/
 |____/ \__, | |_|   \__,_|_|  /___|_|_.__/ \__, |\__\___|
         __/ |                               __/ |        
        |___/                               |___/         
    
______________________________________________
/ Ya pasenos profa, solo quiero porder dormir.\
\  *Un burrito blanco en final del parcial*   /
 ---------------------------------------------
        \   ^__^
         \  (oo)\_______
            (__)\       )\/\
                ||----w |
                ||     ||

*/
class Carrito {
    constructor(correo) {
        this.clave = "carrito-" + correo;
        // this.vendedores = this.obtener();
        this.vendedores = this.obtener();
        console.log(Object.values(this.vendedores));
        this.guardar();
    }

    agregar(id_prod, nombreProd, id_vend) {
               
        if (!this.existe(id_vend)) { //vendedor NO existe
            var producto = new Object();
            producto.id = id_prod;
            producto.nombre = nombreProd;
            producto.cantidad = 1;
    
            var vendedor = new Object();
            vendedor.id = id_vend;
            vendedor.productos = [];
    
            vendedor.productos.push(producto);
    
            this.vendedores.push(vendedor);            
            // this.guardar();
        }   
        else{           // vendesor SI existe
            vendedor = this.existe(id_vend);
            // producto = this.productoExiste(vendedor, id_prod); 
            if(!this.productoExiste(vendedor, id_prod) ){   // Producto NO existe
                var producto = new Object();
                producto.id = id_prod;
                producto.nombre = nombreProd;
                producto.cantidad = 1;
                vendedor.productos.push(producto);
            }
            else{ // Producto ya existe
                var encontrado = vendedor.productos.find(producto => producto.id === id_prod);
                console.log("Encontrado: " + encontrado);
            }
        }
        this.guardar();
        this.btnQuitar(id_prod, nombreProd, id_vend);
        console.log(Object.values(this.vendedores));

    }

    hola(){
        console.log(this.clave + " creado.");
    }

    existe(id) {
        // console.log(this.vendedores.find(vendedor => vendedor.id === id));
        return this.vendedores.find(vendedor => vendedor.id === id);
    }

    productoExiste(vendedor, id_prod) {
        var encontrado = vendedor.productos.find(producto => producto.id === id_prod);
        if(encontrado)
            return true;
        else
            return false;
    }

    guardar(){
        localStorage.setItem(this.clave, JSON.stringify(this.vendedores));
        this.obtenerConteo();
    }

    obtener() {
        const productosCodificados = localStorage.getItem(this.clave);
        return JSON.parse(productosCodificados) || [];
    }

    quitarProducto(id_prod, nombreProd, id_vend) {
        const indiceVendedor = this.vendedores.findIndex(vendedor => vendedor.id === id_vend);
        if (indiceVendedor != -1) {
            const indiceProducto = this.vendedores[indiceVendedor].productos.findIndex(producto => producto.id === id_prod);
            if (indiceProducto != -1) {
                // console.log("Indice vendedor: " + indiceVendedor);
                // console.log("Indice producto: " + indiceProducto);
                this.vendedores[indiceVendedor].productos.splice(indiceProducto, 1);
                if(this.vendedores[indiceVendedor].productos.length == 0){
                    this.vendedores.splice(indiceVendedor, 1);
                }
            }

            this.btnAgregar(id_prod, nombreProd, id_vend);
            this.guardar();
            // this.productos.splice(indice, 1);
            // this.guardar();
            console.log(Object.values(this.vendedores));
        }
    }

    quitarVendedor(id_vendedor){
        const indiceVendedor = this.vendedores.findIndex(vendedor => vendedor.id === id_vendedor);
        if (indiceVendedor != -1) {
            this.vendedores.splice(indiceVendedor, 1);
        }
        this.guardar();
        window.location.reload(); 
    }

    quitarProductoDesdeCarrito(id_prod, nombreProd, id_vend) {
        const indiceVendedor = this.vendedores.findIndex(vendedor => vendedor.id === id_vend);
        if (indiceVendedor != -1) {
            const indiceProducto = this.vendedores[indiceVendedor].productos.findIndex(producto => producto.id === id_prod);
            if (indiceProducto != -1) {
                this.vendedores[indiceVendedor].productos.splice(indiceProducto, 1);
                if(this.vendedores[indiceVendedor].productos.length == 0){
                    this.vendedores.splice(indiceVendedor, 1);
                }
            }
            this.guardar();
            window.location.reload(); 
        }
    }    

    btnQuitar(id_prod, nombreProd, id_vend) {
        var btn = document.getElementById("btn-cart-" + id_prod);
        var newBtn = document.createElement("button");
        newBtn.setAttribute("onClick", "cart.quitarProducto(" + id_prod + ", '" + nombreProd + "', " + id_vend + ")");
        newBtn.setAttribute("class", "btn btn-warning");
        newBtn.setAttribute("id", "btn-cart-" + id_prod);
        newBtn.setAttribute("title", "Quitar producto del carrito");

        var icono = document.createElement("i");
        icono.setAttribute("class", "bi bi-cart-dash");
        newBtn.appendChild(icono);
        if(btn){
            var padre = btn.parentNode;
            padre.removeChild(btn);
            padre.appendChild(newBtn);
        }
    }

    btnAgregar(id_prod, nombreProd, id_vend) {
        var btn = document.getElementById("btn-cart-" + id_prod);
        var newBtn = document.createElement("button");
        newBtn.setAttribute("onClick", "cart.agregar(" + id_prod + ", '" + nombreProd + "', " + id_vend + ")");
        newBtn.setAttribute("class", "btn btn-success");
        newBtn.setAttribute("id", "btn-cart-" + id_prod);
        newBtn.setAttribute("title", "Añadir al carrito");

        var icono = document.createElement("i");
        icono.setAttribute("class", "bi bi-cart-plus");
        newBtn.appendChild(icono);
        var padre = btn.parentNode;
        padre.removeChild(btn);
        padre.appendChild(newBtn);
    }    

    obtenerConteo() {
        var conteo = 0;
        this.vendedores.forEach(vendedor => {
            conteo += vendedor.productos.length;            
        });
        var span = document.getElementById("cart-count");
        span.innerHTML = conteo;
    }

    listaProductos(id_vendedor){
        var listaProductos = '';
        this.vendedores.forEach(vendedor => {
            if(vendedor.id == id_vendedor){
                vendedor.productos.forEach(producto => {
                // console.log(producto.nombre);
                listaProductos = listaProductos + producto.nombre + ','; 
                });
            }
            
        });
        listaProductos = listaProductos.substring(0, listaProductos.length - 1);
        console.log(listaProductos);
        return listaProductos;
    }

     jsonProductos(id_vendedor){
        var listaProductos = '';
        var json = '';
        this.vendedores.forEach(vendedor => {
            if(vendedor.id == id_vendedor){
                
                json=JSON.stringify(vendedor.productos);
            }
            
        });
        console.log("json"+json);
        return json
    }

    mostrarProductos(){
        console.log("mostrarProductos: " + window.location.pathname);
         console.log("amos"); 
        if(window.location.pathname == "/Proyecto-Adoo/html/" 
            || window.location.pathname == "/Proyecto-Adoo/html/buscarProductos.php"
            || window.location.pathname == "/Proyecto-Adoo/html/verDetalles.php" 
            || window.location.pathname == "/Proyecto-Adoo/html/index.php"){ // BUSQUEDAS E INDEX
             console.log("k"); 
            this.vendedores.forEach(vendedor => {
                // console.log("Vendedor");
                vendedor.productos.forEach(producto => {
                    this.btnQuitar(producto.id, producto.nombre, vendedor.id);
                    // querySelect(producto.id);
                    // console.log("Producto");
                });
            });
        }
        else if(window.location.pathname == "/Proyecto-Adoo/html/verCarrito.php"){
         console.log("a");  // CARRITO
            if(this.vendedores.length != 0){
                this.vendedores.forEach(vendedor => {
                    queryVendorSelectName(vendedor.id);
                    
                    setTimeout(function(){ // esperamos un poco a que renderice el padre
                        vendedor.productos.forEach(producto => {
                            // this.btnQuitar(producto.id, producto.nombre, vendedor.id);
                            querySelect(producto.id, vendedor.id);
                            // console.log("Producto");
                        });
                    }, 250);        
                });      
            }
            else{
                console.log("NO HAY PRODUCTOS");
                var row = document.getElementById("contenedor-row");

                var tabla = document.getElementById("tablaCarrito");
                row.removeChild(tabla);
                var texto = document.createElement("H1");
                texto.innerHTML = "Aún no haz agregado productos al carrito.";

                row.appendChild(texto);
            }
        }

    }

}

obtenerCorreo();
// correoUsuario = obtenerCorreo();
// cart = new Carrito(correo);
// cart.hola();

function obtenerCorreo(){ 
    console.log("Enviando peticion correo...");
    $.ajax({
        url: '../html/ajaxDatosUsuario.php',
        type: 'GET',
        success: function(correo) {
            console.log(correo);
            cart = new Carrito(correo);
            cart.hola();
            cart.mostrarProductos();
        },
        error: function() {
            console.error("No es posible completar la operación");
        }
    });    
}

// function obtenerCorreoMostrarCarrito(){ 
//     console.log("Enviando peticion correo...");
//     $.ajax({
//         url: '../html/ajaxDatosUsuario.php',
//         type: 'GET',
//         success: function(correo) {
//             console.log(correo);
//             cart = new Carrito(correo);
//             cart.hola();
//             cart.mostrarProductos();
//         },
//         error: function() {
//             console.error("No es posible completar la operación");
//         }
//     });    
// }

function querySelect(id, id_vendedor){ 
    console.log("enviando...");
    $.ajax({
        url: '../html/selectProduct.php',
        type: 'POST',
        data: { data: id },
        success: function(respuesta) {
            // console.log(respuesta);
            resultado = JSON.parse(respuesta);
            console.log(resultado);
            renderProduct(resultado, id_vendedor);
        },
        error: function() {
            console.error("No es posible completar la operación");
        }
    });    
}

function queryVendorSelectName(id){
    $.ajax({
        url: '../html/ajaxDatosVendedor.php',
        type: 'POST',
        data: { data: id },
        success: function(respuesta) {
            // console.log(respuesta);
            resultado = JSON.parse(respuesta);
            renderVendor(resultado.nombre, id);
        },
        error: function() {
            console.error("No es posible completar la operación");
        }
    });  
}



// = = = = = == = = = = = = = = = = = = = == = = = = = = = = == = = = = = = = = = = = = = == = = =

function renderProduct(producto, id_vendedor){
    console.log("Producto: " + producto.stock);

      var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "compra.php");

    var fila = document.createElement("tr");

    // Boton eliminar
    borrar = document.createElement("th");
    var borrarBtn = document.createElement("button");
    borrarBtn.setAttribute("class", "btn-delete");
    var icono = document.createElement("i");
    icono.setAttribute("class", "bi bi-trash");
    borrarBtn.appendChild(icono);
    borrarBtn.setAttribute("onClick", "cart.quitarProductoDesdeCarrito(" + producto.id + ", '" +  producto.nombre + "', " + id_vendedor + ")");
    borrar.appendChild(borrarBtn);
    fila.appendChild(borrar);
    // Imagen
    imagenContainer = document.createElement("td");
    img = document.createElement("img");
    img.setAttribute("src", "../img/imagenesProductos/" + producto.imagen1);
    img.setAttribute("class", "img-thumbnail");
    img.setAttribute("alt", producto.nombre);
    imagenContainer.appendChild(img);
    fila.appendChild(imagenContainer);
    // Producto
    var nombre = document.createElement("td");
    var nombreLink = document.createElement("a");
    nombreLink.setAttribute("href", "./verDetalles.php?id_producto=" + producto.id);
    nombreLink.innerHTML = producto.nombre;
    nombre.appendChild(nombreLink);
    fila.appendChild(nombre);
    // Precio 
    var precio = document.createElement("td");
    precio.setAttribute("id", "precio-" + producto.id);
    precio.innerHTML = "$" + producto.precio + " MXN";
    fila.appendChild(precio);
    // Cantidad
    var cantidad = document.createElement("td");
    if(producto.stock < 1 || producto.estado != "PUBLICADO"){
        cantidad.setAttribute("class", "cart-error-product");

        texto = document.createElement("h4");
        texto.innerHTML("Producto no disponible");

        cantidad.appendChild(texto);

        inputCantidad = document.createElement("input");
        inputCantidad.setAttribute("id", "cantidad-" + producto.id);
        inputCantidad.setAttribute("type", "number");
        inputCantidad.setAttribute("min", "1");
        inputCantidad.setAttribute("max", producto.stock);
        inputCantidad.setAttribute("pattern", "^[0-9]+");
        inputCantidad.setAttribute("class", "form-control");
        inputCantidad.setAttribute("value", "0");
        inputCantidad.setAttribute("name","array[]");
        inputCantidad.setAttribute("disabled", "true");
        inputCantidad.setAttribute("onChange", "cantidadCambiada(" + producto.id + ", " + producto.precio + ", " + producto.stock + ")");
        cantidad.appendChild(inputCantidad);
    }
    else{
        inputCantidad = document.createElement("input");
        inputCantidad.setAttribute("id", "cantidad-" + producto.id);
        inputCantidad.setAttribute("type", "number");
        inputCantidad.setAttribute("min", "1");
        inputCantidad.setAttribute("max", producto.stock);
        inputCantidad.setAttribute("pattern", "^[0-9]+");
        inputCantidad.setAttribute("class", "form-control");
        inputCantidad.setAttribute("value", "1");
        inputCantidad.setAttribute("name","array[]");
        inputCantidad.setAttribute("onChange", "cantidadCambiada(" + producto.id + ", " + producto.precio + ", " + producto.stock + ")");
        cantidad.appendChild(inputCantidad);
    }
    fila.appendChild(cantidad);
    // Subtotal
    var subtotal = document.createElement("td");
    subtotal.setAttribute("id", "subtotal-" + producto.id);
    subtotal.innerHTML = "$" + producto.precio + " MXN";
    fila.appendChild(subtotal);



    console.log('tbody-' + id_vendedor);
    tabla = document.getElementById('tbody-' + id_vendedor);
    tabla.appendChild(fila);

}

function cantidadCambiada(id, costo, stock){
    console.log("Cambio " + id);

    cantidad = document.getElementById("cantidad-" + id);
    cant = parseFloat(cantidad.value);
    if((cant > stock) && (cant % 1 == 0)){
        cantidad.value = stock;
        cant = stock;
        noti = document.getElementById("notify-1");
        noti.setAttribute("class", "alert alert-warning alert-dismissible fade show notify-diplay-true");
    }
    if((cant < 1 && stock > 0) || (cant % 1 != 0)){
        if(cant % 1 != 0 || cant == 0){
            noti = document.getElementById("notify-2");
            text_noti = document.getElementById("noti-text-change");
            if(cant == 0){
                text_noti.innerHTML = "No puede ingresar cero piezas del producto.";    
            }
            else{
                text_noti.innerHTML = "No puede ingresar una cantidad de productos decimal.";
            }
            cantidad.value = "1";
            cant = stock;
        }
        else{
            cantidad.value = "1";
            cant = stock;
            noti = document.getElementById("notify-2");
            text_noti = document.getElementById("noti-text-change");
            text_noti.innerHTML = "No puede ingresar números negativos.";
        }

        noti.setAttribute("class", "alert alert-warning alert-dismissible fade show notify-diplay-true");
    }
    else{
        subtotal = document.getElementById("subtotal-" + id);
        sub = parseFloat(subtotal.innerHTML);

        cost = parseFloat(costo);

        costoSubtotal = cant * cost;
        subtotal.innerHTML = "$ " + costoSubtotal + " MXN";
    }
}

function renderVendor(nombre, id){
    carrojson=cart.jsonProductos(id);



    tablaMadre = document.getElementById("tablaCarrito");
    tabla = document.createElement('tbody');
    tabla.setAttribute("id", "tbody-" + id);

    var fila = document.createElement("tr");
    fila.setAttribute("class", "fila-vendedor");
    campo1 = document.createElement("td");
    fila.appendChild(campo1);
    campo2 = document.createElement("td");
    fila.appendChild(campo2);

    campo3 = document.createElement("td");
    campo3.innerHTML = "Vendidos por: " + nombre; 
    fila.appendChild(campo3);
//  = = = = BOTON REALIZAR COMPRA = = =  =
  
    buttonComprar = document.createElement("button");
    buttonComprar.setAttribute("id",id);
    buttonComprar.setAttribute("value", carrojson);
    buttonComprar.setAttribute("class", "btn btn-success");
    buttonComprar.setAttribute("name","enviar");
    buttonComprar.innerHTML = "Comprar productos";
    buttonComprar.setAttribute("onClick"," Mandardatos(this.value,this.id)");
    
//  = = = = BOTON BORRAR VENDEDOR = = =  =
    buttonBorrar = document.createElement("button");
    buttonBorrar.setAttribute("class", "btn btn-warning");
    buttonBorrar.innerHTML = "Borrar productos";
    buttonBorrar.setAttribute("onClick","cart.quitarVendedor(" + id + ")");
   //  = = = = = = = = = = = = = = =  = 
    campo4 = document.createElement("td");
    campo4.appendChild(buttonComprar);
    fila.appendChild(campo4);

    campo5 = document.createElement("td");
    campo5.appendChild(buttonBorrar);
    fila.appendChild(campo5);   

    campo6 = document.createElement("td");
    fila.appendChild(campo6); 

    tabla.appendChild(fila);
    tablaMadre.appendChild(tabla);
}


function Mandardatos(value, ide){

 var aux = [];

 var elements = {};
 
 var cantidad = document.getElementsByName('array[]');

  for (var i = 0; i < cantidad.length ; i++) {
                        //subtotal-1
      textToParse = cantidad[i].id.split("-");
      elements['id'] = textToParse[1];        
      elements['cantidad']= cantidad[i].value;
      aux.push(elements);
      elements={};
  
  }

createCookie('carrito', value);

createCookie('cantidad', JSON.stringify(aux));

createCookie('vendedor', ide);

 window.location.href = "compra.php";

}

var createCookie = function(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}
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
    
____________________________________
/ Si necesitas ayuda, contáctame en \
\ https://parzibyte.me               /
 ------------------------------------
        \   ^__^
         \  (oo)\_______
            (__)\       )\/\
                ||----w |
                ||     ||
Creado por Parzibyte (https://parzibyte.me).
------------------------------------------------------------------------------------------------
Si el código es útil para ti, puedes agradecerme siguiéndome: https://parzibyte.me/blog/sigueme/
Y compartiendo mi blog con tus amigos
También tengo canal de YouTube: https://www.youtube.com/channel/UCroP4BTWjfM0CkGB6AFUoBg?sub_confirmation=1
------------------------------------------------------------------------------------------------
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

    mostrarProductos(){
        console.log("mostrarProductos: " + window.location.pathname);
        if(window.location.pathname == "/Proyecto-Adoo/html/" 
            || window.location.pathname == "/Proyecto-Adoo/html/buscarProductos.php"
            || window.location.pathname == "/Proyecto-Adoo/html/verDetalles.php" 
            || window.location.pathname == "/Proyecto-Adoo/html/index.php"){ // BUSQUEDAS E INDEX

            this.vendedores.forEach(vendedor => {
                // console.log("Vendedor");
                vendedor.productos.forEach(producto => {
                    this.btnQuitar(producto.id, producto.nombre, vendedor.id);
                    // querySelect(producto.id);
                    // console.log("Producto");
                });
            });
        }
        else if(window.location.pathname == "/Proyecto-Adoo/html/verCarrito.php"){ // CARRITO
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
            resultado = JSON.parse(respuesta);
            renderVendor(resultado.nombre, id);
        },
        error: function() {
            console.error("No es posible completar la operación");
        }
    });  
}

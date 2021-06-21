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
    nombre.innerHTML = producto.nombre;
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
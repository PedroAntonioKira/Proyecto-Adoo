function renderProduct(producto, id_vendedor){
    console.log("Producto: " + producto.stock);

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
    inputCantidad = document.createElement("input");
    inputCantidad.setAttribute("id", "cantidad-" + producto.id);
    inputCantidad.setAttribute("type", "number");
    inputCantidad.setAttribute("min", "1");
    inputCantidad.setAttribute("max", producto.stock);
    inputCantidad.setAttribute("pattern", "^[0-9]+");
    inputCantidad.setAttribute("class", "form-control");
    inputCantidad.setAttribute("value", "1");
    inputCantidad.setAttribute("onChange", "cantidadCambiada(" + producto.id + ", " + producto.precio + ", " + producto.stock + ")");
    cantidad.appendChild(inputCantidad);
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
    if(cant > stock){
        cantidad.value = stock;
        cant = stock;
    }
    if((cant < 1 && stock > 0) || (cant % 1 != 0)){
        cantidad.value = "1";
        cant = stock;
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
//  = = = = BOTON EJEMPLO = = =  =
    buttonComprar = document.createElement("button");
    buttonComprar.setAttribute("value", "Comprar todo");
    buttonComprar.setAttribute("class", "btn");
    buttonComprar.innerHTML = "Comprar todo";
    buttonComprar.setAttribute("onClick","cart.listaProductos("+id+")");
//  = = = = BOTON EJEMPLO = = =  =
    campo4 = document.createElement("td");
    campo4.appendChild(buttonComprar);
    fila.appendChild(campo4);
    campo5 = document.createElement("td");
    fila.appendChild(campo5);    
    campo6 = document.createElement("td");
    fila.appendChild(campo6); 
    // texto = document.createElement("h4");
    // fila.innerHTML = "Vendidos por: " + nombre;  
    // fila.appendChild(texto);

    tabla.appendChild(fila);
    tablaMadre.appendChild(tabla);
}
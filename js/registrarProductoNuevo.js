function productType(type){
    if(type == 'dispositivos'){
        var form = document.getElementById("collapseExample1");
        form.className = "collapse show"; //collapse show
        var form = document.getElementById("collapseExample2");
        form.className = "collapse";        
    }
    else{
        var form = document.getElementById("collapseExample1");
        form.className = "collapse";
        var form = document.getElementById("collapseExample2");
        form.className = "collapse show";            
    }
}

function nuevoPrecio(){
    var precio = document.getElementById("precioProducto").value;
    var ganancias = precio * 0.85;
    ganancias = Math.round(ganancias * 100) / 100;

    var inputGanancias = document.getElementById("gananciasProducto");
    inputGanancias.value = ganancias;

    // console.log(inputPrecio);
}
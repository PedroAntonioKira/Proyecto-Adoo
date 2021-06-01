<?php
    session_start();
	require '../assets/connections/database.php';
    if(isset($_POST['publicar'])){
        $proceso = 0;
        // DATOS PARA DESCRIPCION
        $marca = trim($_POST['marca']); //
        $fabricante = "CANCELAR"; //X
        $altoprod = trim($_POST['altoprod']); //
        $anchoprod = trim($_POST['anchoprod']); //
        $bateriasinclu = "CANCELAR"; //X
        $tamañoram = trim($_POST['tamañoram']); //
        $tamañodiscoduro = trim($_POST['tamañodiscoduro']); //
        $sistemaoperativo = trim($_POST['sistemaoperativo']); //
        $procesador = trim($_POST['procesador']); //
        $tamañopantalla = trim($_POST['tamañopantalla']); //
        $resolucion = trim($_POST['resolucion']); //
        $numeroprocesadores = trim($_POST['numeroprocesadores']); //nucleos
        $tipodiscoduro = trim($_POST['tipodiscoduro']); //
        $imagen1 = trim($_POST['imagen1']);
        $imagen2 = trim($_POST['imagen2']);
        $imagen3 = trim($_POST['imagen3']);
        $color = trim($_POST['color']);
        $precio = trim($_POST['precio']);

        $insert_descripcion = "INSERT INTO `descripcion`(`marca`, `fabricante`, `altoprod`, `anchoprod`, `bateriasinclu`, `tamañoram`, `tamañodiscoduro`, `sistemaoperativo`, 
        `procesador`, `tamañopantalla`, `resolucion`, `numeroprocesadores`, `tipodiscoduro`, `imagen1`, `imagen2`, `imagen3`, `color`, `precio`) 
        VALUES ('$marca','$fabricante','$altoprod','$anchoprod','$bateriasinclu','$tamañoram','$tamañodiscoduro','$sistemaoperativo','$procesador','$tamañopantalla',
        '$resolucion','$numeroprocesadores','$tipodiscoduro','$imagen1','$imagen2','$imagen3','$color','$precio')";     

        $result_insert_description = mysqli_query($con, $insert_descripcion);
        if($result_insert_description){
             ?> <h3>Se publico descripción del producto</h3><?php
             $proceso += 1;
        }
        else{
            ?>
            <h3>Ocurrio un error al publicar descripción del producto</h3> 
            <?php            
        }
        // DATOS PARA PRODUCTO
        $nombre = trim($_POST['nombreProducto']);
        $stockProducto = trim($_POST['stockProducto']);
        $estado = "ESPERA";
        $calificacion = 5;
        // $calificacion = trim($_POST['5']);
        $categoria = trim($_POST['categoria']);
        $descripcion_id = mysqli_insert_id($con); // Ultimo id insertado (descripcion)

        $consulta_insert = "INSERT INTO `producto`(`nombre`, `stock`, `estado`, `calificacion`, `listacategorias_id`, `descripcion_id`)         
        VALUES ('$nombre','$stockProducto','$estado','$calificacion','$categoria','$descripcion_id')";
        $resultado = mysqli_query($con, $consulta_insert);
        if($resultado){
            $proceso += 1;
            ?>
            <h3>Se publico el producto </h3> 
            <?php  
        }
        else{
            ?><h3>Error al publicar el producto </h3><?php  
        }
        $producto_id = mysqli_insert_id($con); // Ultimo id insertado (producto)
        $vendedor_id = $_SESSION['id_vendedor'];
        $insert_catalogo = "INSERT INTO `catalogodeproductos`(`vendedor_id`, `producto_id`, `avgcalificacion`) 
        VALUES ('$vendedor_id','$producto_id','10')";
        $resultado_catalogo = mysqli_query($con, $insert_catalogo);
        if($resultado_catalogo){
            ?> <h3>Se registro el producto en el catalogo</h3> <?php 
             $proceso += 1;        
             if($proceso > 2){
                 header('location:./productosVendedor.php?registro=0');
             }  
        }
        else{
            ?>
            <h3>Error al registrar el producto en el catalogo</h3> 
            <?php  
        }
    }

?>
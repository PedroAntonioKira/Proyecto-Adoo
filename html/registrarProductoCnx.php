<?php
	require '../assets/connections/database.php';

    if(isset($_POST['publicar'])){
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
        $precio = trim($_POST['precio']);

        $insert_descripcion = "INSERT INTO `descripcion`(`marca`, `fabricante`, `altoprod`, `anchoprod`, `bateriasinclu`, `tamañoram`, `tamañodiscoduro`, `sistemaoperativo`, 
        `procesador`, `tamañopantalla`, `resolucion`, `numeroprocesadores`, `tipodiscoduro`, `imagen1`, `imagen2`, `imagen3`, `precio`) 
        VALUES ('$marca','$fabricante','$altoprod','$anchoprod','$bateriasinclu','$tamañoram','$tamañodiscoduro','$sistemaoperativo','$procesador','$tamañopantalla',
        '$resolucion','$numeroprocesadores','$tipodiscoduro','$imagen1','$imagen2','$imagen3','$precio')";     

        $result_insert_description = mysqli_query($con, $insert_descripcion);
        if($result_insert_description){
            ?>
            <h3>Se publico descripción del producto <?php $result_insert_description?></h3>
            <?php
        }
        else{
            ?>
            <h3>Ocurrio un error al publicar descripción del producto</h3>
            <?php            
        }
        // DATOS PARA PRODUCTO
        $nombre = trim($_POST['nombreProducto']);
        $calificacion = 5;
        // $calificacion = trim($_POST['5']);
        $categoria = trim($_POST['categoria']);
        $descripcion_id = mysqli_insert_id($con);

        $consulta_insert = "INSERT INTO `producto`(`nombre`, `calificacion`, `listacategorias_id`, `descripcion_id`)         
        VALUES ('$nombre','$calificacion','$categoria','$descripcion_id')";
        $resultado = mysqli_query($con, $consulta_insert);
        if($resultado){
            ?>
            <h3>Se publico el producto </h3> 
            <?php
        }
        else{
            ?>
            <h3>Ocurrio un error al publicar el producto</h3>
            <?php            
        }
    }

?>
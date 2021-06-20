<?php
    if( isset($_POST['data']) ) {
        require '../assets/connections/database.php';
        $id = $_POST['data'];
        $con->real_query("SELECT producto.id, producto.nombre, producto.stock, producto.estado, descripcion.precio, descripcion.imagen1 
                FROM producto, descripcion WHERE (producto.id = $id) AND (producto.descripcion_id = descripcion.id);");
        $resultado = $con->use_result();
        $fila = $resultado->fetch_assoc();
        $texto = json_encode($fila);
        echo $texto;
    } else {
        die("Solicitud no válida.");
    }
?>
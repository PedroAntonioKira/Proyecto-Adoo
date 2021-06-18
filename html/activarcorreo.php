
<?php

require '../assets/connections/database.php';


if(isset($_GET['correo']) && !empty($_GET['correo']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $correo = $_GET['correo']; // Set correo variable
    $hash = $_GET['hash']; // Set hash variable

    $search = "SELECT correo, hash, estatus FROM usuario WHERE correo='prueba@prueba.com' AND hash='10000' AND estatus!='VERIFICADO'"    
    $ejecutar=$con->query($search);
    $datos = $ejecutar->fetch_assoc();

    if($datos != NULL){
        echo("<script type='text/javascript'>alert('Este correo ya esta verificado o no Existe'); </script>");
    }else{
    
    $actualiza = "update usuario set estatus = 'VERIFICADO' where correo='$correo'";
    $ejecutar=$con->query($actualiza);
    
}
?>
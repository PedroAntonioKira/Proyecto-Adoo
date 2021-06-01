<?php
  session_start();
  require '../assets/connections/database.php';

  if(isset($_POST['Aceptar'])){
    if(!empty($_POST['correo']) && !empty($_POST['contrasena'])){
      $correo = $_POST['correo'];
      $contrasena = $_POST['contrasena'];

      $records = "SELECT * FROM usuario WHERE correo = '$correo'";

      $ejecutar = $con->query($records);
      $datos = $ejecutar->fetch_assoc();
      $message = '';

      if(($datos != NULL) && ($datos['contrasena']==$contrasena)){
        if($datos['actividad'] == 1){
          $correo = $datos['correo'];
          $sentencia = "SELECT info.nombre,info.apellidop,info.apellidom,info.institucion,vendedor.id,usuario.correo,usuario.contrasena,usuario.actividad,privilegios.privilegio FROM info INNER JOIN vendedor ON vendedor.info_id = info.id INNER JOIN usuario ON vendedor.usuario_correo = usuario.correo INNER JOIN privilegios ON usuario.privilegios_id = privilegios.id WHERE vendedor.usuario_correo = '$correo'";
          $columnas = $con->query($sentencia);
          $obtenido = $columnas->fetch_assoc();

          $_SESSION['nombre']=$obtenido['nombre'];
          $_SESSION['apellidop']=$obtenido['apellidop'];
          $_SESSION['apellidom']=$obtenido['apellidom'];
          $_SESSION['institucion']=$obtenido['institucion'];
          $_SESSION['id_vendedor']=$obtenido['id'];
          $_SESSION['correo']=$obtenido['correo'];
          $_SESSION['contrasena']=$obtenido['contrasena'];
          $_SESSION['actividad']=$obtenido['actividad'];
          $_SESSION['privilegio']=$obtenido['privilegio'];

          header('location: ../index.php');

        }else{
          $message = "<p style='color:#FF0000'>Tu estatus es inactivo<p/>";
        }
      }else{
        $message = "<p style='color:#FF0000'>No hay coincidencia en la base de datos<p/>";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de sesion</title>
    <meta charset="utf-8">



    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/productos.css">
    <script src="../js/productos.js"></script>
    <script src="../js/scriptp.js"></script>

    <!--Estilos del menu superior-->
    <link rel="stylesheet" href="../css/menuPrincipal01.css">
    <link rel="stylesheet" href="../css/Cuerpo01.css">
    <link rel="stylesheet" href="../css/login.css">
    <!--Estilos del slider-->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/main.js"></script>

</head>
<body>

  <?php require '../assets/navs/headerBaseHtml.php'; ?>
  <main>
    <div class="container">
      <div class="info">
        <h1 style="color:white;">
          Inicio de sesion <br>
          Vendedor
        </h1>
      </div>
    </div>
    <div class="form">
      <div class="thumbnail">
        <img src="../img/logo.png" />
      </div>
      <form class="login-form" action="login.php" method="post">
        <input type="email" name="correo" placeholder="Correo" required autocomplete="off">
        <input type="password" name="contrasena" placeholder="Contraseña" required autocomplete="off">
        <button type="submit" name="Aceptar">Aceptar</button>
      </form>
      <?php if (!empty($message)): ?>
        <p><?=  $message ?></p>
      <?php endif; ?>
        <br>
        <p>¿No tienes cuenta aun? <a href="crearCuentaVendedor.php"> <br>Crea Una Cuenta ahora</a></p>
      </main>

s</body>
</html>

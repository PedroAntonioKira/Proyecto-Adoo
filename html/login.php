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
          $sentencia = "SELECT info.nombre, info.apellidop, info.apellidom, info.institucion, vendedor.id, usuario.correo,
              usuario.contrasena, usuario.actividad, privilegios.privilegio FROM info INNER JOIN vendedor 
              ON vendedor.info_id = info.id INNER JOIN usuario ON vendedor.usuario_correo = usuario.correo 
              INNER JOIN privilegios ON usuario.privilegios_id = privilegios.id WHERE vendedor.usuario_correo = '$correo'";
          // Query para comprador
          // SELECT info.nombre, info.apellidop, info.apellidom, info.institucion, comprador.id, usuario.correo,
          // usuario.contrasena, usuario.actividad, privilegios.privilegio
          // FROM info INNER JOIN comprador 
          // ON comprador.info_id = info.id 
          // INNER JOIN usuario ON comprador.usuario_correo = usuario.correo 
          // INNER JOIN privilegios ON usuario.privilegios_id = privilegios.id WHERE comprador.usuario_correo = 'joss.alberto.r.m@gmail.com'          

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Cuenta | Iniciar Sesion</title>
    <meta charset="utf-8">



    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/productos.css">
    <script src="../js/productos.js"></script>
    <script src="../js/scriptp.js"></script>

    <!-- ESTILOS INDIVIDUALES/PERSONALIZADOS   -->
    <link rel="stylesheet" href="../css/login.css">


    <!-- <script src="../js/jquery-3.6.0.js"></script> -->
    <script src="../js/main.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
    <link rel="stylesheet" href="../css/navbar.css">    

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
        <p>¿No tienes cuenta aun? <a href="crearCuentaVendedor2.php"> <br>Crea Una Cuenta ahora</a></p>
    </main>
	  <?php require '../assets/navs/footer.php'; ?>
  </body>
</html>

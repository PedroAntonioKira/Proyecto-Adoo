<?php
  session_start();
  require '../assets/connections/database.php';
  require '../clases/Productos.php'; 
  
  $listaordenada = []; 
  $pedidosporvendedor= [];
  $flag=false;

  if(isset($_SESSION['correo'])){
    $privilegio = $_SESSION['privilegio'];
  }

  $json=json_decode($_POST['carrito']);

  for ($i=0; $i < count($json) ; $i++) { 

    $slot=new Slot;
    $prod=new Producto;
    
      $carrito=$json[$i];

          for($j=0; $j<count($carrito); $j++ ) {

                  $prod->setId($carrito->id);
              
                  $prod->setPrecio($carrito->price);
             
                  $prod->setNombre($carrito->name);
             
                  $prod->setCantidad($carrito->count);
             
                  $prod->setTotal($carrito->total);

                  $slot->setIdv($carrito->idv);

                    if(!empty($listaordenada))
                    {
              
                       for ($k=0; $k < count($listaordenada) ; $k++) { 
                       
                         if($listaordenada[$k]->idv == $slot->getIdv())
                         {

                          if(empty($pedidosporvendedor))
                          {
                            // echo "<script type='text/javascript'> alert('vacio e igual') </script>";
                            //$index=$k;
                            //$pedidosporvendedor=$listaordenada[$k]->productos;
                            array_push($listaordenada[$k]->productos, $prod);
                            $prod=null;
                          }
                           

                         }else
                         {
                          //echo "<script type='text/javascript'> alert('else') </script>";

                        $flag=true;

                         }

                       }


                    }else
                    {    //echo "<script type='text/javascript'> alert('else 2')</script>";
                        $flag=true;
                    }

            } 

if(!empty($prod)){
$pedidosporvendedor[]=$prod;

  if($flag)
  {
  $slot->setProductos($pedidosporvendedor);
  $listaordenada[]=$slot;
  $pedidosporvendedor=[];
  $flag=false;
  }

}

}

//var_dump($listaordenada)

  ?>

 <!DOCTYPE html>
<html lang="es">
<head>
    <title>Vendedores</title>
    <meta charset="utf-8">


    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/productos.css">
    <script src="../js/productos.js"></script>
    <script src="../js/scriptp.js"></script>

    <!--Estilos del menu superior-->
    <link rel="stylesheet" href="../css/menuPrincipal01.css">
    <link rel="stylesheet" href="../css/Cuerpo01.css">
    <link rel="stylesheet" href="../css/tablas.css">
    <!--Estilos del slider-->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/main.js"></script>

</head>
<body style="background: .white; ">
  <?php
    if($_SESSION == NULL){
      require '../assets/navs/headerBaseHtml.php';

    }elseif($_SESSION['privilegio'] == 'Comprador'){
      require '../assets/navs/headerCompradorHtml.php';
    }


  ?>

   <h1> Articulos por proveedor </h1>

<div class="wrapper">


  
  <div class="table">
    
    <div class="row header">
      <div class="cell">
        Nombre del proveedor
      </div>
      <div class="cell">
        Lugar de entrega
      </div>
      <div class="cell">
        Productos
      </div>
      <div class="cell">
        Compra 
      </div>
  

    </div>

  <?php  
    require '../assets/connections/database.php';

    for($n=0;$n < count($listaordenada); $n++)
    {
        $idv=$listaordenada[$n]->idv;

          $sentencia = "SELECT info.nombre,apellidop,apellidom FROM vendedor INNER JOIN info ON vendedor.info_id = info.id where vendedor.id=$idv"; 
          $ejecutar = $con->query($sentencia);
          $datos = $ejecutar->fetch_assoc();
          $productos = null;


          for ($i=0; $i < count($listaordenada[$n]->productos) ; $i++) { 
            
                $productos.=" ".$listaordenada[$n]->productos[$i]->nombre;

              }
          
              ?>

      
        <div class="row">
           
      <div class="cell" data-title="Nombre">
        <?php echo $datos["nombre"]." ".$datos["apellidop"]." ".$datos["apellidom"]; ?>
      </div>
      <div class="cell" data-title="Edad">
        
      </div>
      <div class="cell" data-title="Correo">
        <?php echo $productos; ?>
      </div>
      <div class="cell" data-title="Seleccion">
        <form method="POST" action="compra.html">
            <input type='hidden' value='<?php echo json_encode($listaordenada[$n]); ?>' name='carrito'>
        <center><button class="button" type="submit">Comprar</button></center>
          </form>
      </div>
     
    </div>
    



 <?php }?>


<?php
	session_start();
	require '../assets/connections/database.php';

	if(isset($_SESSION['correo'])){
		$privilegio = $_SESSION['privilegio'];
	}

// agregar variables de Linea y estacion
	// sustituirlas en linea 80
	// no mover nada mas :) por favor

$idc=$_SESSION['id_comprador'];
$carrito=$_POST["carrito"];
$text=$_POST['PuntoEntrega'];
$idv=$_POST["idv"];
$fecha_entrega = $_POST["input-fecha-final"];


$text=explode(",",$text);
var_dump($text);
$jsoncarrito=json_decode($carrito);

		require '../assets/connections/database.php';
		$totalparcial=0;
		$total=0;
		$bandera=false;
		$idcompra=0;
		for ($i=0; $i < count($jsoncarrito) ; $i++){

					$idprod=$jsoncarrito[$i]->id;
					$cantidad=$jsoncarrito[$i]->cantidad;


		$consprecio = "SELECT descripcion.precio FROM catalogodeproductos inner join producto on producto.id=catalogodeproductos.producto_id inner JOIN descripcion on descripcion.id=producto.descripcion_id WHERE vendedor_id=$idv AND producto_id = $idprod";
		$ejecutar = $con->query($consprecio);
			if($datos = $ejecutar->fetch_assoc())
			{
				$precio=$datos['precio'];
				$totalparcial=$precio*$cantidad;

			}

			$total=$totalparcial+$total;


		}

		$inscompra = "INSERT into compras(id_comprador,id_vendedor,total,estatus) values('$idc','$idv','$total','En proceso de entrega')";
		$ejecutar = $con->query($inscompra);

		if($ejecutar === TRUE)
		{


			$considcompra="SELECT LAST_INSERT_ID() as idcompra";
			$ejecutar = $con->query($considcompra);
			$datos = $ejecutar->fetch_assoc();
			$idcompra=$datos['idcompra'];



			for ($i=0; $i < count($jsoncarrito) ; $i++){

					$idprod=$jsoncarrito[$i]->id;
					$cantidad=$jsoncarrito[$i]->cantidad;


		$consprecio = "SELECT descripcion.precio,producto.stock FROM catalogodeproductos inner join producto on producto.id=catalogodeproductos.producto_id inner JOIN descripcion on descripcion.id=producto.descripcion_id WHERE vendedor_id=$idv AND producto_id = $idprod";
		$ejecutar = $con->query($consprecio);

			if($datos = $ejecutar->fetch_assoc())
			{

				$precio=$datos['precio'];
				$stock=$datos['stock'];
				$stocktotal=$stock-$cantidad;
				$totalparcial=$precio*$cantidad;

				$insprod = "INSERT into productos_comprados(id_compra,id_producto,cantidad,subtotal) values('$idcompra','$idprod',
				'$cantidad',
				'$totalparcial')";
				$ejecutar2 = $con->query($insprod);

				if($ejecutar2 === TRUE)
				{

					$updateprod="UPDATE producto SET stock=$stocktotal where id=$idprod";
					$ejecutar2 = $con->query($updateprod);


					$hoy=date("Y-M-d");
					$tiempo=date("H:m:s");

					$fechaEnt=$text[3];
					$horaEnt=$text[4];
					$linea=$text[1];
					$estacion=$text[2];

					$insentrega = "INSERT into entregas_compras(id_compra,fecha_entrega,hora_entrega,Linea,Estacion) 
						values('$idcompra','$fecha_entrega','$horaEnt','$linea','$estacion')"; // <-- Cambie esto
					$ejecutar3 = $con->query($insentrega);

					if($ejecutar3 === TRUE)
					{
						$bandera=true;
						setcookie("cantidad", "", time() - 3600);
						setcookie("carrito", "", time() - 3600);
						setcookie("vendedor", "", time() - 3600);
					}


				}


			}


		}
	}
	IF($bandera===true)
	{
	header('Location: /Proyecto-Adoo/html/informeCompra.php?id='.$idcompra);

	}


?>

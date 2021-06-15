<?php

class Slot
{
	public $idv;
	public $productos=[];

	
	function getIdv()
	{
		return $this->idv;
	}
	function getProductos()
	{
		return $this->productos;
	}

	function setIdv($idv)
	{

		$this->idv=$idv;

	}

	function setProductos($productos)
	{

		$this->productos=$productos;

	}




}

class Producto
{
	public $nombre;
	public $precio;
	public $id;
	public $cantidad;
	public $total;

	
	function getNombre()
	{
		return $this->nombre;
	}

	function getPrecio()
	{
		return $this->precio;
	}

	function getId()
	{
		return $this->id;
	}
	function getIdv()
	{
		return $this->idv;
	}

	function getCantidad()
	{
		return $this->cantidad;
	}

	function getTotal()
	{
		return $this->total;
	}

	function setId($id)
	{

		$this->id=$id;

	}

	function setIdv($idv)
	{

		$this->idv=$idv;

	}

	function setNombre($nombre)
	{

		$this->nombre=$nombre;

	}

	function setPrecio($precio)
	{

		$this->precio=$precio;
	}

	function setCantidad($cantidad)
	{

		$this->cantidad=$cantidad;
	}

	function setTotal($total)
	{

		$this->total=$total;
	}



}





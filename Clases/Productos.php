<?php

class slot
{
	public $idslot;
	public $producto;

	function getIdslot()
	{
		return $this->idslot;
	}
	function getProducto()
	{
		return $this->producto;
	}

	function setIdslot($id)
	{

		$this->idslot=$id;

	}

	function setProducto($idv)
	{

		$this->producto=$producto;

	}




}

class Producto
{
	public $nombre;
	public $precio;
	public $id;
	public $idv;

	
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


}





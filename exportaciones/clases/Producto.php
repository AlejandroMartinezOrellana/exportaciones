<?php

class Producto{
	private $nidproducto;
	private $snombre;
	private $ntotalusd;
	private $nano;
	private $querysel;
	function __construct($nid=NULL,$snom=NULL,$ntot=NULL,$nano=NULL){
		$this->nidproducto=$nid;
		$this->snombre=$snom;
		$this->ntotalusd=$ntot;
		$this->nano=$nano;
		
	}
	
	function IdProducto(){
		return $this->nidproducto;
	}
	
	function Nombre(){
		return $this->snombre;
	}
	
	function TotalUSD(){
		return $this->ntotalusd;
	}
	function Ano(){
		return $this->nano;
	}
	
	
	function Selecciona(){
		
		if (!$this->querysel){
		$db=dbconnect();
		/*Definición del query que permitira ingresar un nuevo registro*/
		
			$sqlsel="select idproducto,nombre,totalusd,ano from productos order by nombre";
		
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
		
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['idproducto'], $registro['nombre'], $registro['totalusd'], $registro['ano']);			
		}
		else {
			return false;
			
		}
	}
	
	function Elimina($id){
	
		$db=dbconnect();
		
			/*Definición del query que permitira eliminar un registro*/
			$sqldel="delete from productos where idproducto=:id";
	
			/*Preparación SQL*/
			$querydel=$db->prepare($sqldel);
			
			$querydel->bindParam(':id',$id);
			
			$valaux=$querydel->execute();
	
		return $valaux;
	}
					
}
?>
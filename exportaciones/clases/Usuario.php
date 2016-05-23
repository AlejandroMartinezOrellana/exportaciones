<?php 

class Usuario{
	private $nidacceso;
	private $snombre;
	private $susuario;
	private $sclave;
	
	function __construct($snom,$susr,$sclave){
		$this->snombre=$snom;
		$this->susuario=$susr;
		$this->sclave=md5($sclave);
	}
	public function getNombre(){
		return $this->snombre;
	}

	public function getIdacceso(){
		return $this->nidacceso;
	}
	
	function VerificaUsuario(){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombre from acceso
		where nomusuario=:usr";

		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlsel);

		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->susuario);
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1)return true; else return false;

	}

	function VerificaAcceso(){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombre from acceso
		where nomusuario=:usr and pwdusuario=:pwd";

		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlsel);

		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->susuario);
		$querysel->bindParam(':pwd',$this->sclave);

		$datos=$querysel->execute();

		if ($querysel->rowcount()==1){
			$this->snombre=$querysel->fetchColumn();
			
			return true;
		}
		else{
			return false;
		}


	}
	function ActualizaClave($snewpwd){
		$db=dbconnect();
		/*Definici�n del query que permitira actualizar la clave*/
		$sqlupd="update acceso
					set pwdusuario=:pwd
					where idacceso=:id";
	
		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlupd);
	
		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':pwd',md5($snewpwd));
		$querysel->bindParam(':id',$this->nidacceso);
		

		$valaux=$querysel->execute();
	
		return $valaux;
	}

}
?>
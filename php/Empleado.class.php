<?php
if ( !defined("__EMPLEADO__") ){
	define("__EMPLEADO__","");
	include("DataConnection.class.php");
	
	class Empleado{
		private $CURP;
		private $nombre;
		private $direccion;
		private $tipo;
		private $contrase�a;
		
		public function __construct($curp,$nombre,$direccion,$tipo,$contrase�a)
		{
			$this->CURP = $curp;
			$this->nombre = $nombre;
			$this->direccion = $direccion;
			$this->tipo = $tipo;
			$this->contrase�a = $contrase�a;		
		}
		
		public static function iniciarSesion($curp,$contrase�a){
			$db = new DataConnection();
			$result = $db->executeQuery("SELECT * FROM Empleado WHERE CURP='".$curp."' and Contrasena='".$contrase�a."'");			
			if ( $dato = mysql_fetch_assoc($result) ){
				$empleado = new Empleado($dato["CURP"],$dato["Nombre"],$dato["Direccion"],$dato["Area"],$dato["Contrasena"]);
				return $empleado;
			}
			return false;		
		}
		
		public function getNombre(){
			return $this->nombre;
		}
			
	}
}
?>
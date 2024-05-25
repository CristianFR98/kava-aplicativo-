<?php 
class conexion{
	public $host;
	public $usuario;
	public $contraseña;
	public $nombd;
	public $conn;
	public function __construct(){
		$this->host="localhost";
		$this->usuario="root";
		$this->contraseña="";
		$this->nombd="basededatoskava";
		$this->conn=new mysqli($this->host, $this->usuario, $this->contraseña, $this->nombd);
		if ($this->conn->connect_errno) {
			echo "fallo de conexion";
		}
	}
}
$conex=new conexion();



?>

   

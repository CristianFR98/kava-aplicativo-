<?php
class reservaslavara{
    public $conex;

    public function __construct($conexion) {
        $this->conex = $conexion;
    }

    public function insertarUsuario($nombre, $telefono, $fecha, $Hora, $Cantidadpersonas) {
        try {
            $san = "INSERT INTO `reservas` (`nombre`,`id_restaurantes`,`telefono`, `fecha`, `hora`, `numerodepersonas`) VALUES ('$nombre', '15', '$telefono', '$fecha', '$Hora', '$Cantidadpersonas')";
            if (mysqli_query($this->conex, $san)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $err) {
            return false;
        }
    }
}

include("conexion.php");

$nom = $_POST["nombres"];
$tel = $_POST["telefono"];
$fech = $_POST["fecha"];
$Hora = $_POST["Hora"]; 
$Cantidadpersonas = $_POST["Cantidadpersonas"]; 

$gestorInsercion = new reservaslavara($conex->conn);

if ($gestorInsercion->insertarUsuario($nom, $tel, $fech, $Hora, $Cantidadpersonas)) {
    echo '<script type="text/javascript">
      alert("Reserva exitosa.");
      location.href="../index.html";
      </script>';
} else {
    echo '<script type="text/javascript">
      alert("Datos no válidos.");
      location.href="../html/datosantikuario.html";
      </script>';
}
?>

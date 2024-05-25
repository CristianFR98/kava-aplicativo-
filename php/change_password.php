<?php
require_once 'conexion.php';

class actualizarPassword {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function actualizarPassword($idd, $pass) {
        $query = "UPDATE admin SET contraseña = ? WHERE id_restaurante = ?";
        $stmt = $this->conexion->prepare($query);

        
        $nuevaContraseña = mysqli_real_escape_string($this->conexion, $pass);

        $stmt->bind_param("si", $pass, $idd);
        
        return $stmt->execute();
    }
}

$conexion = new Conexion();
$idd = $_POST["id"];
$pass = $_POST["new_password"];

$passwordUpdater = new actualizarPassword($conexion->conn);
$result = $passwordUpdater->actualizarPassword($idd, $pass);

if ($result) {
    echo '<script type="text/javascript">
        alert("inicia sesion, con tu nueva contraseña.");
        location.href = "index1.php";
        </script>';
} else {
    echo '<script type="text/javascript">
        alert("Hubo un error al actualizar la contraseña.");
        location.href = "index1.php";
        </script>';
}

$conexion->cerrarConexion();
?>






<?php
class insertarUsuario {
    private $conex;

    public function __construct($conexion) {
        $this->conex = $conexion;
    }

    public function insertarUsuario($usuario, $email, $telefono, $contrasena) {
        try {
            $san = "INSERT INTO `admin` (`usuario`, `email`, `contraseña`, `telefono`) VALUES ('$usuario', '$email', '$contrasena', '$telefono')";
            if (mysqli_query($this->conex, $san)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $err) {
            return false;
        }
    }

    public function verificarDisponibilidad($email, $telefono) {
        $sql = "SELECT * FROM `admin` WHERE `email` = '$email' OR `telefono` = '$telefono'";
        $result = mysqli_query($this->conex, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // El correo o el teléfono ya existen en la base de datos.
                return false;
            } else {
                // El correo y el teléfono son válidos y pueden ser utilizados.
                return true;
            }
        } else {
            // Error en la consulta SQL.
            return false;
        }
    }
}

include("conexion.php");

$usu = $_POST["usuario"];
$ema = $_POST["email"];
$tel = $_POST["telefono"];
$conta = $_POST["contraseña"];

$gestorInsercion = new insertarUsuario($conex->conn);

if ($gestorInsercion->verificarDisponibilidad($ema, $tel)) {
    // El correo y el teléfono son válidos y no existen en la base de datos.
    if ($gestorInsercion->insertarUsuario($usu, $ema, $tel, $conta)) {
        echo '<script type="text/javascript">
            alert("Registro exitoso.");
            location.href="index1.php";
            </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Error al registrar usuario.");
            location.href="registrousuario.php";
            </script>';
    }
} else {
    // El correo o el teléfono ya existen en la base de datos.
    echo '<script type="text/javascript">
        alert("El correo o el teléfono ya están en uso.");
        location.href="registrousuario.php";
        </script>';
}
?>


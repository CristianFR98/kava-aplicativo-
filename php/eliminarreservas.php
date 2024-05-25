<?php
include("conexion.php");

class EliminarReserva {
    public $conex;

    public function __construct($conexion) {
        $this->conex = $conexion;
    }

    public function eliminarReserva($id) {
        $conexion = $this->conex->conn;
        $stmt = $conexion->prepare("DELETE FROM reservas WHERE ID = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

if (!empty($_GET["id"])) {
    $id = intval($_GET["id"]);

    if ($id > 0) {
        $eliminarReserva = new EliminarReserva($conex);

        if ($eliminarReserva->eliminarReserva($id)) {
            echo '<script type="text/javascript">
            alert("Reservación eliminada.");
            location.href="../php/admin.php";
            </script>';
        } else {
            echo '<script type="text/javascript">
            alert("No se pudo eliminar la reservación.");
            location.href="../php/admin.php";
            </script>';
        }
    } else {
        echo '<script type="text/javascript">
        alert("El valor de ID no es válido.");
        location.href="../php/admin.php";
        </script>';
    }
} else {
    echo '<script type="text/javascript">
    alert("ID no proporcionado.");
    location.href="../php/admin.php";
    </script>';
}
?>

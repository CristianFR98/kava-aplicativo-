<?php
require_once("conexion.php");

class InsertarRestaurante {
    private $conex;

    public function __construct($conexion) {
        $this->conex = $conexion;
    }

    public function insertarRestaurante($nombreRestaurante, $ubicacion, $menu, $documentos, $imagenes) {
        $carpetaDocumentos = '../documentos/';
        $carpetaImagenes = '../img/';

        // Procesar documentos
        $rutasDocumentos = array();
        foreach ($documentos['name'] as $key => $documentoNombre) {
            $rutaDocumento = $carpetaDocumentos . $documentoNombre;
            move_uploaded_file($documentos['tmp_name'][$key], $rutaDocumento);
            $rutasDocumentos[] = $rutaDocumento;
        }

        // Procesar imágenes
        $rutasImagenes = array();
        foreach ($imagenes['name'] as $key => $imagenNombre) {
            $rutaImagen = $carpetaImagenes . $imagenNombre;
            move_uploaded_file($imagenes['tmp_name'][$key], $rutaImagen);
            $rutasImagenes[] = $rutaImagen;
        }

        // Insertar datos en la base de datos
        $conexion = $this->conex->conn;
        $san = "INSERT INTO `documentos` (`documentos`, `nombre_del_restaurante`, `ruta_o_direccion`, `imagen`, `menu`) VALUES ('" . implode(",", $rutasDocumentos) . "', '$nombreRestaurante', '$ubicacion', '" . implode(",", $rutasImagenes) . "', '$menu')";

        if (mysqli_query($conexion, $san)) {
            return true;
        } else {
            return false;
        }
    }
}

if(isset($_POST['btn_ingresar'])){
    $nombreRestaurante = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $menu = $_FILES['menu']['name'];
    $documentos = $_FILES['documentos'];
    $imagenes = $_FILES['imagenes'];

    $gestorInsercion = new InsertarRestaurante($conex);

    if ($gestorInsercion->insertarRestaurante($nombreRestaurante, $ubicacion, $menu, $documentos, $imagenes)) {
        echo '<script type="text/javascript">
        alert("Envío de datos exitoso.");
        location.href="../php/admin.php";
        </script>';
    } else {
        echo "Error en el envío de datos.";
    }
}
?>

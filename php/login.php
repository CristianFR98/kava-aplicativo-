<?php
require_once 'conexion.php';

class Login {
    private $conex;

    public function __construct($conex) {
        $this->conex = $conex;
    }

    public function login($username, $password) {
        $query = "SELECT * FROM admin WHERE usuario='$username' AND contraseña='$password'";
        $result = $this->conex->conn->query($query);

        if ($result->num_rows > 0) {
            // Obtener el ID del restaurante asociado al administrador
            $admin = $result->fetch_assoc();
            $id_restaurante_admin = $admin['id_restaurantes'];

            // Almacenar el ID del restaurante en la sesión
            session_start();
            $_SESSION['id_restaurantes'] = $id_restaurante_admin;

            // Redirigir al administrador a la página de reservas
            header("Location: admin.php");
            exit();
        } else {
            // Mostrar mensaje de error o redirigir al inicio de sesión
            echo '<script type="text/javascript">
            alert("Usuario o Contraseña incorrectos. Por favor, inténtalo de nuevo.");
            location.href = "index1.php";
            </script>';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usuario'];
    $password = $_POST['contraseña'];

    $loginController = new Login($conex);
    $loginController->login($username, $password);
}
?>
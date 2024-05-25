
<?php
session_start(); // Asegúrate de iniciar la sesión
?>

<!DOCTYPE html>
<html>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/f9a5ecb2dd.js" crossorigin="anonymous"></script>
<head>
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div id="sidebar">
        <div><img src="../img/kava.png" alt=""></div>
        <div class="sidebar_interior">
            <div class="module" onclick="openModule('ingresar')"> Ingresar Restaurante</div>
            <div class="module" onclick="openModule('restaurant')">Modificar Restaurante</div>
            <div class="module" onclick="openModule('reservations')">Datos de Reservacion</div>
            <div class="module" onclick="openModule('Cerrarsesion')"><a href="../php/index1.php" class="link_Cerrar">Salir</a></div>
        </div>
    </div>
    <div id="content">
        <h1>Bienvenido al Panel de Administrador Kava</h1>
        






        <div id="ingresar" class="hidden">
            <h3>ingresar restaurante</h3>

            <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"]{
            width: 80%;
            padding: 10px;
            margin-top: 5px;

        }
        input[type="file"] {
            width: 21%;
            padding: 10px;
            margin-top: 5px;
        }
        textarea {
            width: 100%;
            padding: 10px;
        }
        button {
            background-color: orange;
            color: #fff;
            padding: 10px 20px;
            border :3px;
            cursor: pointer;
        }
    </style>
       
       <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Restaurante</title>
</head>
<body>
    <form action="ingresoderestaurantes.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre del Restaurante:</label>
            <input type="text" id="nombre" name="nombre" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="documentos">Documentos del Restaurante:</label>
            <input type="file" id="documentos" name="documentos[]" accept=".pdf,.doc,.docx" multiple required>
        </div>
        <div class="form-group">
            <label for="imagenes">Imágenes del Restaurante:</label>
            <input type="file" id="imagenes" name="imagenes[]" accept="image/*" multiple>
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación en Google Maps:</label>
            <input type="text" id="ubicacion" name="ubicacion" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="menu">Menú o Carta (Imagen):</label>
            <input type="file" id="menu" name="menu" accept="image/*">
        </div>
        <button type="submit" name="btn_ingresar">Enviar</button>
    </form>
</body>
</html>

        </div>
        <div id="restaurant" class="hidden">
            <h3>Modificar Restaurante</h3>

            <h2>Seleccionar y cambia tu logo</h2>
    <form id="image-form">
        <input type="file" id="imageInput" accept="image/*" required>
        <div id="image-container">
            <img id="selected-image" src="#" alt="Imagen Seleccionada">
        </div>
       <br> <button type="button" onclick="enviarImagen()">Enviar Imagen</button>
    </form>
    <script>
        const imageInput = document.getElementById("imageInput");
        const selectedImage = document.getElementById("selected-image");
        
        imageInput.addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    selectedImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                selectedImage.src = "#";
            }
        });

        function enviarImagen() {
            // Obtener el formulario y la imagen
            const imageForm = document.getElementById("image-form");
            const image = document.createElement("img");
            image.src = selectedImage.src;
            image.alt = "Imagen Enviada";

            // Crear la nueva ventana
            const newWindow = window.open("enviar_imagen.html", "_blank", "width=400,height=400");

            // Esperar a que la nueva ventana cargue antes de agregar la imagen
            newWindow.onload = function () {
                const targetContainer = newWindow.document.getElementById("target-container");
                targetContainer.appendChild(image);
            };
        }
    </script>
        </div>
        <div id="reservations" class="hidden">
            
    <h3>Datos de Reservacion</h3>
    <table>
        <tr>
            <th>ID de Reserva</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Cantidad de Personas</th>
            <th></th>
        </tr>
        <?php
        if (isset($_SESSION['id_restaurantes'])) {
            $id_restaurante_admin = $_SESSION['id_restaurantes'];

            include("conexion.php");
            $conexion = $conex->conn;
            function mostrar($conexion, $id_restaurante) {
                $consulta = mysqli_query($conexion, "SELECT * FROM reservas WHERE id_restaurantes = $id_restaurante");
                if ($consulta) {
                    foreach ($consulta as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['fecha']; ?></td>
                            <td><?php echo $row['hora']; ?></td>
                            <td><?php echo $row['numerodepersonas']; ?></td>
                            <td>
    <a onclick="return eliminar()" href="eliminarreservas.php?id=<?= $row['ID'] ?>"><i class="fa-solid fa-trash"></i></a>
    </td>
    </tr>
    <?php
    }
    // Cerrar la consulta
    mysqli_free_result($consulta);
    } else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }
    }

    try {
    mostrar($conexion, $id_restaurante_admin);
    } catch (\Throwable $er) {
    echo "No es posible conectar con la base de datos: " . $er->getMessage();
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
    } else {
    echo "No se ha iniciado sesión como administrador.";
    }
        ?>
    </table>

    <script>
    function mostrarAlerta() {
    Swal.fire(
                'Perfecto!',
                'Reservaciones actualizadas!',
                'success'
    );
    }
</script>

<p><button onclick="mostrarAlerta()">Actualizar</button></p>
</div>



    <script>
function openModule(module) {
const modules = ['restaurant', 'document', 'reservations', 'ingresar'];
modules.forEach(mod => {
const el = document.querySelector(`#${mod}`);
if (el) el.classList.add('hidden');
});

const selectedModule = document.querySelector(`#${module}`);
if (selectedModule) {
selectedModule.classList.remove('hidden');
const moduleButtons = document.querySelectorAll('.module');
moduleButtons.forEach(button => {
button.classList.remove('active');
});
event.target.classList.add('active');
}
}
</script>
<script>

function eliminar(){

var respuesta=confirm("estas seguro que quieres eliminar?");
return respuesta
}


</script>

</body>
</html>

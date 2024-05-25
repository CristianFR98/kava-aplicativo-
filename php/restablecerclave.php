<!DOCTYPE html>
<html>
<head>
    <title>Olvidé mi contraseña</title>
    <link rel="stylesheet" href="../css/restablecercontraseña.css">
</head>

<body>
    
    <form id="forgotPasswordForm" action="change_password.php" method="post" >
        <label class="titulodelform" for="email">Restablecer contraseña:</label>
        <input type="text" id="email" name="new_password" placeholder="nueva contraseña" autocomplete="off" required>
        <input class="cuadrorestablecer"type="hidden" name="id" value="<?php echo $_GET['id'];?> " autocomplete="off">
        <input class="enviar" type="submit" value="enviar">
        <img class="imagenkava" src="../img/kava.png" >
        <a class="volverainiciodesesion" href="index1.php" >!iniciar sesion¡</a>
    </form>
</body>
</html>
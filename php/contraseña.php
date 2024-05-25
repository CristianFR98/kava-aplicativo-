<!DOCTYPE html>
<html>
<head>
    <title>Olvidé mi contraseña</title>
    <link rel="stylesheet" href="../css/contraseña.css">
</head>
<body>
   
    
    <form id="forgotPasswordForm" action="resetemail.php" method="post" >
        <label class="titulodelform" for="email">Restablecer contraseña:</label>
        <input type="email" id="email" name="email" placeholder="Digite su Correo" required>
        <br>
         <input class="enviar" type="submit" value="Enviar">
        <img class="imagenkava" src="../img/kava.png" >
         <a class="volverainiciodesesion" href="index1.php" >!iniciar sesion¡</a>
    </form>
</body>
</html>
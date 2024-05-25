
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE USUARIO</title>
    <link rel="stylesheet" href="../css/registrousuario.css">
</head>
<body>  
    <form id="registro" action="ingresardatos.php" method="post" >
        
        <label class="tituloform" type="texto">registro de datos</label>
        <input class="usuario"type="text" name="usuario" placeholder="usuario" required>
        <input class="email"type="email" name="email" placeholder="email" required>
        <input class="contraseña" type="password" name="contraseña"placeholder="contraseña" autocomplete="off" required>
        <input class="telefono" type="text" name="telefono"placeholder="Telefono" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
        

        <img class="imagenkava" src="../img/kava.png" >
        
        <input class="registrardatos" type="submit" value="registrarse">
        <a class="volverainiciodesesion" href="index1.php" >!Ya tengo una cuenta¡</a>
    </form>
</body>
</html>




<?php













?>
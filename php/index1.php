<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index2.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>LOG IN</title>
</head>

<body>
   
    <div>
        <div class="login_container">
            <h1 style="font-family: 'Times New Roman', Times, serif;
            font-size: 40px;">Log <span style="color: #D96B2B;">In</span></h1>
            <div class="cuadro_img">
                <img class="img_login" src="../img/kava.png" >
                
            </div>
            
            <form action="login.php" method="post">
               
               <p> <label for="usuario" class="nombre_campo"></label></p>
                <input type="text" id="usuario" placeholder="Usuario :" name="usuario" class="input_campo" autocomplete="off"  required>
              
                <div class="password-wrapper">
                <a  href="../index.html"><img class="flecha-enlace"  src="../img/casa.png" ></a>
               <p> <label for="contraseña" class="nombre_campo"></label></p>
                <input type="password" id="contraseña" placeholder="Contraseña :" name="contraseña"  class="input_campo" autocomplete="off" required>
                <div class="password-toggle" onclick="togglePasswordVisibility(this)"></div>
                </div>
                
                <P class="campo_contraseña"><a href="contraseña.php">He olvidado mi contraseña !<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
                <body>
                   
                </body>
                </html></a></P>
                <p><button type="submit" class="btn_login"><b>Iniciar Sesión</b></button></p>
                
            </form>
            <p class="bontonregistrar">¿No Tienes una Cuenta ?<a  href="registrousuario.php"><b>Registrarse</b></a></p>
        </div>
        <div class="container_links_inferiores">
           <p><a class="links_inferiores" href=""><b>Idioma</b></a><a class="links_inferiores" href=""><b>Ayuda</b></a><a class="links_inferiores" href=""><b>Privacidad</b></a><a class="links_inferiores" href=""><b>Terminos y Condiciones</b></a></p>
        </div>

        <script>
            function togglePasswordVisibility(toggle) {
            var passwordInput = toggle.previousElementSibling;

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggle.classList.add("active");
            } else {
                passwordInput.type = "password";
                toggle.classList.remove("active");
            }
        }
    </script>

<?php

 if(isset($_GET['message'])){

?>  
<b>
  <div class="alert alert-primary" role="alert" id="alertalogin">

    <?php
    
    switch ($_GET['message']) {
        case 'ok':
         echo 'Revisa tu correo electronico';
         
         break;
        
    default:
         echo" Su correo no esta registrado ";
        break;
    }
    ?>
    
</div></b>
<?php
}
?>

  
 
   
</body>


</html>


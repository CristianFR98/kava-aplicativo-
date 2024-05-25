<?php
include("conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



 
$correo=$_POST["email"]; 
$sql = "SELECT * FROM admin WHERE email = '$correo' ";
$conexion= $conex->conn;
$result = $conexion->query($sql);
$row = $result ->fetch_assoc();

if ($result->num_rows > 0) {


    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug =0;                                     
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'adsikava@gmail.com';                    
        $mail->Password   = 'uvzh thla eroj bupw';                               
        $mail->SMTPSecure = "ssl";                             
        $mail->Port       = 465;                                   
    
        //Recipients
        $mail->setFrom('adsikava@gmail.com', 'KAVA');
        $mail->addAddress($correo);     
                  
      
    $mail->addAttachment('../img/kava.png');
    
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Restablecemiento de clave  Kava';
        $mail->Body = 'has solicitado este restablecimiento de contraseña, por favor, contáctanos de inmediato si no solicitaste el restablecimiento
        de tu contraseña, por favor visita la siguiente pagina para cambiar tu contraseña
        <a href="localhost/proyecto/php/restablecerclave.php? id='.$row['id'].'">Recuperacion De Contraseña</a>"';
       
        
        $mail->send();
       
        
               echo("<script>window.location.href = '../php/index1.php?message=ok'</script>");

        }catch (Exception $e) {
           
            echo("<script>window.location.href = '../php/index1.php?message=error'</script>");
        }


     } else {
         echo("<script>window.location.href = '../php/index1.php?message=error'</script>");
    }

?>
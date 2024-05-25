<?php

class DocumentViewer {
    private $claveAccesoCorrecta;

    public function __construct() {
        $this->claveAccesoCorrecta = 'documentos123456';
    }

    public function verificarClave($claveIngresada) {
        if ($claveIngresada === $this->claveAccesoCorrecta) {
            $this->redirigirDocumento();
        } else {
            $this->redirigirError();
        }
    }

    private function redirigirDocumento() {
        echo '<script type="text/javascript">
            alert("Clave de acceso correcta.");
            location.href = "../documentos/1.Nombre presenta e infografia de Certif sobre situac tribut.pdf";
        </script>';
    }

    private function redirigirError() {
        echo '<script type="text/javascript">
            alert("Clave de acceso incorrecta.");
            location.href = "../html/chilipeppers.html";
        </script>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $claveIngresada = $_POST['clave'];

    $documentViewer = new DocumentViewer();
    $documentViewer->verificarClave($claveIngresada);
}

?>
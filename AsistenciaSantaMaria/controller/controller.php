<?php
require '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido=$_POST['apellido'];
    $sexo=$_POST['sexo'];
    $especialidad=$_POST['especialidad'];

//    $archivo = $_FILES['archivo'];

    if($nombre === '' || $apellido===''|| $sexo===''||$especialidad==='') { // Verifica si el campo de usuario o archivo están vacíos

        echo json_encode(['error' => 'Llene todos los campos']);
    } else {
        $modelo = new Modelo();
        $respuesta = $modelo->guardarPersona($nombre, $apellido, $sexo, $especialidad);
        $modelo->cerrarConexion();
    
        echo json_encode($respuesta);
    }
}
?>

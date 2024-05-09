<?php
require '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombreSalida'];
    $apellido=$_POST['apellidoSalida'];
    $sexo=$_POST['sexoSalida'];
    $especialidad=$_POST['especialidadSalida'];

//    $archivo = $_FILES['archivo'];

    if($nombre === '' || $apellido===''|| $sexo===''||$especialidad==='') {
        echo json_encode(['error' => 'Llene todos los campos']);
    } else {
        $modelo = new Modelo();
        $respuesta = $modelo->guardarPersonaSalida($nombre, $apellido, $sexo, $especialidad);
        $modelo->cerrarConexion();

        echo json_encode($respuesta);
    }
}
?>

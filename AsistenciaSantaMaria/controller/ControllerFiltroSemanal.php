<?php
require '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin=$_POST['fechaFin'];


//    $archivo = $_FILES['archivo'];

    if($fechaInicio === '' || $fechaFin==='') {
        echo json_encode(['error' => 'Llene todos los campos']);
    } else {
        $modelo = new Modelo();
        $respuesta = $modelo->guardarFiltroSemanal($fechaInicio, $fechaFin);
        $modelo->cerrarConexion();

        echo json_encode($respuesta);
    }
}
?>


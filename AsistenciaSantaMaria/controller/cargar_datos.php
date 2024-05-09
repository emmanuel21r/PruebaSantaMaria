<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require '../model/model.php';

    
    $modelo = new Modelo();
    $datos = $modelo->getMostrar();
    $modelo->cerrarConexion();

    echo json_encode($datos);
} else {
    // Manejo de solicitudes no válidas (por ejemplo, redireccionar o mostrar un mensaje de error)
    http_response_code(400); // Código de respuesta HTTP 400 (Bad Request)
    echo json_encode('Solicitud no válida');
}
?>

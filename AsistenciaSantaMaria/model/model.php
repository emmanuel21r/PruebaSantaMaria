<?php
class Modelo {
    private $conn;

    public function __construct() {
        $hostname = "localhost"; // Cambia esto al nombre de tu servidor MySQL
        $username = "root";      // Cambia esto a tu nombre de usuario de MySQL
        $password = "";          // Cambia esto a tu contraseña de MySQL
        $database = "usuario3";  // Cambia esto al nombre de tu base de datos

        $this->conn = mysqli_connect($hostname, $username, $password, $database);

        if (!$this->conn) {
            die("La conexión a la base de datos falló: " . mysqli_connect_error());
        }
    }

    public function guardarPersona($nombre, $apellido, $sexo, $especialidad)
    {
        $nombre = mysqli_real_escape_string($this->conn, $nombre);
        $apellido = mysqli_real_escape_string($this->conn, $apellido);
        $sexo = mysqli_real_escape_string($this->conn, $sexo);
        $especialidad = mysqli_real_escape_string($this->conn, $especialidad);


        $sql = "INSERT INTO persona (nombre, apellido, sexo, especialidad) VALUES (
                                                                           '$nombre', 
                                                                           '$apellido', 
                                                                           '$sexo', 
                                                                           '$especialidad')";

        if (mysqli_query($this->conn, $sql)) {

            $id_persona = mysqli_insert_id($this->conn);

            $sql2 = "INSERT INTO asistencia (estado, idPersona, fechaAsistencia) VALUES ('ENTRADA','$id_persona', CURRENT_TIMESTAMP)";

            if (mysqli_query($this->conn, $sql2)) {
                return 'Datos guardados correctamente.';
            } else {
                return 'Error al guardar los datos de asistencia: ' . mysqli_error($this->conn);
            }
        }else {
            return 'Error al guardar los datos en la tabla "persona": ' . mysqli_error($this->conn);
        }
    }


    public function guardarPersonaSalida($nombre, $apellido, $sexo, $especialidad)
    {
        $nombre = mysqli_real_escape_string($this->conn, $nombre);
        $apellido = mysqli_real_escape_string($this->conn, $apellido);
        $sexo = mysqli_real_escape_string($this->conn, $sexo);
        $especialidad = mysqli_real_escape_string($this->conn, $especialidad);


        $sql = "INSERT INTO persona (nombre, apellido, sexo, especialidad) VALUES (
                                                                           '$nombre', 
                                                                           '$apellido', 
                                                                           '$sexo', 
                                                                           '$especialidad')";

        if (mysqli_query($this->conn, $sql)) {

            $id_persona = mysqli_insert_id($this->conn);

            $sql2 = "INSERT INTO asistencia (estado, idPersona, fechaAsistencia) VALUES ('SALIDA','$id_persona', CURRENT_TIMESTAMP)";

            if (mysqli_query($this->conn, $sql2)) {
                return 'Datos guardados correctamente.';
            } else {
                return 'Error al guardar los datos de asistencia: ' . mysqli_error($this->conn);
            }
        }else {
            return 'Error al guardar los datos en la tabla "persona": ' . mysqli_error($this->conn);
        }
    }


    public function guardarFiltroSemanal($fechaInicio, $fechaFin){

        $fechaInicio = date('Y-m-d', strtotime($fechaInicio));
        $fechaFin = date('Y-m-d', strtotime($fechaFin));

        $sql = "SELECT * FROM persona INNER JOIN asistencia ON persona.id = asistencia.idPersona 
            WHERE date(fechaAsistencia) BETWEEN '$fechaInicio' AND '$fechaFin'";

        $resultado = mysqli_query($this->conn, $sql);

        $datos = [];
        if ($resultado) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $datos[] = $fila;
            }
        } else {
            echo "Error en la consulta: " . mysqli_error($this->conn);
        }

        return $datos;
    }









    

    public function getMostrar() {

       

        $sql = "SELECT * FROM persona inner join asistencia on id=idPersona"; // Cambia 'persona' al nombre de tu tabla
        $resultado = mysqli_query($this->conn, $sql);
    
        $datos = [];
    
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $datos[] = $fila;
        }
    
        return $datos;
    }
    
    

    public function cerrarConexion() {
        mysqli_close($this->conn);
    }
}
?>

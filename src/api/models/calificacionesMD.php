<?php

include(__DIR__ . "/../../middleware/db.php");

//Funcion para mostrar las calificaciones ,asignatura de un estudiante
function mostrarCalificacionesEstudianteID($db, $id_estudiante)
{
    //$id_estudiante = isset($_GET['id']) ? intval($_GET['id']) : null;
    $sql = "SELECT c.calificacion_id, c.asignatura_id, a.nombre AS nombre_asignatura, e.estudiante_id, e.nombre, e.apellido, c.calificacion
            FROM calificaciones c
            INNER JOIN estudiantes e ON c.estudiante_id = e.estudiante_id
            INNER JOIN asignatura a ON c.asignatura_id = a.asignatura_id
            WHERE c.estudiante_id = $id_estudiante";

    $result = $db->executeQuery($sql);

    if ($result === false) {
        echo "Error en la consulta SQL: " . $db->error;
    }
    // tratamiento de los datos
    if ($result->num_rows > 0) {
        $calificacion = $result->fetch_object();
        $datos = $calificacion;
    } else {
        echo "Calificación no encontrada.";
    }
    echo json_encode($datos);
}

/*echo "<br>";
        echo "ID Calificacion: " . $calificacion->calificacion_id . "<br>";
        echo "ID Asignatura: " . $calificacion->asignatura_id . "<br>";
        echo "ID Estudiante: " . $calificacion->estudiante_id . "<br>";
        echo "Nombre de asignatura : " . $calificacion->nombre_asignatura . "<br>";
        echo "Nombre Estudiante: " . $calificacion->nombre . "<br>";
        echo "Apellido Estudiante: " . $calificacion->apellido . "<br>";
        echo "Calificacion: " . $calificacion->calificacion. "<br>";
        echo "<br>";*/

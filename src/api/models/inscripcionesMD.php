<?php

include(__DIR__ . "/../../middleware/db.php");

//funcion para mostrar inscripcion de un alumno por ID
function mostrarInscripcionesEstudianteID($db, $id_estudiante)
{
    //$id_estudiante = isset($_GET['id']) ? intval($_GET['id']) : null;


    $sql = "SELECT i.inscripcion_id, i.asignatura_id, a.nombre AS nombre_asignatura, e.estudiante_id, e.nombre, e.apellido, i.fecha_ins
            FROM inscripciones i
            INNER JOIN estudiantes e ON i.estudiante_id = e.estudiante_id
            INNER JOIN asignatura a ON i.asignatura_id = a.asignatura_id
            WHERE i.estudiante_id = $id_estudiante";
    $result = $db->executeQuery($sql);

    if ($result === false) {
        echo "Error en la consulta SQL: " . $db->error;
    }

    // tratamiento de los datos
    if ($result->num_rows > 0) {
        $inscripcion = $result->fetch_object();
        $datos = $inscripcion;
    } else {
        echo "inscripcion no encontrada.";
    }
    echo json_encode($datos);
}


/*echo "<br>";
        echo "ID Inscripción: " . $inscripcion->inscripcion_id . "<br>";
        echo "ID Asignatura: " . $inscripcion->asignatura_id . "<br>";
        echo "ID Estudiante: " . $inscripcion->estudiante_id . "<br>";
        echo "Nombre de asignatura : " . $inscripcion->nombre_asignatura . "<br>";
        echo "Nombre Estudiante: " . $inscripcion->nombre . "<br>";
        echo "Apellido Estudiante: " . $inscripcion->apellido . "<br>";
        echo "Fecha Inscripción: " . $inscripcion->fecha_ins . "<br>";
        echo "<br>";*/
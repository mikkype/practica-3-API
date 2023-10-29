<?php

include(__DIR__ . "/../../middleware/db.php");

//funcion para mostrar asignatura
function mostrarAsignatura($db)
{
    $sql = 'SELECT * FROM asignatura';
    $result = $db->executeQuery($sql);
    if ($result === false) {
        echo "Error en la consulta SQL: " . $db->error;
    }
    // tratamiento de los datos
    $users = array();
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
    echo json_encode($users);
}

//funcion para mostrar asignatura por ID
function mostrarAsignaturaID($db, $id_asignatura)
{
    //$id_asignatura = isset($_GET['id']) ? intval($_GET['id']) : null;

    $sql = "SELECT * FROM asignatura WHERE asignatura_id = $id_asignatura";
    $result = $db->executeQuery($sql);

    if ($result === false) {
        echo "Error en la consulta SQL: " . $db->error;
    }
    // tratamiento de los datos
    if ($result->num_rows > 0) {
        $asignatura = $result->fetch_object();
        $datos = $asignatura;
    } else {
        echo "Asignatura no encontrada.";
    }
    echo json_encode($datos);
}


/*// pintado de los datos
    foreach ($users as $user) {
        echo "<br>";
        echo "Nombre : ".$user->nombre. " " . "<br>";
        echo "Descripcion : ".$user->descripcion. " ". "<br>";
        echo "Creditos : ".$user->creditos. " ";
        echo "<br>";
    }*/

/*// pintado de los datos
        echo "<br>";
        echo "ID : " . $asignatura->asignatura_id. "<br>";
        echo "Nombre: " . $asignatura->nombre . "<br>";
        echo "Descripcion: " . $asignatura->descripcion . "<br>";
        echo "Creditos: " . $asignatura->creditos . "<br>";
        echo "<br>";*/
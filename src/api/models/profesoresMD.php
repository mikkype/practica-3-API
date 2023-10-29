<?php

include(__DIR__ . "/../../middleware/db.php");

//Funcion para mostrar profesores
function mostrarProfesores($db)
{
    $sql = 'SELECT * FROM profesores';
    $result = $db->executeQuery($sql);

    // tratamiento de los datos
    $users = array();
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
    echo json_encode($users);
}

//Funcion para mostrar profesores por ID
function mostrarProfesoresID($db,$id_profesor)
{

    //$id_profesor = isset($_GET['id']) ? intval($_GET['id']) : null;

    $sql = "SELECT * FROM profesores WHERE profesor_id = $id_profesor";
    $result = $db->executeQuery($sql);

    if ($result === false) {
        echo "Error en la consulta SQL: " . $db->error;
    }
    // tratamiento de los datos
    if ($result->num_rows > 0) {
        $profesores = $result->fetch_object();
        $datos = $profesores;
    } else {
        echo "Profesor no encontrado.";
    }
    echo json_encode($datos);
}


/*// pintado de los datos
    foreach ($users as $user) {
        echo "<br>";
        echo $user->nombre . " " . $user->apellido;
        echo "<br>";
    }*/

/*// pintado de los datos
        echo "<br>";
        echo "ID : " . $profesores->profesor_id. "<br>";
        echo "Nombre: " . $profesores->nombre . "<br>";
        echo "Apellido: " . $profesores->apellido . "<br>";
        echo "Especialidad: " . $profesores->especialidad . "<br>";
        echo "Email: " . $profesores->correo_electronico . "<br>";
        echo "<br>";*/
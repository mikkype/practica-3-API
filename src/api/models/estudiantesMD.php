<?php

include(__DIR__ . "/../../middleware/db.php");

//funcion para mostrar los estudiantes
function mostrarEstudiantes($db)
{
    $sql = 'SELECT * FROM estudiantes';
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

//funcion para mostrar estudiantes por una ID
function mostrarEstudianteID($db, $id_estudiante)
{
    //$id_estudiante = isset($_GET['id']) ? intval($_GET['id']) : null;

    $sql = "SELECT * FROM estudiantes WHERE estudiante_id = $id_estudiante";
    $result = $db->executeQuery($sql);

    if ($result === false) {
        echo "Error en la consulta SQL: " . $db->error;
    }
    // tratamiento de los datos
    if ($result->num_rows > 0) {
        $estudiante = $result->fetch_object();
        $datos = $estudiante;
    } else {
        echo "Estudiante no encontrado.";
    }
    echo json_encode($datos);
}

//Funcion para actualizar datos de un estudiante por ID
function actualizarEstudianteID($db, $id_estudiante)
{

    $datosUpdate = json_decode(file_get_contents('php://input'), true);
    $nombre = $datosUpdate['nombre'];
    $apellido = $datosUpdate['apellido'];
    //$fecha_nacimiento = $datosUpdate['fecha_nacimiento'];falta averiguar valor de DATE
    $direccion = $datosUpdate['direccion'];
    $telefono = $datosUpdate['telefono'];

    $sql = "UPDATE estudiantes SET nombre = '$nombre', apellido = '$apellido',  direccion = '$direccion', telefono = '$telefono'  WHERE estudiante_id = $id_estudiante";

    echo "Consulta SQL: $sql";
    $result = $db->executeQuery($sql);

    if ($result === false) {
        echo json_encode(array('mensaje' => 'Error en la consulta SQL' . $db->error));
    }
    if ($result) {
        echo json_encode(array('mensaje' => 'Estudiante actualizado'));
    } else {
        echo json_encode(array('mensaje' => 'Error al actualizar Estudiante'));
    }
}

//Funcion para eliminar un estudiante por ID
function eliminarEstudianteID($db, $id_estudiante)
{

    $sql = "DELETE FROM estudiantes WHERE estudiante_id = $id_estudiante";
    echo "Consulta SQL: $sql";
    $result = $db->executeQuery($sql);

    if ($result === false) {
        echo json_encode(array('mensaje' => 'Error en la consulta SQL' . $db->error));
    }
    if ($result) {
        echo json_encode(array('mensaje' => 'Estudiante eliminado'));
    } else {
        echo json_encode(array('mensaje' => 'Error al elieminar Estudiante'));
    }
}

//Funcion para insertar un nuevo estudiante
function  insertarEstudiante($db)
{
    
    $datosIn = json_decode(file_get_contents('php://input'), true);
    $estudiante_id = $datosIn['estudiante_id'];
    $nombre = $datosIn['nombre'];
    $apellido = $datosIn['apellido'];


    $sql = "INSERT INTO estudiantes(estudiante_id,nombre,apellido) VALUES('$estudiante_id', '$nombre' , '$apellido')";
    $result = $db->executeQuery($sql);

    if ($result === false) {
        echo json_encode(array('mensaje' => 'Error en la consulta SQL' . $db->error));
    }
    if ($result) {
        echo json_encode(array('mensaje' => 'Estudiante insertado'));
    } else {
        echo json_encode(array('mensaje' => 'Error al insertar Estudiante'));
    }
    echo json_encode($datosIn);
}


/*// pintado de los datos
    /*foreach ($users as $user) {
        echo "<br>";
        echo $user->nombre . " " . $user->apellido;
        echo "<br>";
    }*/
/*// pintado de los datos
        echo "<br>";
        echo "ID : " . $estudiante->estudiante_id. "<br>";
        echo "Nombre: " . $estudiante->nombre . "<br>";
        echo "Apellido: " . $estudiante->apellido . "<br>";
        echo "Fecha de Nacimiento: " . $estudiante->fecha_nacimiento . "<br>";
        echo "Dirección: " . $estudiante->direccion . "<br>";
        echo "Teléfono: " . $estudiante->telefono . "<br>";
        echo "<br>";*/
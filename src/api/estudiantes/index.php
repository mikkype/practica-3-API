<?php
include(__DIR__ . "/../models/estudiantesMD.php");

// dominios de estudiantes

$db = new Db();

$method = $_SERVER["REQUEST_METHOD"];
header("content-type: application/json");

switch ($method) {

    case 'GET':
        if (isset($_GET['id'])) {
            $id_estudiante = $_GET['id'];
            mostrarEstudianteID($db, $id_estudiante);
        } else {
            mostrarEstudiantes($db);
        }
        break;
    case 'PUT':
        if (isset($_GET['id'])) {
            $id_estudiante = $_GET['id'];
            actualizarEstudianteID($db, $id_estudiante);
        }
        break;
    case 'DELETE':
        if (isset($_GET['id'])) {
            $id_estudiante = $_GET['id'];
            eliminarEstudianteID($db, $id_estudiante);
        }
        break;
    case 'POST':
        insertarEstudiante($db);
        break;
    default:
        echo "Metodo no permitido.";
        break;
}



//mostrarEstudiantes($db);

//mostrarEstudianteID($db);
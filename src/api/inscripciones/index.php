<?php
include(__DIR__."/../models/inscripcionesMD.php");

//dominio de inscripciones
$db = new Db();

$method = $_SERVER["REQUEST_METHOD"];
header("content-type: app/json");

switch ($method) {

    case 'GET':
        if (isset($_GET['id'])) {
            $id_estudiante = $_GET['id'];
            mostrarInscripcionesEstudianteID($db, $id_estudiante);
        } 
        break;
    default:
        echo "Metodo no permitido.";
        break;
}


//mostrarInscripcionesEstudianteID($db, $id_estudiante);


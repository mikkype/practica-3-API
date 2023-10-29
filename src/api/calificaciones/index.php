<?php
include(__DIR__."/../models/calificacionesMD.php");

//dominio de calidficaciones
$db = new Db();

$method = $_SERVER["REQUEST_METHOD"];
header("content-type: app/json");

switch ($method) {

    case 'GET':
        if (isset($_GET['id'])) {
            $id_estudiante = $_GET['id'];
            mostrarCalificacionesEstudianteID($db, $id_estudiante);
        } 
        break;
    default:
        echo "Metodo no permitido.";
        break;
}

//mostrarCalificacionesEstudianteID($db, $id_estudiante);
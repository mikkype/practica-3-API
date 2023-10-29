<?php
include(__DIR__ . "/../models/asignaturaMD.php");

//dominio de asignatura
$db = new Db();


$method = $_SERVER["REQUEST_METHOD"];
header("content-type: app/json");

switch ($method) {

    case 'GET':
        if (isset($_GET['id'])) {
            $id_asignatura = $_GET['id'];
            mostrarAsignaturaID($db, $id_asignatura);
        } else {
            mostrarAsignatura($db);
        }
        break;
    default:
        echo "Metodo no permitido.";
        break;
}


//mostrarAsignatura($db);

//mostrarAsignaturaID($db,$id_asignatura);
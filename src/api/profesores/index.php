<?php
include(__DIR__."/../models/profesoresMD.php");

//dominio de profesores

$db = new Db();

$method = $_SERVER["REQUEST_METHOD"];
header("content-type: app/json");

switch ($method) {

    case 'GET':
        if (isset($_GET['id'])) {
            $id_profesor = $_GET['id'];
            mostrarProfesoresID($db,$id_profesor);
        } else {
            mostrarProfesores($db);
        }
        break;
    default:
        echo "Metodo no permitido.";
        break;
}



//mostrarProfesores($db);

//mostrarProfesoresID($db,$id_profesores);






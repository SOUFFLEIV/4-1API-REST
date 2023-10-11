<?php 
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/mDragonBall.php");
    $dragonballZ = new DragonBallZ();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GETALL":
            $datos=$dragonballZ->get_personaje();
            echo json_encode($datos);
        break;
        case "GetId":
            $datos=$dragonballZ->get_personaje_id($body["idPersonaje"]);
            echo json_encode($datos);
        break;
        case "Insert":
            $datos=$dragonballZ->insert_personaje($body['personaje'],$body['raza'],$body['poderes'],$body['categoria'],);
            echo json_encode("Insert Correcto");
        break;
        case "Update":
            $datos=$dragonballZ->update_personaje($body['idPersonaje'],$body['personaje'],$body['raza'],$body['poderes'],$body['categoria'],);
            echo json_encode("Actualizo Correcto");
        break;
        case "Delete":
            $datos=$dragonballZ->delete_personaje($body['idPersonaje']);
            echo json_encode("Eliminado Correcto");
         break;
    }




?>
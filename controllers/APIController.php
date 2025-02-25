<?php

namespace Controllers;

use Model\Servicio;
use Model\Cita;
use Model\CitaServicio;

class APIController {
    public static function index() {
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }


    public static function guardar() {
        // Almacena la cita y devuelvee el ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id = $resultado["id"];

        // Almacena los servicios con el ID de la cita
        $idServicios = explode(",", $_POST["servicios"]);
        foreach ($idServicios as $key => $idServicio) {
            $args = [
                "citaId" => $id,
                "servicioId" => $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }

        echo json_encode(["resultado" => $resultado]);
    }
}
<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        $router->render("auth/login");
    }

    public static function logout() {
        echo "desde logout";
    }

    public static function olvide(Router $router) {
        $router->render("auth/olvide-password", [
            
        ]);
    }

    public static function recuperar() {
        echo "desde recuperar";
    }
    
    public static function crear(Router $router) {
        $usuario = new Usuario;

        // Alertas vacías
        $alertas = [];

        if($_SERVER["REQUEST_METHOD"] === "POST") {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
        }

        $router->render("auth/crear-cuenta", [
            "usuario"=> $usuario,
            "alertas"=> $alertas
        ]);
    }
}



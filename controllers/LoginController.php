<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        $alertas = [];

        if($_SERVER["REQUEST_METHOD"] === "POST") {
            $auth = new Usuario($_POST);

            $alertas = $auth->validarLogin();
        }

        $router->render("auth/login", [
            "alertas" => $alertas
        ]);
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

            // revisar que las alertas estén vacías
            if (empty($alertas)) {
                // Verificar que el usuario no esté registrado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hasehear el Password
                    $usuario->hashPassword();

                    // Generar un token único
                    $usuario->crearToken();

                    // Enviar el Email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    // Crear el usuario
                    $resultado = $usuario->guardar();

                    if($resultado) {
                        header("Location: ./mensaje");
                    }

                }
            }
        }
        $router->render("auth/crear-cuenta", [
            "usuario" => $usuario,
            "alertas" => $alertas
        ]);
    }


    public static function mensaje(Router $router) {
        $router->render("auth/mensaje");
    }


    public static function confirmar(Router $router) {
        $alertas = [];

        $token = s($_GET["token"]);
        $usuario = Usuario::where("token", $token);

        if(empty($usuario)) {
            // Mostrar mensaje de error
            Usuario::setAlerta("error", "Token no válido");
        } else {
            // Modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta("exito", "Cuenta confirmada correctamente");
        }

        $alertas = Usuario::getAlertas();
    
        $router->render("auth/confirmar-cuenta", [
            "alertas" => $alertas
        ]);
    }
}



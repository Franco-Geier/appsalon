<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
$router = new Router();

// // Iniciar Sesión
// $router->get("/", [LoginController::class, "login"]);
// $router->post("/", [LoginController::class, "login"]);

// // Cerrar Sesión
// $router->get("/logout", [LoginController::class, "logout"]);

// // Recuperar Password
// $router->get("/olvide", [LoginController::class, "olvide"]);
// $router->post("/olvide", [LoginController::class, "olvide"]);
// $router->get("/recuperar", [LoginController::class, "recuperar"]);
// $router->post("/recuperar", [LoginController::class, "recuperar"]);

// // Crear Cuenta
// $router->get("/crear-cuenta", [LoginController::class, "crear"]);
// $router->post("/crear-cuenta", [LoginController::class, "crear"]);


$rutas = [
    "/" => "login",
    "/logout" => "logout",
    "/olvide" => "olvide",
    "/recuperar" => "recuperar",
    "/crear-cuenta" => "crear",
    "/confirmar-cuenta" => "confirmar"
];

foreach ($rutas as $ruta => $metodo) {
    $router->get($ruta, [LoginController::class, $metodo]);
    $router->post($ruta, [LoginController::class, $metodo]);
}

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
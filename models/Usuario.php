<?php

namespace Model;

class Usuario extends ActiveRecord {
    // Base de datos
    protected static $tabla = "usuarios";
    
    protected static $columnasDB = ["id", "nombre", "apellido", 
    "email", "password", "telefono", "admin", "confirmado", "token"];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = []) {
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? "";
        $this->nombre = $args["apellido"] ?? "";
        $this->nombre = $args["email"] ?? "";
        $this->nombre = $args["password"] ?? "";
        $this->nombre = $args["telefono"] ?? "";
        $this->nombre = $args["admin"] ?? null;
        $this->nombre = $args["confirmado"] ?? null;
        $this->nombre = $args["token"] ?? "";
    }
}
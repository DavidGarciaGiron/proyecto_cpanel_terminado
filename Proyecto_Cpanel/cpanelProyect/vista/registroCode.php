<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEmail"]) && isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])) {

        $txtNombre     = validar_campo($_POST["txtNombre"]);
        $txtEmail      = validar_campo($_POST["txtEmail"]);
        $txtUsuario    = validar_campo($_POST["txtUsuario"]);
        $txtPassword   = validar_campo($_POST["txtPassword"]);
        $txtPrivilegio = 2;

        $captcha = $_POST['g-recaptcha-response'];

        $secret = '6LenN5gUAAAAAJMnC00bypwzjmZuh6HIKOAhoRqE';


        if (UsuarioControlador::registrar($txtNombre, $txtEmail, $txtUsuario, $txtPassword, $txtPrivilegio)) {
            $usuario             = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
            $_SESSION["usuario"] = array(
                "id"         => $usuario->getId(),
                "nombre"     => $usuario->getNombre(),
                "usuario"    => $usuario->getUsuario(),
                "email"      => $usuario->getEmail(),
                "privilegio" => $usuario->getPrivilegio(),
            );

            header("location:admin.php");
        }

        if(!$captcha){

            alert("Por favor verifica el captcha");

        } else {

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

            $arr = json_decode($response, TRUE);

            if($arr['success'])
            {
                alert("Gracias :)");
            } else {
                alert("Error al Comprobar Captcha");
            }
        }

    }
} else {
    header("location:registro.php?error=1");
}

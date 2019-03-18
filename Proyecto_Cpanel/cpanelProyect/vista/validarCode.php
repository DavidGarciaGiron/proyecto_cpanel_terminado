<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

header('Content-type: application/json');
$resultado = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])) {

        $txtUsuario  = validar_campo($_POST["txtUsuario"]);
        $txtPassword = validar_campo($_POST["txtPassword"]);
        $captcha = $_POST['g-recaptcha-response'];

        $secret = '6LenN5gUAAAAAJMnC00bypwzjmZuh6HIKOAhoRqE';



        $resultado = array("estado" => "true");

        if (UsuarioControlador::login($txtUsuario, $txtPassword)) {
            $usuario             = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
            $_SESSION["usuario"] = array(
                "id"         => $usuario->getId(),
                "nombre"     => $usuario->getNombre(),
                "usuario"    => $usuario->getUsuario(),
                "email"      => $usuario->getEmail(),
                "privilegio" => $usuario->getPrivilegio(),
            );
            return print(json_encode($resultado));
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
}

$resultado = array("estado" => "false");
return print(json_encode($resultado));

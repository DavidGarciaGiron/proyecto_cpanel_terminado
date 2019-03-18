<?php

class Conexion
{

    /**
     * Conexión a la base datos
     *
     * @return PDO
     */
    public static function conectar()
    {
        try {

            $cn = new PDO("mysql:host=localhost;dbname=cpanelDB", "root", "admin");

            return $cn;

        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}

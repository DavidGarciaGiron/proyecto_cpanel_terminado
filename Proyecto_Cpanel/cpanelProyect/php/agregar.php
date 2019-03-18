<?php

if(!empty($_POST)){
    if( isset($_POST["id"]) &&
        isset($_POST["nombre"]) &&
        isset($_POST["usuario"]) &&
        isset($_POST["email"]) &&
        isset($_POST["password"]) &&
        isset($_POST["privilegio"]) &&
        isset($_POST["fecha_registro"])){

        if($_POST["id"]!=""&& $_POST["nombre"]!=""&&$_POST["usuario"]!=""&&$_POST["email"]!=""&&$_POST["password"]!=""&&$_POST["privilegio"]!=""&&$_POST["fecha_registro"]!=""){
			include "conexion.php";
			
			$sql = "insert into usuarios(id,nombre,usuario,email,password,privilegio,fecha_registro) value (\"$_POST[id]\",\"$_POST[nombre]\",\"$_POST[usuario]\",\"$_POST[email]\",\"$_POST[password]\",\"$_POST[privilegio]\",NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>
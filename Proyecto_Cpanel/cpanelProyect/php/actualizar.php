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
			
			    $sql = "update usuarios set nombre=\"$_POST[nombre]\",usuario=\"$_POST[usuario]\",email=\"$_POST[email]\",password=\"$_POST[password]\",privilegio=\"$_POST[privilegio]\",fecha_registro=\"$_POST[fecha_registro]\" where id=".$_POST["id"];

			    $query = $con->query($sql);

			    if($query!=null){
			        print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";

			    }else{
			        print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			    }
		    }
	}
}

?>
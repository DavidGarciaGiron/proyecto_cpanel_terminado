<?php

if(!empty($_POST)){
    if( isset($_POST["id"]) &&
        isset($_POST["nombre"]) &&
        isset($_POST["email"]) &&
        isset($_POST["mensaje"]) &&
        isset($_POST["fecha_registro"])){

        if($_POST["id"]!=""&& $_POST["nombre"]!=""&&$_POST["email"]!=""&&$_POST["mensaje"]!=""&&$_POST["fecha_registro"]!=""){
			include "conexion.php";
			
			$sql = "insert into registro(id,nombre,email,mensaje,fecha_registro) value (\"$_POST[id]\",\"$_POST[nombre]\",\"$_POST[email]\",NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../vista/admin.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../vista/admin.php';</script>";

			}
		}
	}
}



?>
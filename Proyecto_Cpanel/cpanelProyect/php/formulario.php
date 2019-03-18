<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from usuarios where id = ".$_GET["id"];
$query = $con->query($sql1);
$cpanelDB= null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $cpanelDB=$r;
  break;
}

  }
?>

<?php if($cpanelDB!=null):?>

<form role="form" method="post" action="php/actualizar.php">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $cpanelDB->nombre; ?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="usuario">Usuario</label>
    <input type="text" class="form-control" value="<?php echo $cpanelDB->usuario; ?>" name="usuario" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" value="<?php echo $cpanelDB->email; ?>" name="email" required>
  </div>
  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" value="<?php echo $cpanelDB->password; ?>" name="password" >
  </div>
  <div class="form-group">
    <label for="privilegio">Privilegio</label>
    <input type="text" class="form-control" value="<?php echo $cpanelDB->privilegio; ?>" name="privilegio" >
  </div>
    <div class="form-group">
        <label for="fecha_registro">Fecha de Registro</label>
        <input type="date" class="form-control" value="<?php echo $cpanelDB->fecha_registro; ?>" name="fecha_registro" >
    </div>
<input type="hidden" name="id" value="<?php echo $cpanelDB->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>
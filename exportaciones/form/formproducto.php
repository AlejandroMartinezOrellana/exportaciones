<?php
$oProducto=new Producto();
?>
<form method="post" action="AccAlumno.php">
<?php
While($RegAlumno=$oProducto->Selecciona()){

	?>
<input type="hidden" name="idalumno" value="<?=$RegAlumno->IdProducto()?>">
<input type="hidden" name="nombre[]" value="<?=$RegAlumno->Nombre()?>">
<br>
<?php
}

?>
<input type="submit" value="Enviar notas">
</form>
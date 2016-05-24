<?php
include("../librerias.php");
session_start();
$oUsr=$_SESSION["oUsuario"];

$oPro=new Producto(NULL,NULL,NULL,NULL,1);
foreach ($_POST as $id){
	$oPro->Elimina($id);	
};
?>

<script>
	document.location.href="<?=PATHURL?>exportaciones_del.php";
</script>
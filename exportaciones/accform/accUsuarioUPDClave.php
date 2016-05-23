<?php
include("../librerias.php");

//$newpewd=$_POST['newpwd'];
$newpewd=$_GET['newpwd'];

session_start();
if (!isset($_SESSION["oUsuario"])){
	?>
<!-- Reenvio a la página principal-->
<script>
	document.location.href="index.php";
</script>
<?php 
}

$oUsr=$_SESSION["oUsuario"];
var_dump($oUsr);
if($oUsr->ActualizaClave($newpewd)) echo "clave actualizada"; else echo "ERROR";
?>
<?php
include('librerias.php');

/*
 * Verificación del usuario y clave
* */
session_start();
if (!isset($_SESSION["oUsuario"])){
?>
<!-- Reenvio a la página principal-->
<script>
	document.location.href="index.php";
</script>
<?php 
}
?>
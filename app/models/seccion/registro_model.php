<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");

	//echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	$nombre = trim($_POST["nombre"]);
	$limite = trim($_POST["limite"]);
	$subsidio=trim($_POST["subsidio"]);

	$sql = "INSERT INTO seccion(nombre, limite,id_categoria) VALUES('{$nombre}', {$limite},{$subsidio})";

	if (!$con->query($sql)) {
		echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	}
	else
		echo 1;
?>
<?php
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php");
	$nombre = trim($_POST["nombre"]);
	$nroPlu = trim($_POST["nro_plu"]);
	$precio = trim($_POST["precio"]);
	$tipo = trim($_POST["tipoVenta"]);
	$seccion = trim($_POST["seccion"]);
	$codPlu=($tipo*1000)+$nroPlu;
	$micategoria=$_REQUEST['categoria'];
	echo "<pre>";print_r ($_REQUEST);echo "</pre>";
	echo "<pre>";print_r ($micategoria);echo "</pre>";
	foreach ($micategoria as $categoria) {
		
	}

	// $sql="INSERT INTO producto(nroplu, descripcion, tipo, precio, cod_barras, id_cat) values({$nroPlu},'{$nombre}',{$tipo},{$precio},'{$codPlu}', {$seccion})";
	// if (!$con->query($sql)) {
	// 	echo "Falló la insercion: (" . $con->errno . ") " . $con->error;
	// }
	// else
	// 	echo 1;
?>
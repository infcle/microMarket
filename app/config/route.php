@@ -1,194 +0,0 @@
<?php 
	//Ruta principal
	define('ROOT', 'http://localhost/microMarket/');
	define('ROOT_CONTROLLER', ROOT.'app/controller/');
	$menus = array(
		'INICIO'=>array(
					'inicio'=>'active',
					'usuario'=>'',
					'lista_u'=>'',
					'registro_u'=>'',
					'ventas'=>'',
					'producto'=>'',
					'lista_p'=>'',
					'registro_p'=>'',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'',
					'configuracion'=>'',
					'configuracion_c'=>'',
					'configuracion_s'=>'',
					'configuracion_l'=>''
				),
		'U_LISTA'=>array(
					'inicio'=>'',
					'usuario'=>'nav-active',
					'lista_u'=>'active',
					'registro_u'=>'',
					'ventas'=>'',
					'producto'=>'',
					'lista_p'=>'',
					'registro_p'=>'',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'',
					'configuracion'=>'',
					'configuracion_c'=>'',
					'configuracion_s'=>'',
					'configuracion_l'=>''
				),
		'U_REGISTRO'=>array(
					'inicio'=>'',
					'usuario'=>'nav-active',
					'lista_u'=>'',
					'registro_u'=>'active',
					'ventas'=>'',
					'producto'=>'',
					'lista_p'=>'',
					'registro_p'=>'',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'',
					'configuracion'=>'',
					'configuracion_c'=>'',
					'configuracion_s'=>'',
					'configuracion_l'=>''
				),
		'VENTAS'=>array(
					'inicio'=>'',
					'usuario'=>'',
					'lista_u'=>'',
					'registro_u'=>'',
					'ventas'=>'active',
					'producto'=>'',
					'lista_p'=>'',
					'registro_p'=>'',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'',
					'configuracion'=>'',
					'configuracion_c'=>'',
					'configuracion_s'=>'',
					'configuracion_l'=>''
				),
		'P_LISTA'=>array(
					'inicio'=>'',
					'usuario'=>'',
					'lista_u'=>'',
					'registro_u'=>'',
					'ventas'=>'',
					'producto'=>'nav-active',
					'lista_p'=>'active',
					'registro_p'=>'',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'',
					'configuracion'=>'',
					'configuracion_c'=>'',
					'configuracion_s'=>'',
					'configuracion_l'=>''
				),
		'P_REGISTRO'=>array(
					'inicio'=>'',
					'usuario'=>'',
					'lista_u'=>'',
					'registro_u'=>'',
					'ventas'=>'',
					'producto'=>'nav-active',
					'lista_p'=>'',
					'registro_p'=>'active',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'',
					'configuracion'=>'',
					'configuracion_c'=>'',
					'configuracion_s'=>'',
					'configuracion_l'=>''
				),
		'R_UNO'=>array(
					'inicio'=>'',
					'usuario'=>'',
					'lista_u'=>'',
					'registro_u'=>'',
					'ventas'=>'',
					'producto'=>'',
					'lista_p'=>'',
					'registro_p'=>'',
					'reportes'=>'nav-active',
					'reportes_u'=>'active',
					'cliente'=>'',
					'configuracion'=>'',
					'configuracion_c'=>'',
					'configuracion_s'=>'',
					'configuracion_l'=>''
				),
		'C_CATEGORIA'=>array(
					'inicio'=>'',
					'usuario'=>'',
					'lista_u'=>'',
					'registro_u'=>'',
					'ventas'=>'',
					'producto'=>'',
					'lista_p'=>'',
					'registro_p'=>'',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'',
					'configuracion'=>'nav-active',
					'configuracion_c'=>'active',
					'configuracion_s'=>'',
					'configuracion_l'=>''
				),
		'C_SECCION'=>array(
					'inicio'=>'',
					'usuario'=>'',
					'lista_u'=>'',
					'registro_u'=>'',
					'ventas'=>'',
					'producto'=>'',
					'lista_p'=>'',
					'registro_p'=>'',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'',
					'configuracion'=>'nav-active',
					'configuracion_c'=>'',
					'configuracion_s'=>'active',
					'configuracion_l'=>''
				),
		'C_LIMITE'=>array(
					'inicio'=>'',
					'usuario'=>'',
					'lista_u'=>'',
					'registro_u'=>'',
					'ventas'=>'',
					'producto'=>'',
					'lista_p'=>'',
					'registro_p'=>'',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'',
					'configuracion'=>'nav-active',
					'configuracion_c'=>'',
					'configuracion_s'=>'',
					'configuracion_l'=>'active'
				),
		'CLIENTE'=>array(
					'inicio'=>'',
					'usuario'=>'',
					'lista_u'=>'',
					'registro_u'=>'',
					'ventas'=>'',
					'producto'=>'',
					'lista_p'=>'',
					'registro_p'=>'',
					'reportes'=>'',
					'reportes_u'=>'',
					'cliente'=>'active',
					'configuracion'=>'',
					'configuracion_c'=>'',
					'configuracion_s'=>'',
					'configuracion_l'=>''
				),
	);
?>
<?php
//Se realizo un gestion diferente para evitar que aparezca los mensajes echo 
if(!session_id())session_start();
error_reporting(0);
//guarda en una variable el usuario que inicio sesion
$id_session = $_SESSION['usuario'];
//realiza comprobacion
if($id_session == null || $id_session == '')
{
    echo '<script language="javascript">alert("No tiene autorizacion");window.location.href="index.php"</script>';
    die();
}
$id_producto = filter_input(INPUT_POST, 'codigo');
$contador = filter_input(INPUT_POST, 'contador');
$agregarCarrito = filter_input(INPUT_POST, 'agregarCarrito');
$observarCarrito = filter_input(INPUT_POST, 'observarCarrito');
$eliminarCarrito = filter_input(INPUT_POST, 'eliminarCarrito');
$codigoCarrito = filter_input(INPUT_POST, 'codigoCarrito');

if($observarCarrito == 'observarCarrito')
{
	require '../modelo/clsCarritoAcceso.php';
	$datos  = new clsCarritoAcceso();
	$listadoCarrito = $datos->listarProductos($id_session);
	$listadoTotal = $datos->calcularTotal($id_session);
	require '../vista/PaginaCarrito.php';
}elseif($agregarCarrito == 'agregarCarrito')
{
	require '../modelo/clsCarritoAcceso.php';
	$datos  = new clsCarritoAcceso();
	$product = $datos->agregarCarrito($id_producto, $id_session, $contador);
}elseif($eliminarCarrito == 'eliminarCarrito')
{
	require '../modelo/clsCarritoAcceso.php';
	$datos  = new clsCarritoAcceso();
	$product = $datos->eliminarDeCarrito($codigoCarrito);
}
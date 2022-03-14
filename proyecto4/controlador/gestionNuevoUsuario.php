<?php
//verifica si ya se inicio sesion para así reanudarla
$usuario = filter_input(INPUT_POST, 'usuario');
$clave = filter_input(INPUT_POST, 'clave');
$nombre = filter_input(INPUT_POST, 'nombre');
require '../modelo/clsUsuarioAcceso.php';
$datos  = new clsUsuarioAcceso();
$datos->fcrearUsuario($usuario, $clave, $nombre);
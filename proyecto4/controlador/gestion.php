<?php
//Se realizo un gestion diferente para evitar que aparezca los mensajes echo 
$usuario = filter_input(INPUT_POST, 'usuario');
$clave = filter_input(INPUT_POST, 'clave');
require '../modelo/clsUsuarioAcceso.php';
$datos  = new clsUsuarioAcceso();
$user = $datos->finiciarSesion($usuario, $clave);
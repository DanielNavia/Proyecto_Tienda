<?php
$nombre = filter_input(INPUT_POST, 'nombre');
$correo = filter_input(INPUT_POST, 'correo');
$celular = filter_input(INPUT_POST, 'celular');
$problema = filter_input(INPUT_POST, 'problema');
require '../modelo/clsFormularioAcceso.php';
$datos  = new clsFormularioAcceso();
$datos->fIngresarDatos($nombre, $correo, $celular, $problema);
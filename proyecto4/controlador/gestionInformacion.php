<?php
//verifica si ya se inicio sesion para así reanudarla
if(!session_id())session_start();
error_reporting(0);
//guarda en una variable el usuario que inicio sesion
$varsesion = $_SESSION['usuario'];
//realiza comprobacion
if($varsesion == null || $varsesion == '')
{
    echo '<script language="javascript">alert("No tiene autorizacion");window.location.href="../index.php"</script>';
    //Finaliza programa
    die();
}
require('../modelo/clsUsuarioAcceso.php');
$datos  = new clsUsuarioAcceso();
$cosultarol = $datos->BuscarRol($varsesion);
foreach ($cosultarol as $item) 
{
    
    if($item["rol"] == "admin")
    {
        $lstusuarios = $datos->listar($varsesion);
        require('../vista/UsuarioInfoAndmin.php');
    }
    else
    {
        echo '<script language="javascript">alert("No tiene autorizacion");window.location.href="../cerrarsesion.php"</script>';
    }
}
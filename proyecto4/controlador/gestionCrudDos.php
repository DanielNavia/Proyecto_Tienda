<?php
//Se realizo un gestion diferente para evitar que aparezca los mensajes echo 
error_reporting(0);
if(!session_id())session_start();
//guarda en una variable el usuario que inicio sesion
$varsesion = $_SESSION['usuario'];
//realiza comprobacion
if($varsesion == null || $varsesion == '')
{
    echo '<script language="javascript">alert("No tiene autorizacion");window.location.href="../index.php"</script>';
    //Finaliza programa
    die();
}
$codigo = filter_input(INPUT_POST, 'codigo');
$eliminar = filter_input(INPUT_POST, 'eliminar');
$agregar = filter_input(INPUT_POST, 'agregar');
$nombre = filter_input(INPUT_POST, 'nombre');
$descripcion = filter_input(INPUT_POST, 'descripcion');
$precio = filter_input(INPUT_POST, 'precio');
$editar = filter_input(INPUT_POST, 'editar');
$editarconf = filter_input(INPUT_POST, 'editarconf');
$nombreedit = filter_input(INPUT_POST, 'nombreedit');
$descripcionedit = filter_input(INPUT_POST, 'descripcionedit');
$precioedit = filter_input(INPUT_POST, 'precioedit');
require('../modelo/clsUsuarioAcceso.php');
$datos  = new clsUsuarioAcceso();
$cosultarol = $datos->BuscarRol($varsesion);
foreach ($cosultarol as $item) 
{
    if($item["rol"] == "admin")
    {
        if($eliminar == 'eliminar')
		{
			require '../modelo/clsProductoAcceso.php';
			$datos  = new clsProductoAcceso();
			$product = $datos->eliminarProducto($codigo);
		}
		elseif ($agregar == 'agregar') 
		{
			if (isset($_FILES['foto']['name'])) 
			{
				if(($_FILES['foto']['type']) == "image/jpg" || ($_FILES['foto']['type']) == "image/jpeg" || ($_FILES['foto']['type']) == "image/png")
				{
					$imagenSubida = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
					require '../modelo/clsProductoAcceso.php';
					$datos  = new clsProductoAcceso();
					$product = $datos->agregarProducto($nombre, $descripcion, $precio, $imagenSubida);		
				}	
				else
				{
					echo '<script language="javascript">alert("El formato del archivo debe ser jpg, jpeg o png");window.location.href="../controlador/gestionProducto.php"</script>';
				}	
			}	
		}elseif ($editar == 'editar') 
		{
			require '../modelo/clsProductoAcceso.php';
			$datos  = new clsProductoAcceso();
			$lstproductos = $datos->listareditar($codigo);
			require('../vista/ProductoEditar.php');
		}elseif ($editarconf == 'editarconf')
		{
			if (isset($_FILES['fotoedit']['name'])) 
			{
				if(($_FILES['fotoedit']['type']) == "image/jpg" || ($_FILES['fotoedit']['type']) == "image/jpeg" || ($_FILES['fotoedit']['type']) == "image/png")
				{
					$imagenedit = addslashes(file_get_contents($_FILES['fotoedit']['tmp_name']));
					require '../modelo/clsProductoAcceso.php';
					$datos  = new clsProductoAcceso();
					$lstproductos = $datos->editar($nombreedit, $descripcionedit, $precioedit, $imagenedit, $codigo);
				}	
				else
				{
					echo '<script language="javascript">alert("El formato del archivo debe ser jpg, jpeg o png");window.location.href="../controlador/gestionProducto.php"</script>';
				}	
			}	
		}
    }
    else
    {
        echo '<script language="javascript">alert("No tiene autorizacion");window.location.href="../cerrarsesion.php"</script>';
    }
}





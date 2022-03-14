<?php
//Reanuda sesion
session_start();
require '../modelo/clsConexion.php';
/**
 * Description of clsProductoAcceso
 *
 * @author Daniel Navia
 */
class clsUsuarioAcceso 
{
    //atributos
    private $conexion;
    //metodos
    public function __construct() {
        $this->conexion = new clsConexion();
    }
    
    public function listar($usuario){
        $sql = "SELECT * FROM USUARIO";
        $consulta = $this->conexion->getConexion()->query($sql);
        $listadoUsuario = [];
        $i=0;
        while($fila = $consulta->fetch_assoc()){
            $listadoUsuario[$i] = $fila;
            $i++;
        }
        return $listadoUsuario;
    }
    
    //Realiza la busqueda para iniciar sesion
    public function finiciarSesion($usuario, $clave)
    {   
        $cadena= filter_var($usuario, FILTER_SANITIZE_STRING);
        $cadenaclave= filter_var($clave, FILTER_SANITIZE_STRING);
        $_SESSION['usuario'] = $cadena;
        $sql = "SELECT * FROM USUARIO WHERE USUARIO = '$cadena' and CLAVE = '$cadenaclave' and rol = 'admin'";
        $sqlno = "SELECT * FROM USUARIO WHERE USUARIO = '$cadena' and CLAVE = '$cadenaclave' and rol = 'no-admin'";
        $consulta = $this->conexion->getConexion()->query($sql); 
        $consultano = $this->conexion->getConexion()->query($sqlno); 
        $filas = mysqli_num_rows($consulta);
        $filasno = mysqli_num_rows($consultano);
        if($filas > 0)
        {            
            echo'<script type="text/javascript">alert("Bienvenido Administrador");</script>';
            require '../controlador/gestionProducto.php';
        }else if($filasno > 0)
        {
            require '../controlador/gestionCliente.php';
        }else
        {
            echo '<script language="javascript">alert("Error de autentificacion. El usuario o contraseña son incorrectos");window.location.href="../index.php"</script>';
        }
    }

    public function fcrearUsuario($usuario, $clave, $nombre)
    {
        $cadena= filter_var($usuario, FILTER_SANITIZE_STRING);
        $cadenaclave= filter_var($clave, FILTER_SANITIZE_STRING);
        $cadenanombre= filter_var($nombre, FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM USUARIO WHERE USUARIO = '$cadena'";
        $consulta = $this->conexion->getConexion()->query($sql);
        $filas = mysqli_num_rows($consulta);
        if($filas>0)
        {
            echo '<script language="javascript">alert("El usuario ya se encuentra");window.location.href="../index.php"</script>';
        }else
        {
            $sql = "INSERT INTO usuario (usuario, clave, nombre, rol) VALUES ('$cadena', '$cadenaclave', '$cadenanombre', 'no-admin')";
            $consulta = $this->conexion->getConexion()->query($sql);     
            echo '<script language="javascript">alert("Se creo el usuario correctamente");window.location.href="../index.php"</script>';
        }       
    }

    public function BuscarRol($varsesion)
    {
        $sql = "SELECT rol FROM USUARIO WHERE USUARIO = '$varsesion'";
        $consultarol = $this->conexion->getConexion()->query($sql);
        return $consultarol;
    }

    public function UsuariosAdmin()
    {
        $sql = "SELECT * FROM USUARIO WHERE rol = 'admin'";
        $consultauser = $this->conexion->getConexion()->query($sql);
        return $consultauser;
    }

}
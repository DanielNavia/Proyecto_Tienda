<?php
require_once('../modelo/clsConexion.php');
/**
 * Description of clsProductoAcceso
 *
 * @author Adrian Mu
 */
class clsProductoAcceso {
    //atributos
    private $conexion;
    
    //metodos
    public function __construct() {
        $this->conexion = new clsConexion();
    }
    public function listar(){
        $sql = 'SELECT * FROM PRODUCTO';
        $consulta = $this->conexion->getConexion()->query($sql);
        $listadoProductos = [];
        $i=0;
        while($fila = $consulta->fetch_assoc()){
            $listadoProductos[$i] = $fila;
            $i++;
        }
        return $listadoProductos;
    }

    public function eliminarProducto($codigo)
    {
        $sql = "DELETE FROM PRODUCTO WHERE codigo = '$codigo'";
        $consulta = $this->conexion->getConexion()->query($sql);
        echo '<script language="javascript">alert("El producto se elimino correctamente");window.location.href="../controlador/gestionProducto.php"</script>';
    }

    public function agregarProducto($nombre, $descripcion, $precio, $imagenSubida)
    {
        $cadena= filter_var($nombre, FILTER_SANITIZE_STRING);
        $cadenadescripcion= filter_var($descripcion, FILTER_SANITIZE_STRING);
        $cadenaprecio= filter_var($precio, FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM PRODUCTO WHERE nombre = '$cadena'";
        $consulta = $this->conexion->getConexion()->query($sql);
        $filas = mysqli_num_rows($consulta);
        if($filas>0)
        {
            echo '<script language="javascript">alert("El producto ya se encuentra");window.location.href="../controlador/gestionProducto.php"</script>';
        }else
        {
            $sql = "INSERT INTO PRODUCTO (nombre, descripcion, precio, imagen) VALUES ('$cadena', '$cadenadescripcion', '$cadenaprecio', '$imagenSubida')";
            $consulta = $this->conexion->getConexion()->query($sql); 
            echo '<script language="javascript">alert("El se agrego correctamente");window.location.href="../controlador/gestionProducto.php"</script>';
        }     
    }

    public function listareditar($codigo)
    {
        $sql = "SELECT * FROM PRODUCTO WHERE codigo = '$codigo'";
        $consulta = $this->conexion->getConexion()->query($sql);
        $listadoProductos = [];
        $i=0;
        while($fila = $consulta->fetch_assoc()){
            $listadoProductos[$i] = $fila;
            $i++;
        }
        return $listadoProductos;
    }

    public function editar($nombreedit, $descripcionedit, $precioedit, $imagenedit, $codigo)
    {
        
        $cadena= filter_var($nombreedit, FILTER_SANITIZE_STRING);
        $cadenadescripcion= filter_var($descripcionedit, FILTER_SANITIZE_STRING);
        $cadenaprecio= filter_var($precioedit, FILTER_SANITIZE_STRING);
        $sql = "UPDATE PRODUCTO SET nombre = '$cadena', descripcion = '$cadenadescripcion', precio = '$cadenaprecio', imagen = '$imagenedit' WHERE codigo = '$codigo'";
        $consulta = $this->conexion->getConexion()->query($sql); 
        echo '<script language="javascript">alert("Se edito correctamente");window.location.href="../controlador/gestionProducto.php"</script>';
    }
}
